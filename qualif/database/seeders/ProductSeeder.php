<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'producttype_id' => '2',
            'name' => 'Chocolate and Honey',
            'price' => 35000,
            'description' => 'A moisturizing natural soap enriched with nourishing organic butters and honey swirled.'
        ]);

        DB::table('products')->insert([
            'producttype_id' => '1',
            'name' => 'Summer Breeze',
            'price' => 25000,
            'description' => 'Fill your shower with the scents of summer with this moisturizing soap enriched.'
        ]);

        DB::table('products')->insert([
            'producttype_id' => '3',
            'name' => 'Bamboo Charcoal',
            'price' => 30000,
            'description' => 'A great deep cleansing activated charcoal body and complexion soap.'
        ]);
    }
}
