<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create([
        'name'=>'Administrador',
        'slug'=>'admin.setup',
        'special'=>'all-access',
      ]);
      Role::create([
        'name'=>'Trabajador',
        'slug'=>'trabajador.setup',

      ]);
      Role::create([
        'name'=>'Administrativo',
        'slug'=>'administrativo.setup',
      ]);
      Role::create([
        'name'=>'Director',
        'slug'=>'director.setup',

      ]);
    }
}
