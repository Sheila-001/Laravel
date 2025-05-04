<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // Find or create a user with the given email
        $user = \App\Models\User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => 'Demo User',
                'password' => bcrypt($request->password),
            ]
        );

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('products.create');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
