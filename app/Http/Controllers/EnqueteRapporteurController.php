<?php

namespace App\Http\Controllers;

use App\Models\EnqueteRapporteur;
use Illuminate\Http\Request;

class EnqueteRapporteurController extends Controller
{
    public function index()
    {
        $enquetes = EnqueteRapporteur::all();
        return view('enquetes.index', compact('enquetes'));
    }

    public function create()
    {
        return view('enquetes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            
        ]);

        EnqueteRapporteur::create($request->all());
        return redirect()->route('rapporteur.dashboard')->with('success', 'Enquête ajoutée avec succès.');
    }

   
}