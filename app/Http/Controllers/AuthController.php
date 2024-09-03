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
        // Validar os dados da requisição
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            $request->session()->regenerate();
            return response()->json(['message' => 'Login successful'], 200);
        }

        // Autenticação falhou
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
