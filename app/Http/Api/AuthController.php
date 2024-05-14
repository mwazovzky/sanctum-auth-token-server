<?php

namespace App\Http\Api;

use App\Http\Api\LoginUserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request): JsonResponse
    {
        $attributes = $request->validated();

        if (!Auth::attempt($attributes)) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }

        /** @var User $user */
        $user = User::firstWhere('email', $attributes['email']);
        $token = $user->createToken('API token for ' . $user->email)->plainTextToken;

        return response()->json([
            'message' => 'Authenticated.',
            'data' => [
                'token' => $token,
            ],
        ], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([], 204);
    }
}
