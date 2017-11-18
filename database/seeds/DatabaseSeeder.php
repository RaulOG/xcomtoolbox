<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(AlienTypesTableSeeder::class);
         $this->call(MissionTypeTableSeeder::class);
         $this->call(MissionDifficultyTableSeeder::class);
         $this->call(UfoTableSeeder::class);
         $this->call(CouncilMissionTableSeeder::class);
    }
}
