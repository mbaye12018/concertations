<?php
namespace App\Http\Controllers;

use App\Models\CoutService;
use Illuminate\Http\Request;

class CoutServiceController extends Controller
{
    public function index()
    {
        // 🔹 Récupération des données avec les suggestions incluses
        $coutData = CoutService::join('soumissions', 'cout_service.id_soumission', '=', 'soumissions.id_soumission')
            ->select(
                'cout_service.id_soumission',
                'evaluation_cout',
                'cout_justifie',
                'mecanisme_paiement',
                'tranche_age',
                'sexe',
                'pays_diaspora',
                'suggestions_cout' // Ajout des suggestions ici
            )
            ->get();

        // 🔹 Initialisation des compteurs
        $evaluationCount = [
            'tres_abordable' => 0,
            'abordable'      => 0,
            'moyennement_cher' => 0,
            'cher'          => 0,
            'tres_cher'      => 0,
        ];

        $coutJustifieCount = ['oui' => 0, 'non' => 0];
        $mecanismePaiementCount = [];
        $ageGroups = [];
        $genderCount = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount = ['Sénégal' => 0, 'Diaspora' => 0];
        $suggestions = []; // Ajout des suggestions

        // 🔹 Boucle sur les données
        foreach ($coutData as $row) {
            // ✅ Évaluation du coût
            if (isset($evaluationCount[$row->evaluation_cout])) {
                $evaluationCount[$row->evaluation_cout]++;
            }

            // ✅ Justification du coût (1 = Oui, 0 = Non)
            if ($row->cout_justifie == 1) {
                $coutJustifieCount['oui']++;
            } else {
                $coutJustifieCount['non']++;
            }

            // ✅ Mécanisme de paiement
            $mecanisme = strtolower(trim($row->mecanisme_paiement));
            if (!isset($mecanismePaiementCount[$mecanisme])) {
                $mecanismePaiementCount[$mecanisme] = 0;
            }
            $mecanismePaiementCount[$mecanisme]++;

            // ✅ Tranche d'âge
            $age = trim($row->tranche_age);
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }

            // ✅ Sexe
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if ($gender === 'Masculin' || $gender === 'Féminin') {
                $genderCount[$gender]++;
            }

            // ✅ Localité
            $isDiaspora = !empty($row->pays_diaspora);
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }

            // ✅ Récupération des suggestions du coût
            if (!empty(trim($row->suggestions_cout))) {
                $suggestions[] = trim($row->suggestions_cout);
            }
        }

        // 🔹 Nettoyage des suggestions (supprimer valeurs vides & doublons)
        $suggestions = array_filter($suggestions, function ($value) {
            return !empty($value);
        });
        $suggestions = array_unique($suggestions);
        $suggestions = array_values($suggestions); // Réindexation

        // ✅ Vérification avec dd() (décommentez pour tester)
        // dd($suggestions);

        // 🔹 Préparation des labels/data pour les graphiques
        $evaluationLabels = array_keys($evaluationCount);
        $evaluationData = array_values($evaluationCount);

        $coutJustifieLabels = ['Oui', 'Non'];
        $coutJustifieData = [$coutJustifieCount['oui'], $coutJustifieCount['non']];

        $mecanismeLabels = array_keys($mecanismePaiementCount);
        $mecanismeData = array_values($mecanismePaiementCount);

        $ageLabels = array_keys($ageGroups);
        $ageData = array_values($ageGroups);

        $genderLabels = array_keys($genderCount);
        $genderData = array_values($genderCount);

        $localityLabels = array_keys($localityCount);
        $localityData = array_values($localityCount);

        // 🔹 Retourner la vue avec toutes les variables
        return view('frontend.admin.cout_service', compact(
            'coutData',
            'evaluationLabels', 'evaluationData',
            'coutJustifieLabels', 'coutJustifieData',
            'mecanismeLabels', 'mecanismeData',
            'ageLabels', 'ageData',
            'genderLabels', 'genderData',
            'localityLabels', 'localityData',
            'suggestions' // Passer les suggestions à la vue
        ));
    }
}
