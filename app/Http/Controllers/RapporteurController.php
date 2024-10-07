<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapporteurController extends Controller
{
    public function index()
    {
        return view('frontend.rapporteur.dashboard');
    }
}