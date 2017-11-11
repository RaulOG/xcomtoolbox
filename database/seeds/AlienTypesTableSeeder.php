<?php

use App\AlienType;
use Illuminate\Database\Seeder;

class AlienTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlienType::create([
            'name'      => 'sectoid',
        ]);

        AlienType::create([
            'name'      => 'drone',
        ]);

        AlienType::create([
            'name'      => 'floater',
        ]);

        AlienType::create([
            'name'      => 'thinman',
        ]);
    }
}
