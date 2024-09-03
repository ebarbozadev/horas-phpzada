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

    public function store(Request $request)
    {
        // Validar os dados da requisição
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios', // Corrigir para 'usuarios'
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Criar o usuário com a senha hasheada
        $user = Usuario::create([
            'NOME' => $request->name, // Altere para corresponder ao campo correto
            'EMAIL' => $request->email,
            'SENHA' => Hash::make($request->password), // Hash da senha
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
}
