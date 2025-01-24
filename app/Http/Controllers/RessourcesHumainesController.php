<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RessourcesHumainesController extends Controller
{
    //ressources_humaines.blade.php
    public function index()
    {
        
    return view('frontend.admin.ressources_humaines');
    }
}
