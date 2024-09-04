<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa; // Certifique-se de que o nome do modelo está correto

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all(); // Obtém todas as empresas
        return response()->json($empresas); // Retorna as empresas em formato JSON
    }
}
