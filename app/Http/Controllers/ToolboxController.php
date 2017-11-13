<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolboxController extends Controller
{
    public function mission_assistance()
    {
        return view('toolbox/mission_assistance');
    }
}
