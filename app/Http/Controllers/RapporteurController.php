<?php

namespace App\Http\Controllers;

use App\Models\Region; // Modèle Region
use App\Models\Departement; // Modèle Departement
use App\Models\Secteur; // Modèle Secteur
use Illuminate\Http\Request;

class RapporteurController extends Controller
{
    public function index()
    {
        // Récupérer toutes les régions de la base de données
        $regions = Region::all(); 

      
        return view('frontend.rapporteur.dashboard', compact('regions'));
    }

    // Méthode pour récupérer les régions au format JSON
    public function getRegions()
    {
        $regions = Region::all(); // Récupérer toutes les régions
        return response()->json($regions); // Retourner les régions en JSON
    }

 
    public function getDepartements($regionId)
    {
       
        $departements = Departement::where('region_id', $regionId)->get();
        
      
        return response()->json($departements);
    }

 
    public function getSecteurs($departementId)
    {
        // Récupérer les secteurs en fonction de l'ID du département
        $secteurs = Secteur::where('departement_id', $departementId)->get();
        
        // Retourner les secteurs en JSON
        return response()->json($secteurs);
    }
}

