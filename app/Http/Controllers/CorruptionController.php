<?php

namespace App\Http\Controllers;

use App\Models\Corruption;
use Illuminate\Http\Request;

class CorruptionController extends Controller
{
    public function index()
    {
        // Récupérer les données de la table 'corruption'
        $corruptionData = Corruption::all();

        // Calculer les statistiques ou préparer les données pour le graphique
        $evaluationCounts = [
            'tres_grave' => 0,
            'grave' => 0,
            'moyennement_grave' => 0,
            'peu_grave' => 0,
            'pas_grave' => 0,
        ];

        // Compter les occurrences de chaque niveau de gravité
        foreach ($corruptionData as $item) {
            $niveauGravite = $item->niveau_gravite;
            if (isset($evaluationCounts[$niveauGravite])) {
                $evaluationCounts[$niveauGravite]++;
            }
        }

        // Passer les données à la vue
        return view('frontend.admin.corruption', compact('evaluationCounts'));
    }
}

