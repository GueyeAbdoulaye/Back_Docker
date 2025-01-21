<?php

namespace App\Http\Controllers;

use App\Dto\User\UserLoginDto;
use App\Dto\User\UserRegisterDto;
use App\Http\Requests\UserRegisterRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        public readonly AuthService $authService
    ) {}

    /**
     * @throws Exception
     */
    public function login(Request $request): JsonResponse
    {
        $userLoginData = UserLoginDto::fromArray(
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ])
        );

        $this->authService->login($userLoginData);

        $request->session()->regenerate();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @throws Exception
     */
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $user = $this->authService->register(
            UserRegisterDto::fromArray($request->validated()),
            $request->user()
        );

        return new JsonResponse($user, Response::HTTP_CREATED);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
