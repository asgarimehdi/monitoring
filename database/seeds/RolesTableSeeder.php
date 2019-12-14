<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'=>'1',
            'name' => 'مدیر اصلی',
        ]);
        DB::table('roles')->insert([
            'id'=>'2',
            'name' => 'مدیر گروه',
        ]);
        DB::table('roles')->insert([
            'id'=>'3',
            'name' => 'کاربر عادی',
        ]);
    }
}
