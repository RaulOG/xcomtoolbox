<?php

use App\Ufo;
use Illuminate\Database\Seeder;

class UfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ufo::create([
            'name'  =>  'scout'
        ]);

        Ufo::create([
            'name'  =>  'fighter'
        ]);

        Ufo::create([
            'name'  =>  'raider'
        ]);
    }
}
