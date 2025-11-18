<?php

namespace App\User;

use App\User\Requests\UserLoginRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Infrastructure\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Authenticate an User.
     */
    public function authenticate(UserLoginRequest $request): Response
    {
        $credentials = $request->validated();
        $user = User::where('email', $credentials['email'])->first();
        $password = $credentials['password'];

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials.'],
            ]);
        }

        $response = [
            'token' => $user->createToken('api-token')->plainTextToken,
        ];

        return response($response);
    }
}
