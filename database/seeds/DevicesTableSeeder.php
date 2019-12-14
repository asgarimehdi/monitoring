<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('devices')->delete();
        
        \DB::table('devices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'temp' => 27,
                'power' => 1,
                'sensor' => 1,
                'created_at' => '2019-10-19 19:59:55',
                'updated_at' => '2019-10-19 19:59:55',
            ),
            1 => 
            array (
                'id' => 8,
                'temp' => 6,
                'power' => 1,
                'sensor' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 633,
                'temp' => 2,
                'power' => 1,
                'sensor' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 665,
                'temp' => 23,
                'power' => 1,
                'sensor' => 1,
                'created_at' => '2019-10-19 20:16:51',
                'updated_at' => '2019-10-19 20:17:03',
            ),
            4 => 
            array (
                'id' => 666,
                'temp' => 25,
                'power' => 1,
                'sensor' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-10-19 20:16:26',
            ),
            5 => 
            array (
                'id' => 667,
                'temp' => 30,
                'power' => 0,
                'sensor' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}