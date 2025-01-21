<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\User\UserLoginDto;
use App\Dto\User\UserRegisterDto;
use App\Exceptions\Auth\InvalidLoginDetailsException;
use App\Exceptions\Auth\UserAlreadyExistsException;
use App\Exceptions\Auth\UserNotFoundException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

readonly class AuthService
{
    /**
     * @throws Exception
     */
    public function login(UserLoginDto $userLoginDto): void
    {
        /** @var User $user */
        $user = User::query()
            ->where('email', $userLoginDto->email)
            ->first();

        if (! $user) {
            throw new UserNotFoundException;
        }

        if (! Auth::attempt(UserLoginDto::toArray($userLoginDto))) {
            throw new InvalidLoginDetailsException;
        }
    }

    /**
     * @throws Exception
     */
    public function register(
        UserRegisterDto $userRegisterDto,
        ?User $user
    ): User {
        if ($user) {
            throw new UserAlreadyExistsException;
        }

        /** @var User $user */
        $user = User::query()
            ->create([
                'name' => $userRegisterDto->name,
                'email' => $userRegisterDto->email,
                'password' => $userRegisterDto->password,
            ]);

        return $user;
    }
}
