<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoUserRelationship extends Model
{
    protected $table = 'user_id_recusou';

    protected $fillable =['NM_STATUS', 'create_at' , 'update_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'CD_PEDIDO');
    }
}
