<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccione
 *
 * @property $id
 * @property $direccion
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Direccione extends Model
{

    static $rules = [
		'direccion' => 'required',
    'codigo_postal' => 'required',
    'ciudad' => 'required',
    'provincia' => 'required',
		'user_id' => 'required',
    'pais' => 'required',
    'telefono' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['direccion','user_id','codigo_postal','ciudad','provincia','pais','telefono'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


}
