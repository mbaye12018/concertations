<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaysMonde;

class PaysMondeController extends Controller
{
    public function index()
    {
        // Récupérer tous les pays triés par nom
        $countries = PaysMonde::orderBy('nom')->get();

        // Retourner la vue avec les pays
        return view('frontend.participer8', compact('countries'));
    }
}
