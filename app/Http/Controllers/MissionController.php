<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionStoreRequest;
use App\Mission;
use Illuminate\Http\Request;

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
        dd($request->all());
        $mission = new Mission();

//        if request mission_type is defined: crash/landing & aliencraft
//        if request mission_type is defined: abduction & Light/Moderate/Heavy/Swarming
//        if request mission_type is defined: terror
//        if request mission_type is defined: council

        // missions have different characteristics
        //  abductions have difficulty
        //  crashes and landings have an aliencraft
        //  council missions have known characteristics

//        Auth::user()->pods()->save($pod);
//
//        if($request->has('alien_count')){
//            // validation
//            if($request->input('alien_count') > 1 && $request->input('alien_count') < 7){
//                for($i = 0 ; $i < $request->input('alien_count'); $i++){
//                    $alien = new Alien;
//                    if($request->has('alien_types') && $request->input('alien_types')[$i] !== null){
//                        $alien->type()->associate(AlienType::find($request->input('alien_types')[$i]));
//                    }
//                    $pod->aliens()->save($alien);
//                }
//            }
//        }

//        return redirect('pods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
