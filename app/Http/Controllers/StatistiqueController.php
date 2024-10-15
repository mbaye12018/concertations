<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnqueteGenerale;  // Le modèle pour les enquêtes
use App\Models\Region;  // Le modèle pour les régions
use App\Models\Department;  // Modèle pour les départements, si applicable


class StatistiqueController extends Controller
{
    public function index()
    {
        // Récupérer les données pour le Sénégal et la Diaspora
        $totalSenegal = EnqueteGenerale::where('location', 'Senegal')->count();
        $totalDiaspora = EnqueteGenerale::where('location', 'Diaspora')->count();

        // Récupérer les données par région pour le Sénégal
        $regions = Region::all(); // Exemple, ajustez selon votre structure

        // Passer les données à la vue
        return view('statistique.index', compact('totalSenegal', 'totalDiaspora', 'regions'));
    }

    // Endpoint pour AJAX (si vous voulez faire du chargement dynamique)
   // StatistiqueController.php
public function getStatistics(Request $request)
{
    $location = $request->input('location');
    $region = $request->input('region');
    
    if ($location === 'senegal' && $region) {
        // Récupérer les départements pour le Sénégal
        $data = EnqueteGenerale::where('location', 'Senegal')
            ->where('region', $region)
            ->select('department', \DB::raw('count(*) as total'))
            ->groupBy('department')
            ->get();
    } elseif ($location === 'diaspora') {
        // Récupérer les pays pour la Diaspora
        $data = EnqueteGenerale::where('location', 'Diaspora')
            ->select('country', \DB::raw('count(*) as total'))
            ->groupBy('country')
            ->get();
    } else {
        return response()->json(['error' => 'Invalid location'], 400);
    }

    return response()->json($data);
}

    
    
}


   
    

    

   
    
    
    




    










