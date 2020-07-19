<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|max:12|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user->save())
            return response()->json('User successfully created', 201);
        else
            return response()->json('Bad Requesdt', 400);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:6|max:12'
        ]);

        $credentials = [ 
            'email' => $request->email, 
            'password' => $request->password
        ];

        if( !Auth::attempt($credentials) )
            return response()->json('Acess dined', 401);
        
        $token = $request->user()->createToken('authToken')->accessToken;

        return response()->json(['user' => $request->user(),'token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json('Token Rekoved');
    }
}
