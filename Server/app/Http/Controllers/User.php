<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function register(Request $request)
    {
        if (\App\Models\User::where('email', $request->email)->first()) {
            return response()->json([
                'message' => 'Sorry, Email already exists'
            ], 402);
        } elseif (\App\Models\User::where('phone', $request->phone)->first()) {
            return response()->json([
                'message' => 'Sorry, Phone number already exists with an account.'
            ], 402);
        }

        $user = \App\Models\User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthday' => $request->input('birthday'),
            'gender' => $request->input('gender'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'hospital' => $request->input('hospital'),
            'staff_id' => $request->input('staff_id'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'password' => Hash::make($request->input('password'))
        ]);

        return new UserResource($user);
    }


    public function login(Request $request)
    {
        try {
            $user = \App\Models\User::where('email', $request->identifier)
                ->orWhere('phone', $request->identifier)
                ->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'message' => 'Sorry Wrong Email or Password'
                ], 401);
            }
            return response()->json([
                "message" => "Login Successful",
                "user" => $user,
                "authorisation" => [
                    "type" => "Bearer",
                    "token" => $user->createToken($user->email ?? $user->phone)->plainTextToken
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Something went wrong'
            ], 500);
        }
    }



    public function user()
    {
        return Auth::user();

    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Successful'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);

    }
}
