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
        $alienTypes = [
            'sectoid',
            'drone',
            'thinman',
            'seeker',
            'outsider',
            'floater',
            'chryssalid',
            'zombie',
            'muton',
            'cyberdisc',
            'mechtoid',
            'berserker',
            'sectoidcommander',
            'heavyfloater',
            'mutonelite',
            'sectopod',
            'ethereal',
            'exalt',
        ];

        foreach ($alienTypes as $type) {
            AlienType::create([
                'name' => $type
            ]);
        }
    }
}
