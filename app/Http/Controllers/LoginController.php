<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:3'],
            'remember' => ['nullable'],
        ]);

        $auth = Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ], isset($validated['remember']));

        if ($auth) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()
            ->back()
            ->withErrors([
                'email' => 'Email atau password salah!'
            ])
            ->withInput($request->all());
    }
}
