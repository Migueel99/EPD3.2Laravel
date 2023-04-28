<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriaProducto
 *
 * @property $id
 * @property $categoria_id
 * @property $productos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriaProducto extends Model
{
    
    static $rules = [
		'categoria_id' => 'required',
		'productos_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','productos_id'];

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Categoria', 'id', 'categoria_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Productos', 'id', 'productos_id');
    }
    



}
