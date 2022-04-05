<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('wishlists')->insert([
            'user_id' => 2,
            'product_id' => 1,
        ]);

        DB::table('wishlists')->insert([
            'user_id' => 2,
            'product_id' => 2,
        ]);

        DB::table('wishlists')->insert([
            'user_id' => 2,
            'product_id' => 3,
        ]);
    }
}
