<?php

namespace App\Http\Controllers;

use App\Mission;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mission = Mission::where('state', Mission::STATE_OPEN)
            ->where('user_id', Auth::user()->id)
            ->first();

        return view('home', compact('mission'));
    }
}
