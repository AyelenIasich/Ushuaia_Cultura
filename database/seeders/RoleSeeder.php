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
    $Role1 = Role::create(['name' => 'admin']);
    $Role2 = Role::create(['name' => 'artista']);
    $Role3 = Role::create(['name' => 'creadorEvento']);
    $Role4 = Role::create(['name' => 'creadorMurales']);


    // // permisos favoritos para usuarios comunes
    // Permission::create(['name' => 'user.wishlist'])->assignRole($Role3);

    // permisos  galeria
    Permission::create(['name' => 'galerias.create', 'description' => 'Galería: Crear galería de artista'])->syncRoles([$Role2, $Role1]);
    Permission::create(['name' => 'galerias.edit', 'description' => 'Galería: Edición de las obras de artista'])->syncRoles([$Role2, $Role1]);
    Permission::create(['name' => 'galerias.destroy', 'description' => 'Galería: Eliminar obra de artista'])->syncRoles([$Role2, $Role1]);

    // permisos  eventos
    Permission::create(['name' => 'events.index', 'description' => 'Eventos: Ver lista'])->syncRoles([$Role1,$Role3] );
    Permission::create(['name' => 'events.create', 'description' => 'Eventos: Creación'])->syncRoles([$Role1,$Role3]);
    Permission::create(['name' => 'events.edit', 'description' => 'Eventos: Edición'])->syncRoles([$Role1,$Role3]);
    Permission::create(['name' => 'events.destroy', 'description' => 'Eventos: Eliminar evento'])->syncRoles([$Role1,$Role3]);

    // permisos  categorias solo para administradores
    Permission::create(['name' => 'categories.index', 'description' => 'Categorías de Evento: Ver listado'])->assignRole($Role1);
    Permission::create(['name' => 'categories.create', 'description' => 'Categorías de Evento: Crear'])->assignRole($Role1);
    Permission::create(['name' => 'categories.edit', 'description' => 'Categorías de Evento: Editar'])->assignRole($Role1);
    Permission::create(['name' => 'categories.destroy', 'description' => 'Categorías de Evento: Eliminar evento'])->assignRole($Role1);

    // permisos  para asignar roles a los usuarios solo para administradores
    Permission::create(['name' => 'users.index', 'description' => 'Usuarios: Ver listado'])->assignRole($Role1);
    Permission::create(['name' => 'users.edit', 'description' => 'Usuarios: Asignar un rol'])->assignRole($Role1);
    Permission::create(['name' => 'users.destroy', 'description' => 'Usuarios: Eliminar rol'])->assignRole($Role1);

    // permisos  para crear roles solo para administradores
    Permission::create(['name' => 'roles.index', 'description' => 'Roles: Ver listado'])->assignRole($Role1);
    Permission::create(['name' => 'roles.edit', 'description' => 'Roles: Edición'])->assignRole($Role1);
    Permission::create(['name' => 'roles.create', 'description' => 'Roles: Creación'])->assignRole($Role1);
    Permission::create(['name' => 'roles.destroy', 'description' => 'Roles: Eliminar rol'])->assignRole($Role1);

    // permisos  para ingresar artistas y ver la lista de astistas

    Permission::create(['name' => 'artists.index','description' => 'Listado de artistas: Ver la listado' ])->syncRoles([$Role1, $Role3, $Role4]);
    Permission::create(['name' => 'artists.create', 'description' => 'Listado de artistas: Ingresar un artista'])->syncRoles([$Role1, $Role2]);
    Permission::create(['name' => 'artists.edit', 'description' => 'Listado de artistas: Editar un artista'])->syncRoles([ $Role1, $Role2] );
    Permission::create(['name' => 'artists.storePerfil', 'description' => 'Listado de artistas: Actualizar mi perfil de artista'])->assignRole($Role2);
    Permission::create(['name' => 'artists.destroy', 'description' => 'Listado de artistas: Eliminar un artista'])->syncRoles([$Role1, $Role2]);


    // permisos  para crear y editar el main

    Permission::create(['name' => 'home.create', 'description' => 'Main: Crear el main'])->assignRole($Role1);
    Permission::create(['name' => 'home.store', 'description' => 'Main: Guardar presentación del main'])->assignRole($Role1);
    Permission::create(['name' => 'home.edit', 'description' => 'Main: Vista de edición del main'])->assignRole($Role1);
    Permission::create(['name' => 'home.update', 'description' =>'Main: Actualizar el main'])->assignRole($Role1);
    Permission::create(['name' => 'home.deleteimage', 'description' =>'Main: Eliminar imagen del carousel'])->assignRole($Role1);

    // permisos  para crear , editar y eliminar artistas
    Permission::create(['name' => 'artistas.index', 'description' => 'Artistas locales: Ver mi perfil de artista'])->syncRoles([$Role1, $Role2]);
    Permission::create(['name' => 'artistas.create', 'description' =>'Artistas locales: Crear perfil de un artista'])->syncRoles([$Role1,$Role2]);
    Permission::create(['name' => 'artistas.store', 'description' => 'Artistas locales: Guardar el artista en la página'])->syncRoles([$Role1,$Role2]);
    Permission::create(['name' => 'artistas.edit', 'description' => 'Artistas locales: Vista de edición del artista'])->syncRoles([$Role1,$Role2]);
    Permission::create(['name' => 'artistas.update', 'description' => 'Artistas locales: Actualizar la vista del artista'])->syncRoles([$Role1, $Role2]);
    Permission::create(['name' => 'artistas.destroy', 'description' => 'Artistas locales: Eliminar artista'])->syncRoles([$Role1,$Role2]);
    Permission::create(['name' => 'artistas.deletecover', 'description' => 'Artistas locales: Eliminar Cover del artista'])->syncRoles([$Role1,$Role2]);
    Permission::create(['name' => 'artistas.deleteimage', 'description' => 'Artistas locales: Eliminar fotos del artista'])->syncRoles([$Role1,$Role2]);


   // permisos murales
   Permission::create(['name' => 'murales.index', 'description' => 'Murales: Ver lista'])->syncRoles([$Role1,$Role4] );
   Permission::create(['name' => 'murales.create', 'description' => 'Murales: Creación'])->syncRoles([$Role1,$Role4]);
   Permission::create(['name' => 'murales.edit', 'description' => 'Murales: Edición'])->syncRoles([$Role1,$Role4]);
   Permission::create(['name' => 'murales.destroy', 'description' => 'Murales: Eliminar mural'])->syncRoles([$Role1,$Role4]);


     // permisos categorias de murales
     Permission::create(['name' => 'categories-murales.index', 'description' => 'Categorías murales: Ver lista'])->syncRoles([$Role1,$Role4] );
     Permission::create(['name' => 'categories-murales.create', 'description' => 'Categorías murales: Creación'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'categories-murales.edit', 'description' => 'Categorías murales: Edición'])->syncRoles([$Role1,$Role4]);
     Permission::create(['name' => 'categories-murales.destroy', 'description' => 'Categorías murales: Eliminar categoría'])->syncRoles([$Role1,$Role4]);
    }
}
