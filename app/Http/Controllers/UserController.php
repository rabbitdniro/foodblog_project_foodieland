<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function registerPage(){
        return view('pages.register');
    }

    public function loginPage(){
        return view('pages.login');
    }

    public function sandOTPPage(){
        return view('pages.login');
    }

    public function resetPasswordPage(){
        return view('pages.password.forgot');
    }
 //..............................................................................

    //User register Api Sanctum implementation
    public function userRegister(RegisterRequest $request)
    {
        try {
            // Validate input
            $request->validated($request->only(['name', 'email', 'mobile', 'password',]));

            // Create the user (hashing the password is important!)
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,               
                'mobile'     => $request->mobile,
                'password'   => Hash::make($request->password),
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

    //User send otp Api Sanctum implementation
    public function sendOTP(Request $request)
    {
        //validate request
        $email = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        try{  
            $otp = rand(10000, 99999);
            $count = User::where('email', $email)->count();

            if($count === 1){
                //send otp to user email
                mail::to($email)->send(new OTPMail($otp));

                //save otp to database
                User::where('email', $email)->update(['otp' => $otp]); 

                return response()->json([
                    'message' => "OTP sent successfully",
                    'status' => 200,
                    'otp' => $otp
                ], 200);            
            }

            return response()->json([
                'message' => "User not found",
                'status' => 404
            ], 404);

        }catch(Exception $e){
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }
        
    }

    //User verify otp Api Sanctum implementation
    public function verifyOTP(Request $request)
    {
        try{
            $email = $request->email;
            $otp = $request->otp;
            
            $user = User::where('email', $email)->where('otp', $otp)->first();

            if($user !== null){
                $user::where('email', $email)->update(['otp' => 0]);

                $token = $user->createToken('reset_password_token')->plainTextToken;

                return response()->json([
                    'message' => "OTP verified successfully",
                    'status' => 200,
                    'token' => $token
                ], 200);
            }

            return response()->json([
                'success' => "failed",
                'message' => "Invalid OTP or email.",
                'status' => 400
            ], 400);

        }catch(Exception $e){
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }
    }

    //User Reset Password Api Sanctum implementation
    public function forgetPassword(Request $request)
    {
        try{
            //  Validate input
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);

            // Get authenticated user from Sanctum token
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Unauthorized or invalid token.',
                ], 401);
            }

            // Update password securely
            $user->update([
                'password' => bcrypt($request->password),
            ]);

            // Delete token after successful reset (for security)
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'status'  => 'success',
                'message' => 'Password reset successfully.',
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'message' =>  $e->getMessage(),
                'status'  => 500,
            ], 500);
        }
    }
    
}
