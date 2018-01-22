<?php

namespace App\Http\Controllers;

use App\Alien;
use App\AlienType;
use App\Mission;
use App\Pod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pods = Pod::where('user_id', Auth::user()->id)->whereDoesntHave('mission')->get()->load('aliens.type');
        $alienTypes = AlienType::all();

        return view('pod/index')
            ->with('pods', $pods)
            ->with('alien_types', $alienTypes);
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
    public function store(Request $request)
    {
        $pod = new Pod;

        if($request->has('mission')){
            $mission = Mission::find($request->input('mission'));
            $pod->mission()->associate($mission);
        }

        Auth::user()->pods()->save($pod);

        if($request->has('alien')){
            foreach($request->input('alien') as $alien){

                $newAlien = new Alien();

                if($alien['type'] != "Unknown"){
                    $newAlien->type()->associate(AlienType::find($alien['type']));
                }

                $newAlien->max_health       = $alien['max_health'];
                $newAlien->current_health   = $alien['current_health'];

                if(isset($mission)){
                    $newAlien->mission()->associate($mission);
                }

                $pod->aliens()->save($newAlien);
            }
        }else{
            dd('has no aliens');
        }

//        if($request->has('alien_count')){
//             validation
//            if($request->input('alien_count') > 1 && $request->input('alien_count') < 7){
//                for($i = 0 ; $i < $request->input('alien_count'); $i++){
//                    $alien = new Alien;
//                    if($request->has('alien_types') && $request->input('alien_types')[$i] !== null){
//                        $alien->type()->associate(AlienType::find($request->input('alien_types')[$i]));
//                    }
//
//                    if(isset($mission)){
//                        $alien->mission()->associate($mission);
//                    }
//
//                    $pod->aliens()->save($alien);
//                }
//            }
//        }

        if(isset($mission)){
            return redirect('/missions/'.$mission->id);
        }

        return redirect('/pods');
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
        $pod = Pod::find($id);

        if(!empty($pod) && $pod->user->id == Auth::user()->id){
            $pod->delete();
        }

        return redirect('pods');
    }
}
