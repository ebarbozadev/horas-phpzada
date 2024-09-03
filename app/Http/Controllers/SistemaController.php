<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function index()
    {
        // Aqui você pode retornar uma view ou qualquer outra lógica necessária
        return view('sistema');  // Isso retorna uma view chamada "sistema.blade.php"
    }
}
