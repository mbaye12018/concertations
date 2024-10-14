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
        \Log::info('Données soumises : ', $request->all());

        // Validation des données
        $validatedData = $request->validate([
            'region_id' => 'required|exists:regions,id',
            'departement_id' => 'required|exists:departements,id', // Correction ici : 'department_id' -> 'departement_id'
            'secteur_id' => 'required|exists:secteurs,id',
            'utilisateurs_id' => 'required|exists:utilisateurs,id',
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

        // Insertion des données dans la base de données
        try {
            EnqueteRapporteur::create($validatedData); // Utilise les données validées
            return redirect()->route('rapporteur.dashboard')->with('success', 'Enquête ajoutée avec succès.');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'ajout de l\'enquête : ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de l\'ajout de l\'enquête.']);
        }
    }
}
