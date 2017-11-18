<?php

namespace App\Http\Controllers;

use App\AlienType;
use App\CouncilMission;
use App\Http\Requests\MissionStoreRequest;
use App\Mission;
use App\MissionDifficulty;
use App\MissionType;
use App\Ufo;
use App\User;
use App\UserMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MissionStoreRequest $request)
    {
        $mission_type = MissionType::where(['name' => $request->input('type')])->first();

        $mission = new Mission();
        $mission->type()->associate($mission_type);
//        dd($mission);


//        $mission = Mission::whereHas('type', function($query) use ($mission_type){
//            $query->where('name', '=', $mission_type->name);
//        });
//        dd($mission);
//        dd($missions);
//        $mission = new Mission();
//        $mission->type()->associate($mission_type->name);

        if($mission_type->name == "abduction"){
            $mission_difficulty = MissionDifficulty::where(['name' => $request->input('difficulty')])->first();
//            $mission->whereHas('difficulty', function($query) use ($mission_difficulty){
//                $query->where('name', '=', $mission_difficulty->name);
//            });
            $mission->difficulty()->associate($mission_difficulty);

        }else if($mission_type->name == "crash" || $mission_type->name == "landing"){
            $ufo = Ufo::where(['name' => $request->input('ufo')])->first();
//            $mission->whereHas('ufo', function($query) use ($ufo){
//                $query->where('name', '=', $ufo->name);
//            });
            $mission->ufo()->associate($ufo);

        }else if($mission_type->name == "council"){
            $council_mission = CouncilMission::where(['link' => $request->input('council_mission')])->first();
//            $mission->whereHas('council_mission', function($query) use ($council_mission){
//                $query->where('name', '=', $council_mission->name);
//            });
            $mission->council_mission()->associate($council_mission);
        }

//        $mission = $mission->get();

        /**
        if($mission->isEmpty()){
        // Strange that UserMissionStoreRequest did not intercept this
        abort(404);
        }

        else if($mission->count() > 1){
        // Strange that UserMissionStoreRequest did not intercept this
        abort(404);
        }
         *
        $mission = $mission->first();
         */


//        dd(Auth::user()->missions()->create($mission));
//

        Auth::user()->missions()->save($mission);


        return redirect('/missions/'.$mission->id);

        // missions have different characteristics
        //  abductions have difficulty
        //  crashes and landings have an ufo
        //  council missions have known characteristics
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $mission = Mission::find($id)->load(['aliens', 'type', 'council_mission']);

        $alien_types = AlienType::all();

        return view('mission.show')
            ->with('mission', $mission)
            ->with('alien_types', $alien_types);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
