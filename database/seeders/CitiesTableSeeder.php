<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cities')->truncate();   
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 2171,
                'name' => 'BATAM',
                'atrbpn_code' => 3202,
                'atrbpn_hashed_code' => 'XdD0jtqb/uZpg70sAFsCByl7QyuodsDdCuWW1UKD6PraZFX1OnV89tffjPBDV0hL',
                'postal_codes' => '29400',
                'province_code' => 21,
                'province_atrbpn_code' => 32,
                'created_at' => '2020-07-27 13:21:42',
                'updated_at' => '2020-07-27 13:21:42',
            ),
        ));
    }
}