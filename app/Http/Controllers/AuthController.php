<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $session_time = Carbon::now();
            $time = $session_time->format('y_m_d_h_m');
            $email = Auth::user()->email;
            $token_structure  = $time . $email;
            $abilities = ['*'];
            // $token_access = $user->tokens()->create([
            //     'name' => 'customer-token',
            //     'token' => hash('sha1', $plainTextToken = getRandomString()),
            //     'abilities' => $abilities,
            // ]);

            //$token_access = new NewAccessToken($token, $token->getKey() . '|' . $plainTextToken);
            $token = $user->createToken('custom-token')->plainTextToken;
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Su sesión ha sido iniciada correctamente',
                    'token' => $token
                ],
                200
            );
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales Invalidas'
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json([

            'success'    => true,
            'message'   => 'Su sesión ha sido sesión correctamente'

        ], 200);
    }
}
