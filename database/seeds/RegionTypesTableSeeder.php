<?php

use Illuminate\Database\Seeder;

class RegionTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Region_types')->delete();
        
        \DB::table('Region_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'شبکه بهداشت و درمان',
                'created_at' => '2019-10-16 07:56:50',
                'updated_at' => '2019-10-21 06:46:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'مرکز جامع سلامت شهری',
                'created_at' => '2019-10-21 06:45:51',
                'updated_at' => '2019-10-21 06:45:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'مرکز جامع سلامت روستایی',
                'created_at' => '2019-10-21 06:46:03',
                'updated_at' => '2019-10-21 06:46:03',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'مرکز جامع سلامت شهری روستایی',
                'created_at' => '2019-10-21 06:46:38',
                'updated_at' => '2019-10-21 06:46:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'خانه بهداشت',
                'created_at' => '2019-10-21 06:46:52',
                'updated_at' => '2019-10-21 06:46:52',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'پایگاه سلامت',
                'created_at' => '2019-10-21 06:47:22',
                'updated_at' => '2019-10-22 21:33:15',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'بیمارستان',
                'created_at' => '2019-10-21 06:47:45',
                'updated_at' => '2019-10-21 06:47:45',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'مرکز درمان پیشگیری هاری',
                'created_at' => '2019-10-21 06:48:03',
                'updated_at' => '2019-10-21 06:48:03',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'واحدهای خدمات دندانپزشکی',
                'created_at' => '2019-10-22 19:56:47',
                'updated_at' => '2019-10-22 19:56:47',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'مرکز / خانه بهداشت کارگری',
                'created_at' => '2019-10-22 19:56:55',
                'updated_at' => '2019-10-22 19:56:55',
            ),
        ));
        
        
    }
}