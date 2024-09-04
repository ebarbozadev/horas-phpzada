<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class PainelController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.empresaVisualizar', ['empresas' => $empresas]);
    }

    public function empresaCadastrar()
    {
        return view('empresa.empresaCadastrar');
    }

    public function empresaEditar($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresa.empresaEditar', compact('empresa'));
    }
}
