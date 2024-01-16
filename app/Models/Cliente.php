<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = "CD_CLIENTE";


    public function User(): BelongsTo{
        return $this->belongsTo(User::class);
    }


    protected $fillable = [
        'DT_NASCIMENTO_CLIENTE',
        'CD_CPF_CLIENTE',
    ];
}
