<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('provinces')->truncate();
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 21,
                'name' => 'KEPULAUAN RIAU',
                'atrbpn_code' => 32,
                'atrbpn_hashed_code' => 'yGABXsBEqnZGW1Oa6WqzQkBlPMZWhuygPpc2BEPOQKeTklhP3fSC1+BNQgud4ACw',
                'postal_codes' => '20000,29000',
                'created_at' => '2020-07-27 13:21:42',
                'updated_at' => '2020-07-27 13:21:42',
            ),
        ));
    }
}