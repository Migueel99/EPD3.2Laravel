<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrito
 *
 * @property $id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @property ProductoCarrito[] $productoCarritos
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carrito extends Model
{
    
    static $rules = [
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedido()
    {
        return $this->hasOne('App\Pedido', 'id_carrito', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productoCarritos()
    {
        return $this->hasMany('App\ProductoCarrito', 'id_carrito', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    

}
