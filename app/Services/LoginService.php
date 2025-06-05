<?php

namespace App\Services;

use App\Models\UserModel;
use Illuminate\Http\Request;
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:Users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new UserModel();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'owner';
        $user->save();

        $this->login($user->email, $validatedData['password']);

        return $user;
    }
    public function user()
    {
        return Auth::user();
    }
}