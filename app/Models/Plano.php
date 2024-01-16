<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Prestadore;


class Plano extends Model
{
    use HasFactory;

    public function Prestadore(): HasMany{
        return $this->hasMany(Prestadore::class);
    }

    protected $fillable = [
        'id', 'nome','descricao','create_at' , 'update_at'
    ];
}
