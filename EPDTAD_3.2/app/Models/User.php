<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Passwords\CanResetPassword;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'telefono',
        'direccion',
        'idioma',
    ];

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
    ];
    public function carritos()
    {
        return $this->hasOne('App\Models\Carrito', 'user_id', 'id');
    }

    public function direcciones()
    {
        return $this->hasMany('App\Models\Direccione', 'user_id', 'id');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido', 'user_id', 'id');
    }

    public function favoritos()
    {
        return $this->hasMany('App\Models\Favorito', 'user_id', 'id');
    }
}
