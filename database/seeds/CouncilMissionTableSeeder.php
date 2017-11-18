<?php

use App\CouncilMission;
use Illuminate\Database\Seeder;

class CouncilMissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CouncilMission::create([
            'name'  =>  'Site recon',
            'link'  => 'siterecon',
        ]);

        CouncilMission::create([
            'name'  =>  'Target extraction',
            'link'  => 'targetextraction',
        ]);

        CouncilMission::create([
            'name'  =>  'Target escort',
            'link'  => 'targetescort',
        ]);

        CouncilMission::create([
            'name'  =>  'Asset recovery',
            'link'  => 'assetrecovery',
        ]);

        CouncilMission::create([
            'name'  =>  'Bomb disposal',
            'link'  => 'bombdisposal',
        ]);

        CouncilMission::create([
            'name'  =>  'Slingshot & Progeny',
            'link'  => 'slingshotprogeny',
        ]);
    }
}
