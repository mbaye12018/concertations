<?php

namespace App\Http\Controllers;

use App\Models\Participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    public function index()
    {
        // 1) Récupérer les données en joignant 'soumissions' si nécessaire
        $participationData = Participation::join('soumissions', 'participation.id_soumission', '=', 'soumissions.id_soumission')
            ->select(
                'participation.id_soumission',
                'information_reformes',    // tinyint => 1 ou 0
                'satisfaction_participation',  // varchar(50) => tres_satisfait, satisfait, ...
                'facilite_numerique',      // tinyint => 1 ou 0
                'impact_reel',             // tinyint => 1 ou 0
                'suggestions_inclusion',   // text
                'sexe',
                'tranche_age',
                'pays_diaspora'
            )
            ->get();

        // 2) Initialisation des compteurs
        // A) Satisfaction (bar chart)
        $satisfactionCount = [
            'tres_satisfait'     => 0,
            'satisfait'          => 0,
            'moyennement_satisfait' => 0,
            'insatisfait'        => 0,
            'tres_insatisfait'   => 0
        ];

        // B) Information réformes (1 => oui, 0 => non)
        $infoCount = ['oui' => 0, 'non' => 0];

        // C) Facilité numérique
        $faciliteCount = ['oui' => 0, 'non' => 0];

        // D) Impact réel
        $impactCount = ['oui' => 0, 'non' => 0];

        // E) Répartition globale : âge, sexe, localité
        $ageGroups    = [];
        $genderCount  = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount= ['Sénégal' => 0, 'Diaspora' => 0];

        // F) Récupération des suggestions
        $suggestions = [];

        // 3) Parcourir les données
        foreach ($participationData as $row) {
            // A) Satisfaction
            $satKey = strtolower(trim($row->satisfaction_participation));
            if (isset($satisfactionCount[$satKey])) {
                $satisfactionCount[$satKey]++;
            } else {
                // S'il arrive une valeur hors tableau, on peut l'incrémenter sur "moyennement_satisfait" par ex.
                $satisfactionCount['moyennement_satisfait']++;
            }

            // B) Information réformes
            $infoKey = $row->information_reformes ? 'oui' : 'non';
            $infoCount[$infoKey]++;

            // C) Facilité numérique
            $facKey = $row->facilite_numerique ? 'oui' : 'non';
            $faciliteCount[$facKey]++;

            // D) Impact réel
            $impactKey = $row->impact_reel ? 'oui' : 'non';
            $impactCount[$impactKey]++;

            // E) Répartition par âge, sexe, localité
            // - Âge
            $age = trim($row->tranche_age);
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }

            // - Sexe
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if (isset($genderCount[$gender])) {
                $genderCount[$gender]++;
            }

            // - Localité
            $isDiaspora = !empty($row->pays_diaspora);
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }

            // F) Suggestions
            if (!empty(trim($row->suggestions_inclusion))) {
                $suggestions[] = trim($row->suggestions_inclusion);
            }
        }

        // Nettoyage des suggestions
        $suggestions = array_filter(array_unique($suggestions));

        // 4) Préparation des données pour Chart.js
        // A) Satisfaction
        // On décide de l’ordre d’affichage
        $satisfactionLabels = ['Très satisfait','Satisfait','Moyennement satisfait','Insatisfait','Très insatisfait'];
        $satisfactionData   = [
            $satisfactionCount['tres_satisfait'],
            $satisfactionCount['satisfait'],
            $satisfactionCount['moyennement_satisfait'],
            $satisfactionCount['insatisfait'],
            $satisfactionCount['tres_insatisfait']
        ];

        // B) Information réformes
        $infoLabels = ['Oui','Non'];
        $infoData   = [
            $infoCount['oui'],
            $infoCount['non']
        ];

        // C) Facilité numérique
        $faciliteLabels = ['Oui','Non'];
        $faciliteData   = [
            $faciliteCount['oui'],
            $faciliteCount['non']
        ];

        // D) Impact
        $impactLabels = ['Oui','Non'];
        $impactData   = [
            $impactCount['oui'],
            $impactCount['non']
        ];

        // E) Âge
        $ageLabels = array_keys($ageGroups);
        $ageData   = array_values($ageGroups);

        // F) Sexe
        $genderLabels = array_keys($genderCount);
        $genderData   = array_values($genderCount);

        // G) Localité
        $localityLabels = array_keys($localityCount);
        $localityData   = array_values($localityCount);

        // 5) Retourner la vue
        return view('frontend.admin.participation', compact(
            'satisfactionLabels','satisfactionData',
            'infoLabels','infoData',
            'faciliteLabels','faciliteData',
            'impactLabels','impactData',
            'ageLabels','ageData',
            'genderLabels','genderData',
            'localityLabels','localityData',
            'suggestions'
        ));
    }
}
