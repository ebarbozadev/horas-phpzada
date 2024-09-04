<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        // Validar os dados da requisição
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'senha' => 'required|string',
        ]);

        // Tentar autenticar o usuário
        $user = Usuario::where('EMAIL', $credentials['email'])->first();

        if ($user && Hash::check($credentials['senha'], $user->SENHA)) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect('/painel');
        }

        // Autenticação falhou
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ID_EMPRESA' => 'required|integer',
            'NOME' => 'required|string|max:255',
            'EMAIL' => 'required|string|email|max:255|unique:usuarios',
            'SENHA' => 'required|string|min:8',
        ]);

        $user = Usuario::create([
            'ID_EMPRESA' => $validatedData['ID_EMPRESA'],
            'NOME' => $validatedData['NOME'],
            'EMAIL' => $validatedData['EMAIL'],
            'SENHA' => Hash::make($validatedData['SENHA']),
            'ATIVO' => true,
        ]);

        return response()->json([
            'message' => 'Usuário criado com sucesso!',
            'user' => $user,
        ], 201);
    }
}
