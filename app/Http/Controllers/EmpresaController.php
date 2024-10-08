<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa; // Certifique-se de que o nome do modelo está correto

class EmpresaController extends Controller
{

    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'RAZAO_SOCIAL' => 'required|string|max:255',
            'NOME_FANTASIA' => 'required|string|max:255',
            'TP_PESSOA' => 'required|in:J,F',
            'DOCUMENTO' => 'required|string|max:255',
        ]);

        // Criação de nova empresa
        Empresa::create($validated);

        return redirect()->route('painel.index')->with('success', 'Empresa cadastrada com sucesso!');
    }


    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'RAZAO_SOCIAL' => 'required|string|max:255',
            'NOME_FANTASIA' => 'required|string|max:255',
            'TP_PESSOA' => 'required|in:J,F',
            'DOCUMENTO' => 'required|string|max:255',
            'ATIVO' => 'required|boolean',
        ]);

        // Obtém a empresa pelo ID e atualiza os dados
        $empresa = Empresa::findOrFail($id);
        $empresa->update(array_merge($validated, [
            'DATA_MODIFICACAO' => now(), // Atualiza o campo DATA_MODIFICACAO com a data e hora atuais
        ]));

        return redirect()->route('painel.index')->with('success', 'Empresa atualizada com sucesso!');
    }
}
