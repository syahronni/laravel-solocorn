<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // return $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            // $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;
            $success['email'] = $auth->email;

            return response()->json([
                'code' => 200,
                'message' => 'Login berhasil!',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'Email atau Password anda salah',
                'data' => null
            ]);
        }
    }
}
