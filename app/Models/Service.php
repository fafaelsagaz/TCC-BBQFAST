<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Prestadore;

class Service extends Model
{

    protected $fillable = ['id', 'DS_SERVICO','DS_DESCRICAO', 'CD_CNPJ','DS_ESPECIALIZAÇAO', 'services_id'];
    use HasFactory;


    public function Prestadore(): HasMany{
        return $this->hasMany(Prestadore::class);
    }
}
