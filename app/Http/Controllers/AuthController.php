<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('sistema');
    }

    public function login(Request $request)
    {
        $credenciais = $request->only('email', 'senha');

        if (Auth::attempt(['EMAIL' => $credenciais['email'], 'senha' => $credenciais['password']], $request->remember)) {
            return redirect()->intended('painel');
        }

        return redirect()->back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
