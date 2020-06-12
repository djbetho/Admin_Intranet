<?php

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
        DB::table('users')->insert([
            'rut' => '1353762-3',
            'name' => 'Ruperto',
            'apellido' => 'Bugueño Plaza',
            'email' => 'admin@material.com',
            'direccion' => 'bruno larrain #200 , salamanca',
            'telefono' => '990933723',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

    
