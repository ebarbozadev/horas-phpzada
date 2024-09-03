<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $campos = ['NOME', 'EMAIL', 'ID_EMPRESA'];
    protected $hidden = ['SENHA'];

    public function setSenha($valor)
    {
        $this->attributes['SENHA'] = bcrypt($valor);
    }
}
