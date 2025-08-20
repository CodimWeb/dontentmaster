<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('login', '=', $request->post('login'))->first();

        if (!$user || !Hash::check($request->post('password'), $user->password)) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Incorrect login or password',
            ], 422));
        }

        return response()->json([
            'success'   => true,
            'type'      => 'Bearer',
            'access_token'     => $user->createToken('api')->plainTextToken,
            'user'      => $user,
        ]);
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'user' => auth()->user()
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
