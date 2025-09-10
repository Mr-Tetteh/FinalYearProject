<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Requests\StaffRegistrationRequest;
use App\Jobs\InitUniqueIdSMSJB;
use App\Models\Hospital;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Create a new user",
     *     description="Stores a newly created users",
     *     tags={"User"},
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"first_name", "last_name", "other_names", "birthday", "gender", "role", "contact", "email",
     *      "hospital", "staff_id", "city"},
     *
     *             @OA\Property(property="first_name", type="string", description="The first name of the user"),
     *             @OA\Property(property="last_name", type="string", description="The last name of the user"),
     *             @OA\Property(property="other_names", type="string", description="The other names of the user"),
     *             @OA\Property(property="birthday", type="string", description="The birthday of the user"),
     *             @OA\Property(property="gender", type="string", description="The gender of the user"),
     *             @OA\Property(property="role", type="string", description="The role of the user"),
     *             @OA\Property(property="contact", type="string", description="The contact of the user"),
     *             @OA\Property(property="email", type="string", description="The name of the  email of the user"),
     *             @OA\Property(property="hospital", type="string", description="The hospital the user belogns to"),
     *             @OA\Property(property="staff_id", type="string", description="The staff id of the user"),
     *             @OA\Property(property="city", type="integer", description="The city which the user comes from")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Hospital created successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function register(StaffRegistrationRequest $request)
    {
        $request->validated();
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'other_names' => $request->input('other_names'),
            'contact' => '233' . substr($request->input('contact'), -9),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'position' => $request->input('position'),
//            'hospital_id' => $request->input('hospital_id'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        sendWithSMSONLINEGH('233' . substr(($user->contact), -9), 'Dear ' . $user->first_name . ', Your account has been created successfully. You will receive a notification when your account is activated. Thank you!');

        sendWithSMSONLINEGH(
            '233' . substr($user->contact, -9),
            'Hello ' . $user->first_name . ', your UniqueID is ' . $user->unique_id . '. Please save your UniqueID Thank you!'
        );
        return new UserResource($user);

    }


    public function resetPassword(Request $request)
    {
        if ($request->input('password') !== $request->input('confirm_password')) {
            return response()->json(['message' => 'Passwords not match.'], 400);
        }

        $passwordReset = DB::table('password_resets')
            ->where('token', $request->input('token'))
            ->first();
        logger($request->input('token'));
        logger($request->all());

        if (!$passwordReset) {
            return response()->json([
                'message' => 'Invalid token.',
            ], 404);
        }

        if (Carbon::parse($passwordReset->created_at)->addHour()->isPast()) {
            DB::table('password_resets')->where('token', $request->input('token'))->delete();

            return response()->json([
                'message' => 'Token has expired.',
            ], 400);
        }

        $passwordReset = DB::table('password_resets')->where('token', $request->input('token'))->first();

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Sorry User not found',
            ], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json([
            'message' => 'Password reset successfully.',
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $email = $request->input('email');
        $token = Str::random(20);

        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'Sorry User with this email was not found'], 404);
        }
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('Reset', ['token' => $token], function (Message $message) use ($email): void {
            $message->subject('Reset your Password');
            $message->to($email);
        });

        return response()->json(['message' => 'A Reset password link sent on your email. Please check your inbox to update your password.']);
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Get list of Users",
     *     description="Returns a list of all users",
     *     tags={"User"},
     *
     *     @OA\Response(
     *         response=200,
     *         description="List of users",
     *
     *         @OA\JsonContent(
     *             type="array",
     *
     *             @OA\Items(ref="#/components/schemas/User")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function all_users()
    {
        $user = User::latest()->get();
        return UserResource::collection($user);
    }

    public function all_staff($id)
    {

        $all_staff = User::whereHas('hospitals', function ($query) use ($id) {
            $query->where('hospitals.id', $id);
        })->get();

        return UserResource::collection($all_staff);
    }

    public function login(Request $request)
    {
        try {
            $user = User::where('unique_id', $request->identifier)
                ->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'message' => 'Sorry Wrong Unique ID or Password',
                ], 401);
            }

            if ($user->status === 0) {
                return response()->json([
                    'message' => 'Sorry your account has not been activated yet. Please contact your administrator.',
                ], 403);

            }

            // Check if user has any hospitals associated

            if ($user->hospitals()->count() === 0) {
                return response()->json([
                    'message' => 'Sorry, your account is not associated with any hospital. Please contact your administrator.',
                ], 403);
            }
            /*  if ($user->hospital_id->status === 0) {
                  return response()->json([
                      'message' => 'Sorry your hospital subscription has expired or is inactive'
                  ], 403);
              }*/

            return response()->json([
                'message' => 'Login Successful',
                'user' => $user,
                'authorisation' => [
                    'type' => 'Bearer',
                    'token' => $user->createToken($user->email ?? $user->contact)->plainTextToken,
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Something went wrong',
            ], 500);
        }
    }

    public function count_all_users()
    {
        $users = User::count();

        return response()->json($users);

    }

    public function count_all_hospital_users($id)
    {
        $count = User::whereHas('hospitals', function ($query) use ($id) {
            $query->where('hospitals.id', $id);
        })->count();

        return response()->json($count);
    }


    public function getUserHospital($id)
    {
        try {
            $user = User::findOrFail($id);
            $hospitals = $user->hospitals()->where('status', 1)->get();
            return response()->json([
                'status' => 'success',
                'data' => $hospitals
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch user hospitals',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout Successful',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function activate_user(User $user, Request $request)
    {
        // Update user data
        $user->update($request->except('hospital_ids'));

        // Sync hospitals if hospital_ids are provided
        if ($request->has('hospital_ids')) {
            $user->hospitals()->sync($request->hospital_ids);
        }

        // Load the updated user with hospitals relationship
        $user->load('hospitals');

        $url = 'http://localhost:5173/request/hospital';
        sendWithSMSONLINEGH('233' . substr(($request->contact), -9), 'Dear ' . $request->first_name . ', Your account has been activated. Please make sure you are assigned to a hospital to enable you access a hospital portal. You can also request to work in a hospital '. $url .' Thank you!');

        return new UserResource($user);
    }


    public function add_staff_hospital(User $user, Request $request)
    {
        // Validate that hospital_id is provided
        $request->validate([
            'hospital_id' => 'required|exists:hospitals,id'
        ]);

        // Check if this hospital assignment already exists
        $existingAssignment = $user->hospitals()
            ->where('hospital_id', $request->hospital_id)
            ->exists();

        if ($existingAssignment) {
            return response()->json([
                'message' => 'This user is already assigned to the selected hospital.'
            ], 422);
        }

        // Attach the new hospital without detaching existing ones
        $user->hospitals()->attach($request->hospital_id);
        // Reload the user with hospitals relationship
        $user->load('hospitals');
        // Send notification
        sendWithSMSONLINEGH(
            '233' . substr($user->contact, -9),
            'Dear ' . $user->first_name . ', You have been assigned to a hospital. Please login to view your assignments. Thank you!'
        );

        return new UserResource($user);
    }

    public function deleted_users()
    {
        return User::onlyTrashed()->latest()->get();

    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }

    public function removeStaff($hospital_id, $id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Detach the hospital from this user
        $user->hospitals()->detach($hospital_id);

        // Reload user with updated hospitals
        $user->load('hospitals');

        return response()->json([
            'message' => 'Staff removed successfully',
            'user' => new UserResource($user)
        ]);
    }




}
