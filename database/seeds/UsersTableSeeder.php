<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>'1',
            'name' => 'مهدی عسگری',
            'username' => 'meh',
            'password' => '$2y$10$gnIsY3zR0A4plNMcizZBX.lRUp4RUAshA5Jj6xxCYZCQcZ4m7I84u',
            'role_id' => '1',
            'group_id' => '1',
            'point_id' => '1',
            'created_at' => '2019-09-17 13:56:50',
            'updated_at' => '2019-09-17 13:56:50',
        ]);
    }
}
