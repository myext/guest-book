<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json('Unauthorized', 401);
        }

        return $this->sendUserData(User::find(Auth::user()->getAuthIdentifier()));
    }

    /**
     * @param RegisterRequest $request
     * @param UserService $service
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, UserService $service): JsonResponse
    {
        return $this->sendUserData($service->createUser($request->all()));
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    protected function sendUserData(User $user): JsonResponse
    {
        return response()->json([
            'token_type' => 'Bearer',
            'token' => $user->createToken('auth_token')->plainTextToken,
            'id' => $user->getAuthIdentifier(),
            'name' => $user->name,
            'email' => $user->email,
            'permissions' => $user->getPermissions(),
        ]);
    }
}
