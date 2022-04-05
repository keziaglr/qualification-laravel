<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'gender' => 'female',
            'address' => 'Admin House',
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'email' => 'kezia@binus.ac.id',
            'password' => bcrypt('kekez'),
            'gender' => 'female',
            'address' => 'Kezia House',
            'role' => 'user'
        ]);

        DB::table('users')->insert([
            'email' => 'snowy@binus.ac.id',
            'password' => bcrypt('snowy'),
            'gender' => 'male',
            'address' => 'Snowy House',
            'role' => 'user'
        ]);

        DB::table('users')->insert([
            'email' => 'creamy@binus.ac.id',
            'password' => bcrypt('creamy'),
            'gender' => 'male',
            'address' => 'Creamy House',
            'role' => 'user'
        ]);

    }
}
