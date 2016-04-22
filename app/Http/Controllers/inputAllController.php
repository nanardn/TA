<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\inputsemua;

use  App\CrowdReport;

class inputAllController extends Controller
{
    //
    
    public function showpage()
    {
        return view('ziswaf.inputsemua');
    }
}



