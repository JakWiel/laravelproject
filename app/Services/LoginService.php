<?php

namespace App\Services;

use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function authenticate(string $email, string $password)
    {
        $user = UserModel::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }

        return $user;
    }
    public function login($email, $password, $remember = false)
    {
        return Auth::attempt(['email' => $email, 'password' => $password], $remember);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function user()
    {
        return Auth::user();
    }
}