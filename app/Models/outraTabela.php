<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outraTabela extends Model
{
    use HasFactory;

    protected $fillable =[
        'CD_CPF',
        'CD_CNPJ',
        'CD_TELEFONE',
        'DS_SERVICO',
        'DS_ESPECIALIZAÇAO',
       
       
    ];
}
