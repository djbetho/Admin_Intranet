<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuarios
        Permission::create([
        	'name'=>'Navegar usuarios',
        	'slug'=>'user.index',
        	'description'=>'Lista y navega todos los usuarios del sistema',
        ]);
         Permission::create([
        	'name'=>'Ver detalla usuarios',
        	'slug'=>'user.show',
        	'description'=>'Vee en detalle el usuario del sistema',
        ]);
         Permission::create([
        	'name'=>'Crear un usuario',
        	'slug'=>'user.create',
        	'description'=>'crear cualquier usuario del sistema',
        ]);
      	Permission::create([
        	'name'=>'Editar usuario',
        	'slug'=>'user.edit',
        	'description'=>'Editar detalle del usuario del sistema',
        ]);
           Permission::create([
        	'name'=>'Elimiar usuarios',
        	'slug'=>'user.destroy',
        	'description'=>'Elimiar cualquier usuario del sistema',
        ]);

           //Roles
        Permission::create([
        	'name'=>'Navegar Roles',
        	'slug'=>'roles.index',
        	'description'=>'Lista y navega todos los Roles del sistema',
        ]);
         Permission::create([
        	'name'=>'Ver detalla Roles',
        	'slug'=>'roles.show',
        	'description'=>'Ver en detalle el Role del sistema',
        ]);
             Permission::create([
        	'name'=>'Crear un Roles',
        	'slug'=>'roles.create',
        	'description'=>'crear cualquier Role del sistema',
        ]);
          Permission::create([
        	'name'=>'Editar Roles',
        	'slug'=>'roles.edit',
        	'description'=>'Editar detalle del Roles del sistema',
        ]);
           Permission::create([
        	'name'=>'Elimiar Roles',
        	'slug'=>'roles.destroy',
        	'description'=>'Elimiar cualquier Roles del sistema',
        ]);


             //solicitud
        Permission::create([
        	'name'=>'Navegar por solicitudes',
        	'slug'=>'solicitud.index',
        	'description'=>'Lista y navega todos las solicitud en el sistema',
        ]);
         Permission::create([
        	'name'=>'Ver detalle de una solicitud',
        	'slug'=>'solicitud.show',
        	'description'=>'Ver en detalle un solicitud en el sistema',
        ]);
             Permission::create([
        	'name'=>'Crear un solicitudes',
        	'slug'=>'solicitud.create',
        	'description'=>'crear cualquier solicitud en el sistema',
        ]);
          Permission::create([
        	'name'=>'Editar solicitudes',
        	'slug'=>'solicitud.edit',
        	'description'=>'Editar detalle de una solicitud en  el sistema',
        ]);
           Permission::create([
        	'name'=>'Elimiar solicitudes',
        	'slug'=>'solicitud.destroy',
        	'description'=>'Elimiar cualquier solicitud en el sistema',
        ]);


        //Permiso
     Permission::create([
       'name'=>'Navegar Permisos',
       'slug'=>'permission.index',
       'description'=>'Lista y navega todos los Permisos del sistema',
     ]);
      Permission::create([
       'name'=>'Ver detalle Permisos',
       'slug'=>'permission.show',
       'description'=>'Ver en detalle el Role del sistema',
     ]);
          Permission::create([
       'name'=>'Crear un Permisos',
       'slug'=>'permission.create',
       'description'=>'crear Permisos del sistema',
     ]);
       Permission::create([
       'name'=>'Editar Permisos',
       'slug'=>'permission.edit',
       'description'=>'Editar detalle del Permisos del sistema',
     ]);
        Permission::create([
       'name'=>'Elimiar Permisos',
       'slug'=>'permission.destroy',
       'description'=>'Elimiar cualquier Permisos del sistema',
     ]);

     //Licencia
  Permission::create([
    'name'=>'Navegar Licencia',
    'slug'=>'licencia.index',
    'description'=>'Lista y navega todos las licencia en el sistema',
  ]);
   Permission::create([
    'name'=>'Ver detalle Licencia',
    'slug'=>'licencia.show',
    'description'=>'Ver en detalle  una licencia en el sistema',
  ]);
       Permission::create([
    'name'=>'Crear un Licencia',
    'slug'=>'licencia.create',
    'description'=>'crear licencia en el sistema',
  ]);
    Permission::create([
    'name'=>'Editar Licencia',
    'slug'=>'licencia.edit',
    'description'=>'Editar detalle de licencia del sistema',
  ]);
     Permission::create([
    'name'=>'Elimiar Licencia',
    'slug'=>'licencia.destroy',
    'description'=>'Elimiar cualquier licencia del sistema',
  ]);

      //Asistencia
    Permission::create([
     'name'=>'Navegar asistencia',
     'slug'=>'asistencia.index',
     'description'=>'Lista y navega todos las asistencia en el sistema',
    ]);
    Permission::create([
     'name'=>'Ver detalle asistencia',
     'slug'=>'asistencia.show',
     'description'=>'Ver en detalle  una asistencia en el sistema',
    ]);
        Permission::create([
     'name'=>'Crear un asistencia',
     'slug'=>'asistencia.create',
     'description'=>'crear asistencia en el sistema',
    ]);
     Permission::create([
     'name'=>'Editar asistencia',
     'slug'=>'asistencia.edit',
     'description'=>'Editar detalle de asistencia del sistema',
    ]);
      Permission::create([
     'name'=>'Elimiar asistencia',
     'slug'=>'asistencia.destroy',
     'description'=>'Elimiar cualquier asistencia  del sistema',
    ]);

    }
}
