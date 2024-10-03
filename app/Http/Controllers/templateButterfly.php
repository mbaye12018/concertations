<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class templateButterfly extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
}
