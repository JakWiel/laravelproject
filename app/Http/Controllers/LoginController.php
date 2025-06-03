<?php

namespace App\Http\Controllers;
use App\Services\LoginService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private LoginService $service;
    public function __construct()
    {
        $this->service = new LoginService();
    }
    public function login(Request $request)
    {
        $user = $this->service->authenticate($request->email, $request->password);

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        // Store user in session
        Session::put('user', [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
        ]);

        // Redirect based on role
        return $user->role === 'admin'
            ? redirect('/dashboard')
            : redirect('/');
    }
    public function logout()
    {
        $this->service->logout();
        return redirect('/');
    }
}