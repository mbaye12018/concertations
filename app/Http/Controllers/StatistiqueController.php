<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnqueteGenerale;  // Le modèle pour les enquêtes
use App\Models\Region;  // Le modèle pour les régions
use App\Models\Department;  // Modèle pour les départements, si applicable

class StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->input('location');
        $region = $request->input('region');
        $department = $request->input('department');

        // Initialiser les labels et les données
        $labels = [];
        $data = [];

        // Si une localisation (Sénégal ou Diaspora) est sélectionnée
        if ($location === 'Senegal') {
            // Filtrer par région si spécifié
            if ($region) {
                $labels = Region::where('name', $region)->pluck('name')->toArray();  // Récupérer les noms des régions
                $data = EnqueteGenerale::where('location', 'Senegal')
                                       ->where('region', $region)
                                       ->count();  // Nombre d'enquêtes pour cette région
            } elseif ($department) {
                // Filtrer par département si spécifié
                $labels = Department::where('name', $department)->pluck('name')->toArray();
                $data = EnqueteGenerale::where('location', 'Senegal')
                                       ->where('department', $department)
                                       ->count();  // Nombre d'enquêtes pour ce département
            } else {
                // Sinon, récupérer les statistiques globales pour le Sénégal
                $labels = ['Sénégal'];
                $data = [EnqueteGenerale::where('location', 'Senegal')->count()];
            }
        } elseif ($location === 'Diaspora') {
            // Si une localisation "Diaspora" est sélectionnée
            $labels = ['Diaspora'];
            $data = [EnqueteGenerale::where('location', 'Diaspora')->count()];
        } else {
            // Afficher les statistiques globales (Sénégal et Diaspora)
            $labels = ['Sénégal', 'Diaspora'];
            $data = [
                EnqueteGenerale::where('location', 'Senegal')->count(),
                EnqueteGenerale::where('location', 'Diaspora')->count()
            ];
        }

        // Renvoyer les labels et données à la vue
        return view('statistique.index', compact('labels', 'data', 'location', 'region', 'department'));
    }
}

   
    

    

   
    
    
    




    










