<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Prestadore;



class Specialty extends Model
{
    use HasFactory;

    public function Prestadore(): HasMany{
        return $this->hasMany(Prestadore::class);
    }
}


