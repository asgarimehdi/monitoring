<?php

use Illuminate\Database\Seeder;

class RegionCountiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Region_counties')->delete();
        
        \DB::table('Region_counties')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'زنجان',
                'lat' => 36.669343,
                'lng' => 48.47163,
                'created_at' => '2019-10-16 07:56:38',
                'updated_at' => '2019-10-21 06:15:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ابهر',
                'lat' => 36.1474388,
                'lng' => 49.2286013,
                'created_at' => '2019-10-21 06:16:14',
                'updated_at' => '2019-10-21 06:16:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ایجرود',
                'lat' => 36.433477,
                'lng' => 48.284772,
                'created_at' => '2019-10-21 06:16:38',
                'updated_at' => '2019-10-21 06:16:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'خدابنده',
                'lat' => 36.13,
                'lng' => 48.59083333,
                'created_at' => '2019-10-21 06:17:01',
                'updated_at' => '2019-10-21 06:17:01',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'خرمدره',
                'lat' => 36.205152,
                'lng' => 49.187993,
                'created_at' => '2019-10-21 06:17:22',
                'updated_at' => '2019-10-21 06:17:22',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'سلطانیه',
                'lat' => 36.434278,
                'lng' => 48.789169,
                'created_at' => '2019-10-21 06:17:38',
                'updated_at' => '2019-10-21 06:17:38',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'طارم',
                'lat' => 36.930707,
                'lng' => 48.943525,
                'created_at' => '2019-10-21 06:17:54',
                'updated_at' => '2019-10-21 06:17:54',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'ماهنشان',
                'lat' => 36.739228,
                'lng' => 47.685696,
                'created_at' => '2019-10-21 06:18:10',
                'updated_at' => '2019-10-21 06:18:10',
            ),
        ));
        
        
    }
}