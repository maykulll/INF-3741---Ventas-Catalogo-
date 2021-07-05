<?php

namespace Database\Seeders;

use App\Models\Colour;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario1 = User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('asdfghjklñ'),
            'role' => '1',
            'urlimage' => 'user.png'
        ]);
        $usuario2 = User::create([
            'name' => 'cliente',
            'email' => 'cliente@cliente',
            'password' => Hash::make('asdfghjklñ'),
            'role' => '3',
            'urlimage' => 'user.png'
        ]);
        $verde = Colour::create([
            'colour' => 'Verde'
        ]);
        $colo2 = Colour::create([
            'colour' => 'Verde'
        ]);
        $colo3 = Colour::create([
            'colour' => 'Rojo'
        ]);
        $colo4 = Colour::create([
            'colour' => 'Azul'
        ]);
        $colo5 = Colour::create([
            'colour' => 'Negro'
        ]);
        $colo6 = Colour::create([
            'colour' => 'Rosado'
        ]);
        $colo7 = Colour::create([
            'colour' => 'Blanco'
        ]);
        $colo8 = Colour::create([
            'colour' => 'Amarillo'
        ]);
        $colo9 = Colour::create([
            'colour' => 'Morado'
        ]);
        $colo10 = Colour::create([
            'colour' => 'Gris'
        ]);
    }
}
