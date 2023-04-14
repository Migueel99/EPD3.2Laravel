<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $id_carrito
 * @property $estado
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrito $carrito
 * @property ProductoPedido[] $productoPedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{

    static $rules = [
		'user_id' => 'required',
		'estado' => 'required',
        'direccion' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','estado','direccion','total','direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productoPedidos()
    {
        return $this->hasMany('App\Models\ProductoPedido', 'id_pedido', 'id');
    }


}
