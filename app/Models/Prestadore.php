<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\Specialty;
use App\Models\Service;
use App\Models\Plano;

class Prestadore extends Model
{
    use HasFactory;

    protected $primaryKey = "CD_PRESTADOR";

    protected $guarded = [];

    protected $table = "Prestadores";


    public function User(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function Specialty(): BelongsTo{

        return $this->belongsTo(Specialty::class, 'specialties_id', 'id');
    }


    public function Service(): BelongsTo{

        return $this->belongsTo(Service::class, 'services_id', 'id');
    }

    public function Plano(): BelongsTo{

        return $this->belongsTo(Plano::class, 'planos_id', 'id');
    }

    public function getPerfil()
    {
        $prestadore = auth()->user();

        return $prestadore;
    }

    protected $fillable = [
        "CD_CNPJ",
        "DS_DESCRICAO",
        "services_id",
        "specialties_id",
        "planos_id",
        'create_at' , 'update_at'
    ];
}
