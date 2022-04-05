<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProducttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('producttypes')->insert([
            'name' => 'glycerin',
        ]);

        DB::table('producttypes')->insert([
            'name' => 'natural',
        ]);

        DB::table('producttypes')->insert([
            'name' => 'transparent',
        ]);
    }
}
