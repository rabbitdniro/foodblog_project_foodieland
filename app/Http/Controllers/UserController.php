<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Container\Attributes\Auth;

class UserController extends Controller
{
    
    public function userRegister(RegisterRequest $request)
    {
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
            $token = $user->createToken('auth_token')->plainTextToken;

            // Successful response
            return response()->json([
                'message' => 'User Registered Successfully',
                'status'  => 201,
                'user'    => $user,
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

    //User Login Api Sanctum implementation
    public function userLogin(LoginRequest $request)
    {       
        try{
            //validate form data
            $request->validated($request->only(['email', 'password']));
            
            // Attempt login
            if (!auth()->attempt($request->only('email', 'password'))){
                return response()->json([
                    'message' => 'Unauthorized',
                    'status' =>401,
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message'=> 'login successful',
                'status'=> 200,
                'data' => new AuthResource([
                    'token' => $token,
                    'user' => $user
                ]),
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }

    }

    //User Logout Api Sanctum implementation
    public function userLogout(Request $request)
    {
        try{
            // Revoke the token that was used to authenticate the current request
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Logout successful',
                'status'  => 200,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }

    }
}
