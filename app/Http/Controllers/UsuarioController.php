<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;



class UsuarioController extends Controller
{

    use HasApiTokens;

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

            // Criar um token e retorná-lo na resposta
            $token = $user->createToken('YourAppName')->plainTextToken;

            return response()->json([
                'token' => $token,
            ]);
        }

        // Autenticação falhou
        return response()->json(['message' => 'Credenciais inválidas'], 401);
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
