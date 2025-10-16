<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Modules;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Modules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //Register User
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);



        return response()->json(["id"=>$user['id'], "name"=>$user['name'], "email"=>$user['email'], "created_at"=>$user['created_at'] ], 201);
    }

    // Login user and return token
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = Auth::user()->createToken('API Token')->plainTextToken;
        $user = Auth::user();

        return response()->json(['token' => $token, 'user_id' => $user['id']]);
    }

}
