<?php

use App\MissionDifficulty;
use Illuminate\Database\Seeder;

class MissionDifficultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MissionDifficulty::create([
            'name'  =>  'light'
        ]);

        MissionDifficulty::create([
            'name'  =>  'moderate'
        ]);

        MissionDifficulty::create([
            'name'  =>  'heavy'
        ]);

        MissionDifficulty::create([
            'name'  =>  'swarming'
        ]);
    }
}
