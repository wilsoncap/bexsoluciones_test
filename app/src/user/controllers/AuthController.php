<?php

namespace App\src\user\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\src\user\models\User;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    /**
     * @unauthenticated
     */
    public function register(Request $request){
        try {
            $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        ;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json(['message' => 'Usuario creado'], 201);
        } catch (\Throwable $th) {
            dd('error', $th);
        }
    }

    /**
     * @unauthenticated
     */
    public function login(Request $request){
        
         $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales no coinciden.'],
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}
