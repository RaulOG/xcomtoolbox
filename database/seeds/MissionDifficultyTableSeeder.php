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
            'name'              =>  'light',
            'min_pod_count'     =>  3,
            'max_pod_count'     =>  3,
            'min_alien_count'   =>  7,
            'max_alien_count'   =>  9,
        ]);

        MissionDifficulty::create([
            'name'              =>  'moderate',
            'min_pod_count'     =>  3,
            'max_pod_count'     =>  4,
            'min_alien_count'   =>  10,
            'max_alien_count'   =>  12,
        ]);

        MissionDifficulty::create([
            'name'              =>  'heavy',
            'min_pod_count'     =>  3,
            'max_pod_count'     =>  4,
            'min_alien_count'   =>  12,
            'max_alien_count'   =>  14,
        ]);

        MissionDifficulty::create([
            'name'              =>  'swarming',
            'min_pod_count'     =>  4,
            'max_pod_count'     =>  4,
            'min_alien_count'   =>  14,
            'max_alien_count'   =>  16,
        ]);
    }
}
