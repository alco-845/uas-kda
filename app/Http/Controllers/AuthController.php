<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if (Hash::check($password, $user->password)) {
            $apiToken = base64_encode(Str::random(40));
            $date = Carbon::now();
            $expiredDay = $date->addDays(7);

            $user->update([
                'api_token' => $apiToken,
                'token_expired' => $expiredDay
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Login Success',
                'data' => [
                    'user' => $user,
                    'api_token' => $apiToken
                ]
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Failed',
                'data' => ''
            ]);
        }
    }
}
