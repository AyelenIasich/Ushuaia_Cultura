<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name'=> 'aye',
        'email'=> 'aye@gmail.a',
        'password'=> bcrypt('MONITA367'),
       ])->assignRole('admin');

       User::create([
        'name'=> 'Jorge Iasich',
        'email'=> 'jorge@gmail.aa',
        'password'=> bcrypt('MONITA367'),
       ])->assignRole('artista');

       User::create([
        'name'=> 'Cristian',
        'email'=> 'cristian@gmail.aa',
        'password'=> bcrypt('MONITA367'),
       ])->assignRole('artista');

       User::create([
         'name'=> 'Phon Kao',
         'email'=> 'phon@gmail.aa',
         'password'=> bcrypt('MONITA367'),
        ])->assignRole('artista');

        User::create([
         'name'=> 'Alejandro ABT',
         'email'=> 'abt@gmail.aa',
         'password'=> bcrypt('MONITA367'),
        ])->assignRole('creadorEvento');

        User::create([
          'name'=> 'Maria',
          'email'=> 'maria@gmail.aa',
          'password'=> bcrypt('MONITA367'),
         ])->assignRole('creadorEvento');

        User::create([
          'name'=> 'Pedro',
          'email'=> 'pedro@gmail.aa',
          'password'=> bcrypt('MONITA367'),
         ])->assignRole('creadorMurales');

       User::factory(12)->create();
    }
}
