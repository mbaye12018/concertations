<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class StatistiqueController extends Controller
{
    public function index()
    {
        return view('statistique.index'); // Assurez-vous d'avoir une vue correspondante
    }
}
