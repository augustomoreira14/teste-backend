<?php

namespace App\Http\Controllers;

use App\Domain\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiTokenController extends Controller
{
    public function getToken(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = $request->only("email", "password");

        if(Auth::once($credentials)){

            return response()->json([
                'api_token' => $request->user()->api_token
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials.'
        ], 401);
    }
}
