<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Altere para herdar de Authenticatable
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable // Mudança de Model para Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = ['NOME', 'EMAIL', 'ID_EMPRESA', 'SENHA'];

    protected $hidden = ['SENHA', 'remember_token'];

    public function setSenhaAttribute($value)
    {
        $this->attributes['SENHA'] = bcrypt($value);
    }
}
