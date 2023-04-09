<?php

namespace App;

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
		'id_carrito' => 'required',
		'estado' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_carrito','estado','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrito()
    {
        return $this->hasOne('App\Carrito', 'id', 'id_carrito');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productoPedidos()
    {
        return $this->hasMany('App\ProductoPedido', 'id_pedido', 'id');
    }
    

}
