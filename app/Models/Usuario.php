<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'ID_EMPRESA',
        'NOME',
        'EMAIL',
        'SENHA',
        'ATIVO',
    ];

    protected $hidden = [
        'SENHA',
    ];

    public $timestamps = false;
}
