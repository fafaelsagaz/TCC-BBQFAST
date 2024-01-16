<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Cliente;
use App\Models\Prestadore;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'telefone',
        'password',
        'user_id_recusou',
        'image',
        "CD_CNPJ",
        "DS_DESCRICAO",
        "services_id",
        "specialties_id",
        "DS_ESPECIALIZACAO",
    ];

    protected $attributes = [
        'image'=> '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
    ];

    protected $guarded = [];

    protected $table = "Users";


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function eventos(){
    return $this->hasMany(Evento::class);
}

public function cliente(): HasOne
{
    return $this->hasOne(Cliente::class, 'CD_CLIENTE'); // Substitua 'user_id' pelo nome correto da chave estrangeira
}
public function prestador(): HasOne
{
    return $this->hasOne(Prestadore::class, 'CD_PRESTADOR'); // Substitua 'user_id' pelo nome correto da chave estrangeira
}
public function eventosRecusados(): BelongsToMany
{
    return $this->belongsToMany(Evento::class, 'user_id_recusou', 'user_id', 'CD_PEDIDO')
        ->withPivot('NM_STATUS'); // Certifique-se de incluir o pivot
}

public function eventoss()
{
    return $this->hasMany(Evento::class, 'user_id'); // 'user_id' deve ser a chave estrangeira correta
}
// No modelo Evento.php


}
