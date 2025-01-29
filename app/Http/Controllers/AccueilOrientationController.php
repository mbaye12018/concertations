<?php

namespace App\Http\Controllers;

use App\Models\AccueilOrientation;
use App\Models\Soumission;
use Illuminate\Http\Request;

class AccueilOrientationController extends Controller
{
    public function index()
    {
        // 1) Récupérer les données en joignant la table 'soumissions'
        //    afin d'accéder à tranche_age, sexe, pays_diaspora (si c'est bien dans soumissions)
        $accueilData = AccueilOrientation::join('soumissions', 'accueil_orientation.id_soumission', '=', 'soumissions.id_soumission')
            ->select(
                'accueil_orientation.id_soumission',
                'evaluation_accueil',
                'signaletique_claire',
                'bonne_orientation',
                'tranche_age',
                'sexe',
                'pays_diaspora',
                'suggestions_accueil',
                'date_insertion' // ou date_insertion si vous voulez
            )
            ->get();
             // 2) Récupérer toutes les suggestions
        $suggestions = $accueilData->pluck('suggestions_accueil')->filter()->map(function ($suggestion) {
            return trim($suggestion);
        })->unique()->values()->toArray();


        // 2) Initialiser les compteurs pour l’évaluation (bar chart)
        $evaluationCount = [
            'excellent'    => 0,
            'bon'          => 0,
            'moyen'        => 0,
            'mauvais'      => 0,
            'tres_mauvais' => 0
        ];

        // 3) Répartition pour la signalétique claire (1 = oui, 0 = non)
        //    et bonne orientation (1 = oui, 0 = non)
        $signalCount = ['oui' => 0, 'non' => 0];
        $orientationCount = ['oui' => 0, 'non' => 0];

        // 4) Répartition globale par âge, sexe, localité
        $ageGroups    = [];
        $genderCount  = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount = ['Sénégal' => 0, 'Diaspora' => 0];

        // 5) Tableau détaillé si vous le souhaitez (pour un “detailed” usage)
        //    Par exemple, si vous voulez avoir des stats par “id_soumission” ou un regroupement par “évaluation”.
        //    Pour l’instant, on se contente de la collection brute.
        //    On peut aussi stocker item par item avec plus de détails.

        // 6) Parcourir chaque ligne
        foreach ($accueilData as $row) {
            // A) Incrémenter l’évaluation
            $eval = trim(strtolower($row->evaluation_accueil));
            if (isset($evaluationCount[$eval])) {
                $evaluationCount[$eval]++;
            }

            // B) Signalétique claire
            if ($row->signaletique_claire == 1) {
                $signalCount['oui']++;
            } else {
                $signalCount['non']++;
            }

            // C) Bonne orientation
            if ($row->bonne_orientation == 1) {
                $orientationCount['oui']++;
            } else {
                $orientationCount['non']++;
            }

            // D) Tranche d’âge
            $age = trim($row->tranche_age);
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }

            // E) Sexe
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if ($gender === 'Masculin' || $gender === 'Féminin') {
                $genderCount[$gender]++;
            }

            // F) Localité (Sénégal ou Diaspora)
            $isDiaspora = !empty($row->pays_diaspora);
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }
        }

        // 7) Préparer les labels/data pour les graphiques
        // -- Évaluation
        $evaluationLabels = ['Excellent','Bon','Moyen','Mauvais','Très mauvais'];
        $evaluationData   = [
            $evaluationCount['excellent'],
            $evaluationCount['bon'],
            $evaluationCount['moyen'],
            $evaluationCount['mauvais'],
            $evaluationCount['tres_mauvais'],
        ];

        // -- Signalétique
        $signaletiqueLabels = ['Oui','Non'];
        $signaletiqueData   = [$signalCount['oui'], $signalCount['non']];

        // -- Orientation
        $orientationLabels = ['Oui','Non'];
        $orientationData   = [$orientationCount['oui'], $orientationCount['non']];

        // -- Âge
        $ageLabels = array_keys($ageGroups);
        $ageData   = array_values($ageGroups);

        // -- Sexe
        $genderLabels = array_keys($genderCount); // ['Masculin','Féminin']
        $genderData   = array_values($genderCount);

        // -- Localité
        $localityLabels = array_keys($localityCount); // ['Sénégal','Diaspora']
        $localityData   = array_values($localityCount);

        // 8) Retourner la vue
        //    On envoie à la vue la collection “$accueilData” (pour un tableau détaillé)
        //    et aussi tous nos labels/data pour les charts
        return view('frontend.admin.accueil_orientation', compact(
            'accueilData',
            'evaluationLabels', 'evaluationData',
            'signaletiqueLabels','signaletiqueData',
            'orientationLabels','orientationData',
            'ageLabels','ageData',
            'genderLabels','genderData',
            'localityLabels','localityData',
            'suggestions'
        ));
    }
}

