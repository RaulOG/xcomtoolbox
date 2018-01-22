<?php

namespace App\Http\Controllers;

use App\Alien;
use App\AlienType;
use App\Pod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlienController extends Controller
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
    public function store(Request $request)
    {
        $this->wea($request);

        return redirect('pods');
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
//        return response($request->all());
        $alien = Alien::find($id);
        $alienType = AlienType::where('name', '=', $request->input('alien_type'))->first();

        if(!empty($alien)){
            if(!empty($alienType) && $alien->pod->user->id == Auth::user()->id){
                $alien->type()->associate($alienType);
            }

            if($request->has('max_health')){
                $alien->max_health      = $request->input('max_health');
            }

            if($request->has('current_health')){
                $alien->current_health  = $request->input('current_health');
            }

            $alien->save();
        }

        if($request->ajax()){
            return response('It is good');
        }else{
            if($request->has('mission')){
                return redirect('/missions/'.$request->input('mission'));
            }

        return redirect('pods');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $alien = Alien::find($id);

        if(!empty($alien) && $alien->pod->user->id == Auth::user()->id){
            $alien->delete();
        }

        if($request->has('mission')){
            return redirect('/missions/'.$request->input('mission'));
        }

        return redirect('pods');
    }

    /**
     * @param Request $request
     */
    private function wea(Request $request)
    {
        $pod = Pod::find($request->input('pod_id'));
        $alien = new Alien();
        $pod->aliens()->save($alien);
    }
}
