<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Seat 600',
            'descripcion' => 'Sedan mediano de Toyota',
            'precio' => 25.00,
            'imagen' => '600.jpg',
            'stock' => 10,
            'favoritos' => 0,
        ]);

        Producto::create([
            'nombre' => 'Citroen C2',
            'descripcion' => 'Sedan mediano',
            'precio' => 28.00,
            'imagen' => 'c2.jpg',
            'stock' => 8,
            'favoritos' => 0,

        ]);

        Producto::create([
            'nombre' => 'Porsche 911',
            'descripcion' => 'Auto deportivo de Porsche',
            'precio' => 45.00,
            'imagen' => '911.jpg',
            'stock' => 5,
            'favoritos' => 0,

        ]);

        Producto::create([
            'nombre' => 'BMW M3',
            'descripcion' => 'Auto deportivo de BMW',
            'precio' => 5.00,
            'imagen' => 'm3.jpg',
            'stock' => 3,
            'favoritos' => 0,

        ]);

        Producto::create([
            'nombre' => 'Tesla Model S',
            'descripcion' => 'Auto eléctrico de Tesla',
            'precio' => 40.00,
            'imagen' => '600.jpg',
            'stock' => 2,
            'favoritos' => 0,

        ]);

        Producto::create([
            'nombre' => 'BMW X5',
            'descripcion' => 'SUV de BMW',
            'precio' => 65.00,
            'imagen' => 'm3.jpg',
            'stock' => 6,
            'favoritos' => 0,

        ]);



    }
}
