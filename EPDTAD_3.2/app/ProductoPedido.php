<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductoPedido
 *
 * @property $id
 * @property $id_producto
 * @property $id_pedido
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductoPedido extends Model
{
    
    static $rules = [
		'id_producto' => 'required',
		'id_pedido' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto','id_pedido','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedido()
    {
        return $this->hasOne('App\Pedido', 'id', 'id_pedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Producto', 'id', 'id_producto');
    }
    

}
