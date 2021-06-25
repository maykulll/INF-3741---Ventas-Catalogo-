<?php

namespace Database\Seeders;

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
            'name'=>'admin',
            'email'=>'admin@admin',
            'password'=>Hash::make('asdfghjklñ'),
            'role'=>'1'
        ]);
        $usuario2 = User::create([
            'name'=>'cliente',
            'email'=>'cliente@cliente',
            'password'=>Hash::make('asdfghjklñ'),
            'role'=>'3'
        ]);
    }
}
