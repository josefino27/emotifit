<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creamos nuevo registro de roles
        $Role1=Role::create([ 'name'  => 'Admin']);
        $Role2=Role::create([ 'name'  => 'Usuario']);
        $Role3=Role::create([ 'name'  => 'entrenador']);
        Permission::create(['name' => 'users','description'=>'gestionar usuarios'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'clases.create','description'=>'crear clases'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'clases.index','description'=>'ver clases'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'clases.edit','description'=>'editar clases'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'clases.destroy','description'=>'eliminar clases'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas.create','description'=>'crear rutinas'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'rutinas.index','description'=>'ver rutinas'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas.edit','description'=>'editar rutinas'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas.destroy','description'=>'eliminar rutinas'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.create','description'=>'crear rutinas'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.index','description'=>'ver rutinas'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.edit','description'=>'editar rutinas'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.destroy','description'=>'eliminar rutinas'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'roles','description'=>'gestionar roles y permisos'])->syncRoles([$Role1,$Role3]);;
        Permission::create(['name' => 'ejercicios.create','description'=>'crear ejercicios'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'ejercicios.index','description'=>'ver ejercicios'])->syncRoles([$Role1,$Role2,$Role3]);
    }

}
