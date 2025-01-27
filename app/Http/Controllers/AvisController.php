<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AvisController extends Controller
{
    public function index()
    {
        // Récupérer les données pour chaque thème
        $data = [
            'accueil_orientation' => DB::table('accueil_orientation')->count(),
            'corruption' => DB::table('corruption')->count(),
            'cout_service' => DB::table('cout_service')->count(),
            'digitale' => DB::table('digitale')->count(),
            'diligence' => DB::table('diligence')->count(),
            'participation' => DB::table('participation')->count(),
            'reclamations' => DB::table('reclamations')->count(),
            'ressources_humaines' => DB::table('ressources_humaines')->count(),
            'acces_services_publics' => DB::table('acces_services_publics')->count(), // Accès aux services publics ajouté
        ];

        // Vous pouvez ajouter d'autres tables ici, suivant la même logique.

        // Retourner les données à la vue pour affichage sur le dashboard
        return view('frontend.admin.dashboard', compact('data'));
    }
}


