<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterUserRequest;

class ApiAuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('email', $request->only('email'));

        return $this->ok(
            [
                'token' => $user->createToken($request->email)->plainTextToken,
                "user" => $user
            ],
            'Authenticated'
        );
    }

    public function register(RegisterUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            "role_id" => $request->role_id,
            "profile_picture" => $request->profile_picture,
            'password' => Hash::make($request->string('password')),
        ]);

        return $this->ok(
            [
                'token' => $user->createToken($request->email)->plainTextToken
            ],
            'Registered'
        );
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->ok($message = 'Logged out sucessfully');
    }
}
