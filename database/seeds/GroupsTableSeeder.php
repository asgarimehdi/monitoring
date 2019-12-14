<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'id'=>'1',
            'name' => 'بهداشت خانواده',
        ]);
        DB::table('groups')->insert([
            'id'=>'2',
            'name' => 'بهداشت روان',
        ]);
        DB::table('groups')->insert([
            'id'=>'3',
            'name' => 'گسترش شبکه',
        ]);
    }
}
