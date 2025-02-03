<?php

namespace App\Http\Controllers;

use App\Models\Diligence;
use Illuminate\Http\Request;

class DiligenceController extends Controller
{
    public function index()
    {
        $services = Diligence::join('soumissions', 'diligence.id_soumission', '=', 'soumissions.id_soumission')
            ->select('tranche_age', 'sexe', 'pays_diaspora', 'procedures_longues', 'formalites_complexes', 'suggestions_delai', 'suggestions_formalites')
            ->get();

        // Initialiser les compteurs
        $ageGroups    = [];
        $genderCount  = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount= ['Sénégal' => 0, 'Diaspora' => 0];

        // Au lieu d’un tableau global, on sépare :
        $proceduresLongues = 0;
        $proceduresCourtes = 0;
        $formalitesComplexes = 0;
        $formalitesSimples   = 0;

        $suggestions = [];

        // Parcourir les enregistrements
        foreach ($services as $row) {
            // Tranche d’âge
            $age = trim($row->tranche_age);
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }

            // Sexe
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if ($gender === "Masculin" || $gender === "Féminin") {
                $genderCount[$gender]++;
            }

            // Localité
            $isDiaspora = !empty($row->pays_diaspora);
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }

            // Procédures longues / courtes
            if ($row->procedures_longues) {
                $proceduresLongues++;
            } else {
                $proceduresCourtes++;
            }

            // Formalités complexes / simples
            if ($row->formalites_complexes) {
                $formalitesComplexes++;
            } else {
                $formalitesSimples++;
            }

            // Suggestions (delai, formalites)
            if (!empty(trim($row->suggestions_delai))) {
                $suggestions[] = trim($row->suggestions_delai);
            }
            if (!empty(trim($row->suggestions_formalites))) {
                $suggestions[] = trim($row->suggestions_formalites);
            }
        }

        // Nettoyage des suggestions
        $suggestions = array_filter($suggestions, fn($val) => !empty($val));
        $suggestions = array_unique($suggestions);
        $suggestions = array_values($suggestions); // Réindexation

        // Préparer les données pour les graphiques
        $ageLabels    = array_keys($ageGroups);
        $ageData      = array_values($ageGroups);

        $genderLabels = array_keys($genderCount);
        $genderData   = array_values($genderCount);

        $localityLabels = array_keys($localityCount);
        $localityData   = array_values($localityCount);

        // Procédures
        $proceduresLabels = ["Procédures Longues","Procédures Courtes"];
        $proceduresData   = [$proceduresLongues, $proceduresCourtes];

        // Formalités
        $formalitesLabels = ["Formalités Complexes","Formalités Simples"];
        $formalitesData   = [$formalitesComplexes, $formalitesSimples];

        // Retourner la vue
        return view('frontend.admin.diligence', compact(
            'ageLabels','ageData',
            'genderLabels','genderData',
            'localityLabels','localityData',

            'proceduresLabels','proceduresData',
            'formalitesLabels','formalitesData',

            'suggestions'
        ));
    }
}
