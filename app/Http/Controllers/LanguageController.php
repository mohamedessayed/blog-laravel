<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //

    function ar() {
        App::setLocale('ar');
        Session::put('lang','ar');
        return back();
    }

    function en() {
        App::setLocale('en');
        Session::put('lang','en');
        return back();
    }
}
