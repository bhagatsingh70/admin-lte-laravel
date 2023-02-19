<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PriceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            [
            'price_min' => 50,
            'price_max' => 100
        ],
        [
            'price_min' => 100,
            'price_max' => 150
        ],
        [
            'price_min' => 150,
            'price_max' => 200
        ],
        [
            'price_min' => 200,
            'price_max' => 1500
        ] ]);
    }
}
