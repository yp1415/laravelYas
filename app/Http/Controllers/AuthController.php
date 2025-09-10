<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        
        $user = User::create([
            'name' => $request->name,
            'mobile' =>$request->mobile,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'data' => [
                'user' => new UserResource($user),
                'access_token' => $token,
            ]
        ], 201);

    }

    public function login(UserRequest $request)
    {

        $user = User::firstWhere('email', $request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()
                ->json(['error' => 'Invalid email or password'], 401);
        }

        $token = $user->createToken('login_token')->plainTextToken;

        return response()->json([
            'message' => 'logged in successfully',
            'user' => new UserResource($user),
            'access_token' => $token,
        ]);

    }
}
