<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccesPublicsController extends Controller
{
    //
    public function index()
    {
        
    return view('frontend.admin.acces_publics');
    }
}
