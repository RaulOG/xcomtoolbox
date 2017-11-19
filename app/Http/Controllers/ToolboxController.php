<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToolboxController extends Controller
{
    public function mission_inbound()
    {
        return view('toolbox/mission_inbound');
    }

    public function abduction()
    {
        return view('toolbox/mission_inbound/abduction');
    }

    public function crash()
    {
        return view('toolbox/mission_inbound/crash');
    }

    public function landing()
    {
        return view('toolbox/mission_inbound/landing');
    }

    public function council()
    {
        return view('toolbox/mission_inbound/council');
    }

    public function overview()
    {
        return view('toolbox/overview')
            ->with('missions', Auth::user()->missions);
    }
}
