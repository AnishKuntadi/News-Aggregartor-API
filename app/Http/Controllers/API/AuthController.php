<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Handles User Registration
    public function register(Request $request)
    {
        // Validate input data 
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            "confirm_password" => "required|same:password"
        ]);

        // Return validation errors 
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation Error",
                "data" => $validator->errors()->all()
            ]);
        }

        // Create a new user record 
        $user = User::create([ 
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        // Prepare a response and generated token with user details
        $response = [];
        $response["token"] = $user->createToken("news-aggregator")->plainTextToken;
        $response["name"] = $user->name;
        $response["email"] = $user->email;

        // Return success response
        return response()->json([
            "status" => 1,
            "message" => "User registered",
            "data" => $response
        ]);
    }

    //Handles user login
    public function login(Request $request)
    {
        // Attempt to authenticate the user
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            // Retrieve the authenticated user
            $user = Auth::user();

            // Check if the user instance is correct
            if ($user instanceof \App\Models\User) {
                // Prepare a response and generated token with user details
                $response = [];
                $response["token"] = $user->createToken("news-aggregator")->plainTextToken;
                $response["name"] = $user->name;
                $response["email"] = $user->email;

                // Return the response with the token
                return response()->json([
                    "status" => 1,
                    "message" => "User logged in successfully",
                    "data" => $response
                ]);
            } else {
                //Return error if the user is invalid
                return response()->json([
                    "status" => 0,
                    "message" => "Invalid user instance",
                    "data" => null
                ]);
            }
        }

        //return failed auhentication
        return response()->json([
            "status" => 0,
            "message" => "Authentication Error",
            "data" => null
        ]);
    }

}
