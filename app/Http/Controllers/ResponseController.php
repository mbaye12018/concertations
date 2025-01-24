<?php

namespace App\Http\Controllers;

use App\Models\EnqueteGenerale; 
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function getResponses()
    {
        // Comptage des réponses sur la qualité des services
        $data = [
            'Médiocre' => EnqueteGenerale::where('service_quality', '1')->count(),
            'Insatisfaisant' => EnqueteGenerale::where('service_quality', '2')->count(),
            'Moyenne' => EnqueteGenerale::where('service_quality', '3')->count(),
            'Satisfaisant' => EnqueteGenerale::where('service_quality', '4')->count(),
            'Très Satisfaisant' => EnqueteGenerale::where('service_quality', '5')->count(),
            'Accessibilite_Oui' => EnqueteGenerale::where('accessible', 'Oui')->count(), // Compte les réponses "Oui"
            'Accessibilite_Non' => EnqueteGenerale::where('accessible', 'Non')->count(), // Compte les réponses "Non"
            'Efficacite_Inefficace' => EnqueteGenerale::where('service_efficace', 'Inefficace')->count(),
            'Efficacite_Peu efficace' => EnqueteGenerale::where('service_efficace', 'Peu efficace')->count(),
            'Efficacite_Moyenne' => EnqueteGenerale::where('service_efficace', 'Moyennement efficace')->count(),
            'Efficacite_Efficace' => EnqueteGenerale::where('service_efficace', 'Efficace')->count(),
            'Efficacite_Tres_Efficace' => EnqueteGenerale::where('service_efficace', 'Très efficace')->count(),
        ];
        
        return response()->json($data);
    }
}
