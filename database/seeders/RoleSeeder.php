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
        Permission::create(['name' => 'users'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'clases.create'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'clases.index'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'clases.edit'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'clases.destroy'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas.create'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'rutinas.index'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas.edit'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas.destroy'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.create'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.index'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.edit'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'rutinas-ejercicios.destroy'])->syncRoles([$Role1,$Role2,$Role3]);
        Permission::create(['name' => 'roles'])->syncRoles([$Role1,$Role3]);;
        Permission::create(['name' => 'ejercicios.create'])->syncRoles([$Role1,$Role3]);
        Permission::create(['name' => 'ejercicios.index'])->syncRoles([$Role1,$Role2,$Role3]);
    }

}
