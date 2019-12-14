<?php

use Illuminate\Database\Seeder;

class RegionCentersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('region_centers')->delete();
        
        \DB::table('region_centers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'مرکز شماره 10',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:19',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'مرکز شماره 1',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:19',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'مرکز شماره 9',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'مرکز شماره 8',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'مرکزشماره 7',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'مرکز شماره 6',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'مرکز شماره 12',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'مرکز شماره 3',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'مرکز شماره 2',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'مرکزشماره 18',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'مرکز شماره 16',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'مرکز شماره 15',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'مرکز شماره 4',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'مرکز شماره 13',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'مرکز شماره 11',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'مرکز شماره 17',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'بیمارستان ولیعصر',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'بیمارستان امام حسین',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'بیمارستان آیت اله موسوی',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'مرکز دیابت',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'مرکز شماره 14',
                'county_id' => 1,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'مرکز لولک آباد',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'مرکز اند آباد',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'مرکز حاج آرش',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'مرکز حصار',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'مرکز دیزج آباد',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'مرکز رازبین',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'مرکز سلطان آباد',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'مرکز خدمات جامع سلامت روستايي سه',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'مرکز چیر',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'مرکز قره بوطه',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'مرکز نیک پی',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'مرکز ارمغانخانه',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:20',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'مرکز قلتوق',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'مرکز سهرین',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'مرکز یامچی',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'مرکز تهم',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'مرکز بوغداکندی',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'مرکز بهرامبیک',
                'county_id' => 1,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'مرکز شماره 5',
                'county_id' => 1,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
            'name' => 'مرکز یامچی (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
            'name' => 'مرکز حاج آرش (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
            'name' => 'مرکز اند آباد (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
            'name' => 'مرکز بوغداکندی (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
            'name' => 'مرکز بهرامبیک (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
            'name' => 'مرکز تهم (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
            'name' => 'مرکز ارمغانخانه (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
            'name' => 'مرکز دیزج آباد (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
            'name' => 'مرکز رازبین (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
            'name' => 'مرکز سلطان آباد (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
            'name' => 'مرکز سهرین (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
            'name' => 'مرکز قره بوطه (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
            'name' => 'مرکز نیک پی (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
            'name' => 'مرکز قلتوق (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
            'name' => 'مرکز حصار (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
            'name' => 'مرکز چیر (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
            'name' => 'مرکز لولک آباد (روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
            'name' => 'مرکز شماره 5 (شهری روستایی) ',
                'county_id' => 1,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
            'name' => 'مرکز شماره 2 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
            'name' => 'مرکز شماره 1 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
            'name' => 'مرکز شماره 10 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:21',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
            'name' => 'مرکز شماره 11 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
            'name' => 'مرکز شماره 17 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
            'name' => 'مرکزشماره 7 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
            'name' => 'مرکز شماره 16 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
            'name' => 'مرکز شماره 15 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
            'name' => 'مرکز شماره 12 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
            'name' => 'مرکز شماره 13 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
            'name' => 'مرکز شماره 3 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
            'name' => 'مرکز شماره 6 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
            'name' => 'مرکز شماره 4 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
            'name' => 'مرکز شماره 14 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
            'name' => 'مرکزشماره 18 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
            'name' => 'مرکز شماره 5 (شهری روستایی) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
            'name' => 'مرکز شماره 9 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
            'name' => 'مرکز شماره 8 (شهری) ',
                'county_id' => 1,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'امام حسین',
                'county_id' => 1,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'ولیعصر',
                'county_id' => 1,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'آیت اله موسوی',
                'county_id' => 1,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'بیمارستان بهمن',
                'county_id' => 1,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'بیمارستان ارتش',
                'county_id' => 1,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'شهید دکتر بهشتی',
                'county_id' => 1,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'مرکز درمان پیشگیری هاری زنجان',
                'county_id' => 1,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'مرکز شماره 6',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'مرکز شماره 5',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'مرکز شماره 8',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'مرکز شماره 9',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'مرکز شماره 14',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'مرکز ارمغانخانه',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'مرکز نیک پی',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'مرکز دیزج آباد',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'مرکز شماره 10',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'مرکز شماره 15',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'مرکز شماره 3',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'مرکز تجمیع امیر کبیر',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:22',
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'مرکز تجمیع شفیعیه',
                'county_id' => 1,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'شرکت پودررنگ کوثر',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'شرکت توسعه پستهای ایران ترانسفو',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'شرکت مددبخش',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'شرکت سمن آسا',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'شرکت راهان توان',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'شرکت زنجان محور خودرو',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'شرکت مرمرین سنگ کسرا',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'شرکت نوردیاوران',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'شرکت تسکو',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'شرکت ایران ترانسفو',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'شرکت پارس سوییچ',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'شرکت صنعت روی زنگان',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'شرکت خالص سازان روی',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'شرکت زرین روی',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'شرکت نیک ریس',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'شرکت سرب وروی ملی ایران',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'شرکت نخ تایرصبا',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'شرکت لایی ساز',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'شرکت راشا',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'شرکت ارس زنجان',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'شرکت چشمه سار',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'شرکت صانع روی',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'شرکت سازند روی',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'شرکت ذوب روی صبا',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'شرکت زرین معدن آسیا',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'شرکت کانه آرایی آریا',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'شرکت متین روی',
                'county_id' => 1,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'شبکه بهداشت و درمان ابهر',
                'county_id' => 2,
                'type_id' => 1,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'شماره 5',
                'county_id' => 2,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'هیدج',
                'county_id' => 2,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => '17 شهریور',
                'county_id' => 2,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'اعلایی',
                'county_id' => 2,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:23',
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'عمید آباد',
                'county_id' => 2,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'قروه',
                'county_id' => 2,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'درسجین',
                'county_id' => 2,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'دولت آباد',
                'county_id' => 2,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'عباس آباد سفلی',
                'county_id' => 2,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'شریف آباد',
                'county_id' => 2,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'شناط',
                'county_id' => 2,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'صائین قلعه',
                'county_id' => 2,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'حسین آباد',
                'county_id' => 2,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
            'name' => 'شریف آباد (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
            'name' => 'حسین آباد (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
            'name' => 'دولت آباد (روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
            'name' => 'عمید آباد (روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
            'name' => 'قروه (روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
            'name' => 'شناط (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
            'name' => 'صائین قلعه (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
            'name' => 'عباس آباد سفلی (روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
            'name' => 'درسجین (روستایی) ',
                'county_id' => 2,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
            'name' => 'هیدج (شهری) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
            'name' => 'شماره 5 (شهری) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
            'name' => '17 شهریور (شهری) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
            'name' => 'اعلایی (شهری) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
            'name' => 'شریف آباد (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
            'name' => 'شناط (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
            'name' => 'صائین قلعه (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
            'name' => 'حسین آباد (شهری روستایی) ',
                'county_id' => 2,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'بیمارستان امید ابهر',
                'county_id' => 2,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'الغدیر ابهر',
                'county_id' => 2,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'امدادی',
                'county_id' => 2,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'مرکز هاری بیمارستان',
                'county_id' => 2,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'مرکز صائین قلعه',
                'county_id' => 2,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'مرکز شماره 5',
                'county_id' => 2,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'مرکز هیدج',
                'county_id' => 2,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'مرکز تجمیع ابهر',
                'county_id' => 2,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'شرکت سیم وکابل ابهر',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'شرکت ذوب آهن نگین البرز',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'شرکت ریخته گری آلومینیوم',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'شرکت دیسال',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'شرکت ذوب ونورد البرز',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'شرکت پرجین',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'شرکت پرریس',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:24',
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'شرکت پارس دکور',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'شرکت توسعه ریلی ایرانیان',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'شرکت نساجی رازی',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'شرکت ساینا',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'شرکت پارس حیات',
                'county_id' => 2,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'ستاد شبکه بهداشت',
                'county_id' => 3,
                'type_id' => 1,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'سعید آباد',
                'county_id' => 3,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'جوقین',
                'county_id' => 3,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'هلیل آباد',
                'county_id' => 3,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'اغولبیک سفلی',
                'county_id' => 3,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'ینگی کند سیدلر',
                'county_id' => 3,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'نکتو',
                'county_id' => 3,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'زرین آباد',
                'county_id' => 3,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'حلب',
                'county_id' => 3,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
            'name' => 'ینگی کند سیدلر (روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
            'name' => 'زرین آباد (شهری روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
            'name' => 'اغولبیک سفلی (روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
            'name' => 'سعید آباد (روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
            'name' => 'نکتو (روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
            'name' => 'هلیل آباد (روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
            'name' => 'حلب (شهری روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
            'name' => 'جوقین (روستایی) ',
                'county_id' => 3,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
            'name' => 'زرین آباد (شهری روستایی) ',
                'county_id' => 3,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
            'name' => 'حلب (شهری روستایی) ',
                'county_id' => 3,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'ایثار',
                'county_id' => 3,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'هاری',
                'county_id' => 3,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'مرکز زرین آباد',
                'county_id' => 3,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'شرکت ریخته گری سهند',
                'county_id' => 3,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'شرکت سیمان خمسه',
                'county_id' => 3,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'مجتمع زرین',
                'county_id' => 3,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'شماره 2شهری',
                'county_id' => 4,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'مرکز شماره 3',
                'county_id' => 4,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'مرکز شماره 1',
                'county_id' => 4,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'مرکز مزیدآباد',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'مرکز قیاسکندی',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'مرکز زاغج',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:25',
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'مرکز محمودآباد',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'مرکز نعلبندان',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'مرکز اولی بیک',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'مرکز چوزوک',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'مرکز کهلا',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'مرکز گوگجه ییلاق',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'مرکز توزلو',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'مرکز زرند',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'مرکز دوتپه سفلی',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'مرکز بولاماجی',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'مرکز حصار',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'مرکز آقبلاغ',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'مرکز باشقشلاق',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'مرکز حسام آباد',
                'county_id' => 4,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'مرکز کرسف',
                'county_id' => 4,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'مرکز سهرورد',
                'county_id' => 4,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'مرکز نوربهار',
                'county_id' => 4,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'مرکز  شماره 2',
                'county_id' => 4,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'مرکز گرماب',
                'county_id' => 4,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'مرکز سجاس',
                'county_id' => 4,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'مرکز زرین رود',
                'county_id' => 4,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
            'name' => 'مرکز اولی بیک (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
            'name' => 'مرکز قیاسکندی (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
            'name' => 'مرکز نوربهار (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
            'name' => 'مرکز بولاماجی (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
            'name' => 'مرکز گرماب (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
            'name' => 'مرکز توزلو (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
            'name' => 'مرکز چوزوک (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
            'name' => 'مرکز حسام آباد (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
            'name' => 'مرکز نعلبندان (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
            'name' => 'مرکز مزیدآباد (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
            'name' => 'مرکز محمودآباد (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
            'name' => 'مرکز گوگجه ییلاق (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
            'name' => 'مرکز کهلا (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
            'name' => 'مرکز زرند (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
            'name' => 'مرکز زاغج (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
            'name' => 'مرکز آقبلاغ (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
            'name' => 'مرکز دوتپه سفلی (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:26',
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
            'name' => 'مرکز حصار (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
            'name' => 'مرکز کرسف (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
            'name' => 'مرکز سهرورد (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
            'name' => 'مرکز سجاس (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
            'name' => 'مرکز زرین رود (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
            'name' => 'مرکز  شماره 2 (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
            'name' => 'مرکز باشقشلاق (روستایی) ',
                'county_id' => 4,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
            'name' => 'مرکز شماره 1 (شهری) ',
                'county_id' => 4,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
            'name' => 'مرکز سجاس (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
            'name' => 'مرکز  شماره 2 (شهری روستایی) ',
                'county_id' => 4,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
            'name' => 'مرکز شماره 3 (شهری) ',
                'county_id' => 4,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
            'name' => 'بیمارستان امیرالمومنین(ع) خدابند',
                'county_id' => 4,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'name' => 'مرکز درمان پیشگیری هاری خدابنده',
                'county_id' => 4,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'name' => 'مرکز زرین رود',
                'county_id' => 4,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'مرکز سجاس',
                'county_id' => 4,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'name' => 'مرکز دو تپه سفلی',
                'county_id' => 4,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'name' => 'مرکز کرسف',
                'county_id' => 4,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'name' => 'مرکز سهرورد',
                'county_id' => 4,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'name' => 'مرکز تجمیع خدابنده',
                'county_id' => 4,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'name' => 'مرکز گرماب',
                'county_id' => 4,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'name' => 'سیمان زنجان',
                'county_id' => 4,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'name' => 'شبکه بهداشت و درمان شهرستان',
                'county_id' => 5,
                'type_id' => 1,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'name' => 'شماره 2',
                'county_id' => 5,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'name' => 'شماره 1',
                'county_id' => 5,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'name' => 'شماره 3',
                'county_id' => 5,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'name' => 'شماره 4',
                'county_id' => 5,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'name' => 'شماره 5',
                'county_id' => 5,
                'type_id' => 2,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'name' => 'قلعه حسینیه',
                'county_id' => 5,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'name' => 'سوکهریز',
                'county_id' => 5,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'name' => 'شماره 2',
                'county_id' => 5,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
            'name' => 'سوکهریز (روستایی) ',
                'county_id' => 5,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
            'name' => 'قلعه حسینیه (روستایی) ',
                'county_id' => 5,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
            'name' => 'شماره 2 (شهری روستایی) ',
                'county_id' => 5,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:27',
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
            'name' => 'شماره 1 (شهری) ',
                'county_id' => 5,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
            'name' => 'شماره 3 (شهری) ',
                'county_id' => 5,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'name' => 'بیمارستان بوعلی سینا',
                'county_id' => 5,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'name' => 'مرکز هاری',
                'county_id' => 5,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'name' => 'مرکز تجمیع خرمدره',
                'county_id' => 5,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'name' => 'مرکز سوکهریز',
                'county_id' => 5,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'name' => 'مرکز شماره 2',
                'county_id' => 5,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'name' => 'مرکز شماره 4',
                'county_id' => 5,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'name' => 'شرکت مینو',
                'county_id' => 5,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'name' => 'شرکت سیلیس آرا',
                'county_id' => 5,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'name' => 'شرکت کشتارگاه پرطلائی',
                'county_id' => 5,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'name' => 'شرکت معدن کاران نسوز',
                'county_id' => 5,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'name' => 'شرکت هورا طب',
                'county_id' => 5,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'name' => 'ویر',
                'county_id' => 6,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'name' => 'گوزلدره',
                'county_id' => 6,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'name' => 'خیرآباد',
                'county_id' => 6,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'name' => 'قره بلاغ',
                'county_id' => 6,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'name' => 'سنبل آباد',
                'county_id' => 6,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'name' => 'شبانه روزی سلطانیه',
                'county_id' => 6,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
            'name' => 'قره بلاغ (روستایی) ',
                'county_id' => 6,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
            'name' => 'خیرآباد (روستایی) ',
                'county_id' => 6,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
            'name' => 'سنبل آباد (روستایی) ',
                'county_id' => 6,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
            'name' => 'ویر (روستایی) ',
                'county_id' => 6,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
            'name' => 'شبانه روزی سلطانیه (شهری روستایی) ',
                'county_id' => 6,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
            'name' => 'گوزلدره (روستایی) ',
                'county_id' => 6,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
            'name' => 'شبانه روزی سلطانیه (شهری روستایی) ',
                'county_id' => 6,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'name' => 'مرکز درمان پیشگیری هاری سلطانیه',
                'county_id' => 6,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'name' => 'مرکزخیرآباد',
                'county_id' => 6,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'name' => 'مرکزشبانه روزی  سلطانیه',
                'county_id' => 6,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'name' => 'شرکت کریستال ایران',
                'county_id' => 6,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'name' => 'آرین توتون صنعت',
                'county_id' => 6,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'name' => 'فرش سهند',
                'county_id' => 6,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'name' => 'انذر',
                'county_id' => 7,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'name' => 'تشویر',
                'county_id' => 7,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'name' => 'سانسیز',
                'county_id' => 7,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'name' => 'گیلوان',
                'county_id' => 7,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'name' => 'دستجرده',
                'county_id' => 7,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'name' => 'درام',
                'county_id' => 7,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:28',
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'name' => 'چورزق',
                'county_id' => 7,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'name' => 'آببر',
                'county_id' => 7,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
            'name' => 'تشویر (روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
            'name' => 'درام (روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
            'name' => 'دستجرده (روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
            'name' => 'سانسیز (روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
            'name' => 'انذر (روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
            'name' => 'گیلوان (روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
            'name' => 'چورزق (شهری روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
            'name' => 'آببر (شهری روستایی) ',
                'county_id' => 7,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
            'name' => 'آببر (شهری روستایی) ',
                'county_id' => 7,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'name' => 'بیمارستان شهدای طارم',
                'county_id' => 7,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'name' => 'مرکز درمان پیشگیری هاری طارم',
                'county_id' => 7,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'name' => 'مرکز درام',
                'county_id' => 7,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'name' => 'مرکز آب بر',
                'county_id' => 7,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'name' => 'مرکز چورزق',
                'county_id' => 7,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'name' => 'شبکه بهداشت و درمان شرستان ماهنش',
                'county_id' => 8,
                'type_id' => 1,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'name' => 'قره گل',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'name' => 'قلعه جوق',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'name' => 'پری',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'name' => 'خیرآباد',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'name' => 'دوزکند',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'name' => 'قره ناس',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'name' => 'سهند علیا',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'name' => 'میانج',
                'county_id' => 8,
                'type_id' => 3,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'name' => 'دندی',
                'county_id' => 8,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'name' => 'ماهنشان',
                'county_id' => 8,
                'type_id' => 4,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
            'name' => 'ماهنشان (شهری روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
            'name' => 'دندی (شهری روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
            'name' => 'دوزکند (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
            'name' => 'خیرآباد (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
            'name' => 'پری (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
            'name' => 'میانج (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
            'name' => 'قلعه جوق (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
            'name' => 'قره ناس (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
            'name' => 'سهند علیا (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
            'name' => 'قره گل (روستایی) ',
                'county_id' => 8,
                'type_id' => 5,
                'created_at' => '2019-10-24 00:32:29',
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
            'name' => 'ماهنشان (شهری روستایی) ',
                'county_id' => 8,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
            'name' => 'دندی (شهری روستایی) ',
                'county_id' => 8,
                'type_id' => 6,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'name' => 'بیمارستان رازی',
                'county_id' => 8,
                'type_id' => 7,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
                'name' => 'ماهنشان',
                'county_id' => 8,
                'type_id' => 8,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 356,
                'name' => 'مرکز پری',
                'county_id' => 8,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 357,
                'name' => 'مرکز دندی',
                'county_id' => 8,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 358,
                'name' => 'مرکز ماهنشان',
                'county_id' => 8,
                'type_id' => 9,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 359,
                'name' => 'شرکت کالسیمین',
                'county_id' => 8,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 360,
                'name' => 'معدن انگوران',
                'county_id' => 8,
                'type_id' => 10,
                'created_at' => '2019-10-24 00:32:30',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}