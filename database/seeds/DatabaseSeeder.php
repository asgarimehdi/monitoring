<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(GroupsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(RegionCentersTableSeeder::class);
        $this->call(RegionCountiesTableSeeder::class);
        $this->call(RegionTypesTableSeeder::class);
        $this->call(RegionPointsTableSeeder::class);
        $this->call(DevicesLogsTableSeeder::class);
    }
}
