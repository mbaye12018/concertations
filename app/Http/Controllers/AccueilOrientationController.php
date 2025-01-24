<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilOrientationController extends Controller
{
    //
    public function index()
    {
        
    return view('frontend.admin.accueil_orientation');
    }
}

