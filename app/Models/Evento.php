<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Evento extends Model
{
    use HasFactory;

    protected $primaryKey = 'CD_PEDIDO';
    protected $fillable = [

        'DS_SERVICO',
        'DT_PEDIDO',
        'DS_EVENTO',
        'DS_QUANTIDADE_EVENTO',
        'DT_EVENTO',
        'HR_EVENTO',
        'HR_DURACAO',
        'NM_ENDERECO_EVENTO',
        'CD_TELEFONE_EVENTO',
        'user_id_recusou',
        'FK_CD_PRESTADOR',
        'services_id',
        'user_id',
        'name',
        'NM_STATUS',
        'DS_EVENTO',
        'user_id_recusou',
        'churrasqueiro_id',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function recusouUsuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_id_recusou', 'CD_PEDIDO', 'user_id');
    }

    public function recebidoPor()
    {
        return $this->belongsToMany(User::class, 'user_id_recusou', 'CD_PEDIDO', 'user_id');
    }

    public function eventosRecusados()
    {
        return $this->belongsToMany(Evento::class, 'user_id_recusou', 'user_id', 'CD_PEDIDO')
            ->withPivot('NM_STATUS'); // Certifique-se de incluir o pivot
    }

    public function usuariosRecusaram()
    {
        return $this->belongsToMany(User::class, 'user_id_recusou', 'CD_PEDIDO', 'user_id')
            ->withPivot('NM_STATUS');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Service()
    {
        return $this->belongsTo(Service::class, 'services_id', 'id');
    }
}
