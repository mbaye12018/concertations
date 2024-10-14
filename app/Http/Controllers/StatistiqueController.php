<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnqueteGenerale;
use App\Models\EnqueteRapporteur;
use App\Models\Region;
class StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->input('location');
    
        // Récupérer les enquêtes filtrées par localisation
        $enquetes = EnqueteGenerale::when($location, function ($query, $location) {
            return $query->where('location', $location);
        })->get();
    
        // Compter le nombre total d'avis par localisation
        $totalSenegal = EnqueteGenerale::where('location', 'Senegal')->count();
        $totalDiaspora = EnqueteGenerale::where('location', 'Diaspora')->count();
    
        // Préparer les labels et les données pour le graphique
        $labels = [];
        $data = [];
    
        if ($location === 'Senegal') {
            $labels = ['Sénégal'];
            $data = [$totalSenegal];
        } elseif ($location === 'Diaspora') {
            $labels = ['Diaspora'];
            $data = [$totalDiaspora];
        } else {
            // Afficher les deux si aucun filtre n'est appliqué
            $labels = ['Sénégal', 'Diaspora'];
            $data = [$totalSenegal, $totalDiaspora];
        }
    
        return view('statistique.index', compact('enquetes', 'labels', 'data', 'location'));
    }
    }

    

   
    
    
    




    










