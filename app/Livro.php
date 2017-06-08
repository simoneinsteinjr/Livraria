<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'titulo',
        'autor_id',
        'area_id',
        'edicao',
        'editora',
        'quantidade',
        'preco',
        'documento',
        'foto',
    ];

    public function Autor(){
        return $this->belongsTo('App\Autor');
    }

    public function Area(){
        return $this->belongsTo('App\Area');
    }

    protected $table = 'livros';
}
