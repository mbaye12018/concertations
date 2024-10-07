<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function index()
    {
        return view('frontend.consultant.dashboard'); 
    }
}
