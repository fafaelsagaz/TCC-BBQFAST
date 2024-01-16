<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoRecusal extends Model
{
    protected $table = 'user_id_recusou'; // O nome da tabela para os registros de recusa

    protected $fillable = [
        'CD_PEDIDO', // O ID do pedido recusado
        'user_id',   // O ID do usuário que recusou
    ];

    // Relação com o modelo Evento (caso necessário)
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'CD_PEDIDO');
    }

    // Relação com o modelo User (caso necessário)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

