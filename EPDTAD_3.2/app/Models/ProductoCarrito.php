<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductoCarrito
 *
 * @property $id
 * @property $id_producto
 * @property $id_carrito
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrito $carrito
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductoCarrito extends Model
{

    static $rules = [
		'id_producto' => 'required',
		'id_carrito' => 'required',
        'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto','id_carrito','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrito()
    {
        return $this->hasOne('App\Models\Carrito', 'id', 'id_carrito');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }


}
