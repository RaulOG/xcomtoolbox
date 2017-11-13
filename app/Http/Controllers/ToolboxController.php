<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
