<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'user_id',
        'nome',
        'provincia',
        'telefone',
        'cartaoCredito',
        'preco',
        'documento',
        'foto',
    ];

    protected $table = 'pagamentos';
}
