<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class PainelController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();

        return view('empresaVisualizar', ['empresas' => $empresas]);
    }

    public function cadastrarEmpresa()
    {
        return view('empresaCadastrar');
    }
}
