<?php

namespace App\Http\Controllers;

use App\Models\Digitale;
use Illuminate\Http\Request;

class DigitaleController extends Controller
{
    public function index()
    {
        // 1) Jointure avec soumissions
        $digitaleData = Digitale::join('soumissions', 'digitale.id_soumission', '=', 'soumissions.id_soumission')
            ->select(
                'digitale.id_soumission',
                'evaluation_accessibilite', // ex. tres_accessible, accessible, etc.
                'utilise_services_digitaux', // tinyint => 1 (oui) ou 0 (non)
                'rencontree_problemes',      // tinyint => 1 (oui) ou 0 (non)
                'services_digitaux_frequents', // JSON ou CSV ?
                'types_problemes',            // JSON ou CSV ?
                'tranche_age',
                'sexe',
                'pays_diaspora',
                'suggestions_digitale'        // Récupération des suggestions
            )
            ->get();

        // 2) Initialiser les compteurs
        // A) Évaluation de l’accessibilité
        $evaluationCount = [
            'tres_accessible'        => 0,
            'accessible'             => 0,
            'moyennement_accessible' => 0,
            'difficilement_accessible' => 0,
            'tres_difficilement_accessible' => 0,
        ];

        // B) utilise_services_digitaux (1 => oui, 0 => non)
        $usageCount = ['oui' => 0, 'non' => 0];

        // C) rencontree_problemes (1 => oui, 0 => non)
        $problemCount = ['oui' => 0, 'non' => 0];

        // D) Répartition globale : âge, sexe, localité
        $ageGroups    = [];
        $genderCount  = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount= ['Sénégal' => 0, 'Diaspora' => 0];

        // E) Suggestions
        $suggestions = [];

        // 3) Parcourir les données
        foreach ($digitaleData as $row) {
            // A) Évaluation de l’accessibilité
            if (isset($evaluationCount[$row->evaluation_accessibilite])) {
                $evaluationCount[$row->evaluation_accessibilite]++;
            } else {
                // Si la valeur n'est pas dans le tableau, on peut l'ajouter
                // ou la traiter comme "moyennement_accessible" par défaut
                $evaluationCount['moyennement_accessible']++;
            }

            // B) utilise_services_digitaux
            if ($row->utilise_services_digitaux == 1) {
                $usageCount['oui']++;
            } else {
                $usageCount['non']++;
            }

            // C) rencontree_problemes
            if ($row->rencontree_problemes == 1) {
                $problemCount['oui']++;
            } else {
                $problemCount['non']++;
            }

            // D) Répartition par âge
            $age = trim($row->tranche_age);
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }

            // E) Répartition par sexe
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if (isset($genderCount[$gender])) {
                $genderCount[$gender]++;
            }

            // F) Répartition par localité
            $isDiaspora = !empty($row->pays_diaspora);
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }

            // G) Récupérer les suggestions
            if (!empty(trim($row->suggestions_digitale))) {
                $suggestions[] = trim($row->suggestions_digitale);
            }
        }

        // Nettoyage et dédoublonnage des suggestions
        $suggestions = array_filter($suggestions, fn($val) => !empty($val));
        $suggestions = array_unique($suggestions);
        $suggestions = array_values($suggestions);

        // 4) Préparer les données pour Chart.js
        // A) Évaluation Accessibilité
        // On choisit l’ordre d’affichage
        $evaluationLabels = ['très accessible','accessible','moyennement accessible','difficilement accessible','très difficilement accessible'];
        $evaluationData = [
            $evaluationCount['tres_accessible'],
            $evaluationCount['accessible'],
            $evaluationCount['moyennement_accessible'],
            $evaluationCount['difficilement_accessible'],
            $evaluationCount['tres_difficilement_accessible'],
        ];

        // B) Usage
        $usageLabels = ['Oui','Non'];
        $usageData = [
            $usageCount['oui'],
            $usageCount['non'],
        ];

        // C) Problèmes
        $problemLabels = ['Oui','Non'];
        $problemData   = [
            $problemCount['oui'],
            $problemCount['non'],
        ];

        // D) Âge
        $ageLabels = array_keys($ageGroups);
        $ageData   = array_values($ageGroups);

        // E) Sexe
        $genderLabels = array_keys($genderCount);
        $genderData   = array_values($genderCount);

        // F) Localité
        $localityLabels = array_keys($localityCount);
        $localityData   = array_values($localityCount);

        // 5) Retourner la vue
        return view('frontend.admin.digitale', compact(
            // Graphique Accessibilité
            'evaluationLabels','evaluationData',
            // Graphique Usage
            'usageLabels','usageData',
            // Graphique Problèmes
            'problemLabels','problemData',
            // Graphique Age
            'ageLabels','ageData',
            // Graphique Sexe
            'genderLabels','genderData',
            // Graphique Localité
            'localityLabels','localityData',
            // Suggestions
            'suggestions'
        ));
    }
}
