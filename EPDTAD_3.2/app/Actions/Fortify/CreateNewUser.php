<?php

namespace App\Actions\Fortify;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            //añadir telefono
            'telefono' => ['required', 'string', 'regex:/^[0-9]{9}$/'],
            ])->validate();


        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'telefono' => $input['telefono'],
            'password' => Hash::make($input['password']),
            'idioma'=> 'en',
        ]);



        // Asignar el rol de cliente al usuario
        app()->setLocale($user->idioma);
        $user->assignRole('cliente');
        $carrito = new Carrito();
        $carrito->user_id = $user->id;
        $carrito->save();

        return $user;
    }
}
