<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

        $user = User::where('email', $loginData['email'])->first();

        //check user exist
        if (!$user) {
            return response(['mesage' => 'Invalid Credentials'], 401);
        }

        //check password exist
        if (!Hash::check($loginData['password'], $user->password)) {
            return response(['mesage' => 'Invalid Credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response(['user' => $user, 'token' => $token], 201);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response(['message' => 'Logged out'], 200);
    }
}