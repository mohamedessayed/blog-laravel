<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PanelController extends Controller
{
    //
    function dashboard() : View {
        return view('index');
    }
}
