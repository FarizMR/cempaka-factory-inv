<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($data)) {
            $user = auth()->user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ])->setStatusCode(200);
        } else {
            return response()->json([
                'message' => 'Email atau password salah'
            ])->setStatusCode(401);
        }
    }
}
