<?php

namespace App\Http\Controllers;

use App\Alien;
use App\AlienType;
use App\Pod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PodController extends Controller
{
    /**
     * PodController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pods = Pod::where('user_id', Auth::user()->id)->get()->load('aliens.type');
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
        Auth::user()->pods()->save($pod);

        if($request->has('alien_count')){
            // validation
            if($request->input('alien_count') > 1 && $request->input('alien_count') < 7){
                for($i = 0 ; $i < $request->input('alien_count'); $i++){
                    $alien = new Alien;
                    if($request->has('alien_types') && $request->input('alien_types')[$i] !== null){
                        $alien->type()->associate(AlienType::find($request->input('alien_types')[$i]));
                    }
                    $pod->aliens()->save($alien);
                }
            }
        }

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
