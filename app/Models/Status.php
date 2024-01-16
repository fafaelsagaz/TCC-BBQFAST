<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable =[
        
      'NM_STATUS'
       
    ];

    public function eventos(){
        return $this->hasMany(Evento::class);
    }

}
