<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soumission; // Assurez-vous d'utiliser le bon modèle

class StatistiqueController extends Controller
{
    public function index()
    {
        // Récupérer les totaux pour le Sénégal et la Diaspora
        $totalSenegal = Soumission::where('lieu_residence', 'Senegal')->count();
        $totalDiaspora = Soumission::where('lieu_residence', 'Diaspora')->count();

        // Passer les données à la vue
        return view('statistique.index', compact('totalSenegal', 'totalDiaspora'));
    }

   
    public function getStatistics(Request $request)
{
    $location = $request->input('location');
    $regionId = $request->input('region_id'); // Nouvelle variable pour la région

    // En fonction de la localisation choisie, récupérez les statistiques
    if ($location == 'Senegal') {
        // Si une région est choisie, récupérez les statistiques pour cette région
        if ($regionId) {
            $senegalCount = Soumission::where('lieu_residence', 'Sénégal')
                                      ->where('region_id', $regionId)
                                      ->count();
            return response()->json([
                'labels' => ['Région ' . $regionId],
                'chartData' => [$senegalCount]
            ]);
        } else {
            // Sinon, récupérez les statistiques globales pour le Sénégal
            $senegalCount = Soumission::where('lieu_residence', 'Sénégal')->count();
            return response()->json([
                'labels' => ['Sénégal'],
                'chartData' => [$senegalCount]
            ]);
        }
    } elseif ($location == 'Diaspora') {
        $diasporaCount = Soumission::where('lieu_residence', 'Diaspora')->count();
        return response()->json([
            'labels' => ['Diaspora'],
            'chartData' => [$diasporaCount]
        ]);
    }

    // Si aucune localisation n'est choisie
    return response()->json([
        'labels' => [],
        'chartData' => []
    ]);
}

}
