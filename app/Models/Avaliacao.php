<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario','user_id','CD_PRESTADOR'
    ];

    public function prestadore(): BelongsTo{

        return $this->belongsTo(Prestadore::class, 'CD_PRESTADOR');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
