<?php
namespace App\Http\Controllers;

use App\Models\AccueilOrientation;
use Illuminate\Http\Request;

class AccueilOrientationController extends Controller
{
    public function index()
    {
        // Récupérer les données de la table 'accueil_orientation'
        $accueilOrientations = AccueilOrientation::all();

        // Calculer les statistiques des évaluations
        $evaluations = [
            'excellent' => $accueilOrientations->where('evaluation_accueil', 'excellent')->count(),
            'bon' => $accueilOrientations->where('evaluation_accueil', 'bon')->count(),
            'moyen' => $accueilOrientations->where('evaluation_accueil', 'moyen')->count(),
            'mauvais' => $accueilOrientations->where('evaluation_accueil', 'mauvais')->count(),
            'tres_mauvais' => $accueilOrientations->where('evaluation_accueil', 'tres_mauvais')->count(),
        ];

        // Passer les données à la vue
        return view('frontend.admin.accueil_orientation', compact('evaluations'));
    }
}

