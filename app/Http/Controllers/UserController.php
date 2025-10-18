<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Container\Attributes\Auth;

class UserController extends Controller
{
    //User Login Function
    public function UserLogin(LoginRequest $request){
        try{
            //validate form data
            $request->validated($request->only(['email', 'password']));

            // Attempt login
            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'message' => 'unauthorized',
                    'status' => 401
                ], 401);
            }

            $user = user::where('email', $request->email)->first();
            $token = $user->createToken('auth_Token')->plainTextToken;

            //set expire Date-time for token
            $user->tokens()->latest()->first()->update([
                'expires_at' => now()->addDays(7)
            ]);

            //return response json data
            return response()->json([
                'user' => $user,
                'message' => 'User Login Successfully',
                'status' => 200,
                'token' => $token

            ], 200);

        } catch(Exception $e){
            // Catch any unexpected exceptions
            return response()->json([
                'message' => $e->getMessage(),
                'status'  => 500,
            ], 500);
        }

    }

    //User Registration Function
    public function register(RegisterRequest $request){
        try {
            // Validate input
            $request->validated($request->only(['name', 'email', 'password']));

            // Create the user (hashing the password is important!)
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password
            ]);

            // Generate API token
            $token = $user->createToken('auth_Token')->plainTextToken;

            // Successful response
            return response()->json([
                'user'    => $user,
                'message' => 'User Registered Successfully',
                'status'  => 201,
                'token'   => $token,
            ], 201);

        } catch (Exception $e) {
            // Handle any unexpected exception
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }
    }

    //User Logout Function
    public function logout(){
        try{
            Auth::user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'User Logged Out Successfully',
                'status' => 200
            ], 200);

        } catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status'  => 500,
            ], 500);
        }

    }

}
