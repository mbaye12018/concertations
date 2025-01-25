<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoutService;

class CoutServiceController extends Controller
{
    public function index()
    {
        // Récupérer les évaluations des coûts du service
        $coutServices = CoutService::all();

        // Organiser les données pour les graphiques
        $evaluations = [
            'tres_abordable' => 0,
            'abordable' => 0,
            'moyennement_cher' => 0,
            'cher' => 0,
            'tres_cher' => 0,
        ];

        foreach ($coutServices as $service) {
            // Incrémenter les évaluations en fonction des données
            if ($service->evaluation_cout === 'tres_abordable') {
                $evaluations['tres_abordable']++;
            } elseif ($service->evaluation_cout === 'abordable') {
                $evaluations['abordable']++;
            } elseif ($service->evaluation_cout === 'moyennement_cher') {
                $evaluations['moyennement_cher']++;
            } elseif ($service->evaluation_cout === 'cher') {
                $evaluations['cher']++;
            } elseif ($service->evaluation_cout === 'tres_cher') {
                $evaluations['tres_cher']++;
            }
        }

        // Passer les données à la vue
        return view('frontend.admin.cout_service', compact('evaluations'));
    }
}
