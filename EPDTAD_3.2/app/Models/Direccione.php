<?php

namespace App;

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
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['direccion','user_id'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


}
