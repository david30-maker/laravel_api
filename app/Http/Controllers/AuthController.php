<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validated = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create(attributes: [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(value: $validated['password']),
        ]);

        $token = $user->createToken(name: 'auth_token')->plainTextToken;

        return response()->json(data: [
            'access_token' => $token,
            'user' => $user
        ], status: 200);

    }
}
