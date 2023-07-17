<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $result = [];

        if(!Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $result = [
                'valid' => false
            ];

            return $result;
        } else {
            $request->session()->regenerate();

            $result = [
                'valid' => true
            ];

            return $result;
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $data = [
            'valid' => true
        ];

        return $data;
    }

    public function getAuthenticatedUser()
    {
        $data = Auth::user();

        return response()->json($data)->setStatusCode(200);
    }
}
