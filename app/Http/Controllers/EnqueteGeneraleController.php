<?php

namespace App\Http\Controllers;

use App\Models\EnqueteGenerale;
use Illuminate\Http\Request;

class EnqueteGeneraleController extends Controller
{
    public function create()
    {
        return view('enquete.create'); 
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'location' => 'required|string|max:100',
            'country' => 'nullable|string|max:100',
            'name' => 'required|string|max:100',
            'contact' => 'required|string|max:100',
            'fonction' => 'required|string|max:15', 
            'service_quality' => 'nullable|string', 
            'service_point' => 'nullable|string', 
            'accessible' => 'nullable|string', 
            'obstacle' => 'nullable|string', 
            'service_long' => 'nullable|string', 
            'service_efficace' => 'nullable|string', 
            'service_modernise' => 'nullable|string', 
            'service_outils' => 'nullable|string', 
            'reformes' => 'nullable|string', 
            'ameliorer_services' => 'nullable|string',
            'transparence_responsabilite' => 'nullable|string',
            'accessibilite_services' => 'nullable|string',
            'simplification_procedures' => 'nullable|string',
            'coordination_services' => 'nullable|string',
            'technologies_numeriques' => 'nullable|string',
            'formation_agents' => 'nullable|string',
            'association_citoyens' => 'nullable|string',
            'outils_participation' => 'nullable|string',
            'additional_comments' => 'nullable|string',



          
        ]);

       
        EnqueteGenerale::create($request->all());

        // Redirection après l'enregistrement
        return redirect()->route('enquete.create')->with('success', 'Enquête soumise avec succès.');
    }
}