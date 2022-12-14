<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if ($validator->fails()) {
            return sendErrorResponse('Client side validation error', $validator->errors(), 422);
        }

        try {
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                $token = $user->createToken($request->email)->plainTextToken;
                $user = DB::table('users')->join("roles", "users.role_id", "=", "roles.id")->select("users.*", "roles.role_name")->where("users.email", $request->email)->first();

                $isManager = User::where("manager_id", $user->id)->first();
                if ($isManager) {
                    $user->isManager = true;
                } else {
                    $user->isManager = false;
                }
                return sendSuccessResponse($user, 'Login successful', 200, $token);
            } else {
                return sendErrorResponse('Email and password does not match with our records', 422);
            }
        } catch (\Throwable $e) {
            return sendErrorResponse('Database Error!', $e->getMessage(), 500);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return sendSuccessResponse([], 'Logout successful');
    }
}
