<?php

namespace App\Http\Controllers;

use App\Models\Corruption;
use Illuminate\Http\Request;

class CorruptionController extends Controller
{
    public function index()
    {
        // 1️⃣ Récupérer les données avec les suggestions incluses
        $corruptionData = Corruption::join('soumissions', 'corruption.id_soumission', '=', 'soumissions.id_soumission')
            ->select(
                'corruption.id_soumission',
                'corruption_existante',
                'niveau_gravite',
                'types_corruption',
                'sexe',
                'tranche_age',
                'pays_diaspora',
                'suggestions_integrite', // Ajout des suggestions ici
                'corruption.created_at'
            )
            ->get();

        // 2️⃣ Initialisation des compteurs
        $evaluationCounts = [
            'tres_grave'        => 0,
            'grave'             => 0,
            'moyennement_grave' => 0,
            'peu_grave'         => 0,
            'pas_grave'         => 0,
        ];

        $existCount = ['oui' => 0, 'non' => 0];
        $genderCount = ['Masculin' => 0, 'Féminin' => 0];
        $ageGroups = [];
        $localityCount = ['Sénégal' => 0, 'Diaspora' => 0];

        $detailedCorruption = [];
        $suggestions = []; // Ajout des suggestions

        // 3️⃣ Boucle sur les données
        foreach ($corruptionData as $row) {
            // ✅ Évaluation de la gravité
            if (isset($evaluationCounts[$row->niveau_gravite])) {
                $evaluationCounts[$row->niveau_gravite]++;
            }

            // ✅ Corruption existante (Oui / Non)
            if ($row->corruption_existante == 1) {
                $existCount['oui']++;
            } else {
                $existCount['non']++;
            }

            // ✅ Répartition globale : âge, sexe, localité
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if ($gender === 'Masculin' || $gender === 'Féminin') {
                $genderCount[$gender]++;
            }

            $age = trim($row->tranche_age);
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }

            $isDiaspora = !empty($row->pays_diaspora);
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }

            // ✅ Types de corruption
            $rawTypes = [];

            if (is_string($row->types_corruption)) {
                $decodedTypes = json_decode($row->types_corruption, true);
                if (is_array($decodedTypes)) {
                    $rawTypes = $decodedTypes;
                }
            }

            foreach ($rawTypes as $type) {
                if (!isset($detailedCorruption[$type])) {
                    $detailedCorruption[$type] = [
                        'count' => 0,
                        'evaluation' => [
                            'tres_grave'        => 0,
                            'grave'             => 0,
                            'moyennement_grave' => 0,
                            'peu_grave'         => 0,
                            'pas_grave'         => 0,
                        ],
                        'gender'   => ['Masculin' => 0, 'Féminin' => 0],
                        'locality' => ['Sénégal' => 0, 'Diaspora' => 0],
                        'age_groups' => [],
                    ];
                }

                $detailedCorruption[$type]['count']++;
                if (isset($detailedCorruption[$type]['evaluation'][$row->niveau_gravite])) {
                    $detailedCorruption[$type]['evaluation'][$row->niveau_gravite]++;
                }

                if ($gender === 'Masculin' || $gender === 'Féminin') {
                    $detailedCorruption[$type]['gender'][$gender]++;
                }

                if ($isDiaspora) {
                    $detailedCorruption[$type]['locality']['Diaspora']++;
                } else {
                    $detailedCorruption[$type]['locality']['Sénégal']++;
                }

                if ($age) {
                    if (!isset($detailedCorruption[$type]['age_groups'][$age])) {
                        $detailedCorruption[$type]['age_groups'][$age] = 0;
                    }
                    $detailedCorruption[$type]['age_groups'][$age]++;
                }
            }

            // ✅ Récupération des suggestions
            if (!empty(trim($row->suggestions_integrite))) {
                $suggestions[] = trim($row->suggestions_integrite);
            }
        }

        // 🔹 Nettoyage des suggestions (supprimer valeurs vides & doublons)
        $suggestions = array_filter($suggestions, function ($value) {
            return !empty($value);
        });
        $suggestions = array_unique($suggestions);
        $suggestions = array_values($suggestions); // Réindexation

        // 🔹 Préparation des labels/data pour les graphiques
        $evaluationLabels = array_keys($evaluationCounts);
        $evaluationData   = array_values($evaluationCounts);

        $existLabels = ['Oui', 'Non'];
        $existData   = [$existCount['oui'], $existCount['non']];

        $genderLabels = array_keys($genderCount);
        $genderData   = array_values($genderCount);

        $ageLabels = array_keys($ageGroups);
        $ageData   = array_values($ageGroups);

        $localityLabels = array_keys($localityCount);
        $localityData   = array_values($localityCount);

        // 🔹 Retourner la vue corruption
        return view('frontend.admin.corruption', compact(
            'evaluationLabels','evaluationData',
            'existLabels','existData',
            'genderLabels','genderData',
            'ageLabels','ageData',
            'localityLabels','localityData',
            'detailedCorruption',
            'suggestions'
        ));
    }
}

