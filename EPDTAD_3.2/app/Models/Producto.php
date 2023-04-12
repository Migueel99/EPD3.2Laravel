<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $imagen
 * @property $stock
 * @property $created_at
 * @property $updated_at
 *
 * @property Descuento[] $descuentos
 * @property ProductoCarrito[] $productoCarritos
 * @property ProductoPedido[] $productoPedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{

    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
		'imagen' => 'required',
		'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','precio','imagen','stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descuentos()
    {
        return $this->hasMany('App\Descuento', 'id_producto', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productoCarritos()
    {
        return $this->hasMany('App\Models\ProductoCarrito', 'id_producto', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productoPedidos()
    {
        return $this->hasMany('App\Models\ProductoPedido', 'id_producto', 'id');
    }


}
