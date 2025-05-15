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
                'email' => ['The provided credentials are incorrect.'],
            ]);
        } 

        return $user->createToken($request->username)->plainTextToken;
    }



    public function signout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully signed out']);
    }
}
