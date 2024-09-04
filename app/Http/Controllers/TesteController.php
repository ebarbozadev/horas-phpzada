<?php

namespace App\Http\Controllers;

use App\Models\Teste;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $teste = Teste::create([
            'nome' => $request->nome,
        ]);

        return response()->json($teste, 201);
    }
}
