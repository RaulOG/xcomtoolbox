<?php

use App\MissionType;
use Illuminate\Database\Seeder;

class MissionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MissionType::create([
            'name'  =>  'abduction'
        ]);

        MissionType::create([
            'name'  =>  'crash'
        ]);

        MissionType::create([
            'name'  =>  'landing'
        ]);

        MissionType::create([
            'name'  =>  'terror'
        ]);

        MissionType::create([
            'name'  =>  'council'
        ]);
    }
}
