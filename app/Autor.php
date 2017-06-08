<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'nome',
        'apelido',
        'genero',
        'dataNascimento',
        'foto'
    ];

    protected $table = 'autores';
}
