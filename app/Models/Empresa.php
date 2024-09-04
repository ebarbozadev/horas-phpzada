<?php

// app/Models/Empresa.php

// app/Models/Empresa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'RAZAO_SOCIAL',
        'NOME_FANTASIA',
        'TP_PESSOA',
        'DOCUMENTO',
        'ATIVO',
        'DATA_MODIFICACAO', // Adicione este campo
    ];

    public $timestamps = false;
}
