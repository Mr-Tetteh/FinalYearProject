<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Requests\StaffRegistrationRequest;
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
            'contact' => $request->input('contact'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'position' => $request->input('position'),
//            'hospital_id' => $request->input('hospital_id'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

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
        $user = User::all();
        return UserResource::collection($user);
    }

    public function all_staff()
    {
        $loggedInUser = Auth::user();

        $all_staff = User::where('hospital_id', $loggedInUser->hospital_id)->latest()->get();

        return UserResource::collection($all_staff);
    }

    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->identifier)
                ->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'message' => 'Sorry Wrong Email or Password',
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

    public function count_all_hospital_users()
    {
        $user = Auth::user();
        $user = User::where('hospital_id', $user->hospital_id)->count();

        return response()->json($user);

    }



    public function getUserHospital($id)
    {
        try {
            $user = User::findOrFail($id);
            $hospitals = $user->hospitals()->get();
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

    public function update_role(User $user, Request $request)
    {
        // Update user data
        $user->update($request->except('hospital_ids'));

        // Sync hospitals if hospital_ids are provided
        if ($request->has('hospital_ids')) {
            $user->hospitals()->sync($request->hospital_ids);
        }

        // Load the updated user with hospitals relationship
        $user->load('hospitals');

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


}
