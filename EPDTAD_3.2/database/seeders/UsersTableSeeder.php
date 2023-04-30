<?php

namespace Database\Seeders;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Armando Bronca',
                'email' => 'armandoBronca@example.com',
                'password' => Hash::make('password'),
                'telefono' => '123456789',
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'password' => Hash::make('password'),
                'telefono' => '987654321',
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bobsmith@example.com',
                'password' => Hash::make('password'),
                'telefono' => '666777888',
            ],
        ];

        foreach ($users as $user) {
            $createdUser = User::create($user);
            Carrito::create([
                'user_id' => $createdUser->id,
            ]);
        }
    }
}
