<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SigninApiController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.']
            ]);
        } 
        
        $token = $user->createToken($request->username)->plainTextToken;

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Sign in successful',
            'data' => [
                'token' => $token,
                'user' => $user
            ]
        ]);
    }



    public function signout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully signed out'
        ]);
    }
}
