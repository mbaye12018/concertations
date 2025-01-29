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

        // Initialiser les compteurs et les suggestions
        $ageGroups = [];
        $genderCount = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount = ['Sénégal' => 0, 'Diaspora' => 0];
        $complexityCount = [
            'Procédures Longues' => 0,
            'Procédures Courtes' => 0,
            'Formalités Complexes' => 0,
            'Formalités Simples' => 0,
        ];
        $suggestions = [];

        // Parcourir les enregistrements
        foreach ($services as $row) {
            // Répartition par âge
            $age = trim($row->tranche_age);
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }

            // Répartition par sexe
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if ($gender === "Masculin" || $gender === "Féminin") {
                $genderCount[$gender]++;
            }

            // Répartition par localité
            $isDiaspora = !empty($row->pays_diaspora);
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }

            // Répartition par complexité
            if ($row->procedures_longues) {
                $complexityCount['Procédures Longues']++;
            } else {
                $complexityCount['Procédures Courtes']++;
            }

            if ($row->formalites_complexes) {
                $complexityCount['Formalités Complexes']++;
            } else {
                $complexityCount['Formalités Simples']++;
            }

            // 🔹 Ajout des suggestions
            if (!empty(trim($row->suggestions_delai))) {
                $suggestions[] = trim($row->suggestions_delai);
            }
            if (!empty(trim($row->suggestions_formalites))) {
                $suggestions[] = trim($row->suggestions_formalites);
            }
        }

        // Nettoyage des suggestions (supprimer valeurs vides & doublons)
        $suggestions = array_filter($suggestions, function ($value) {
            return !empty($value);
        });
        $suggestions = array_unique($suggestions);
        $suggestions = array_values($suggestions); // Réindexation

        // 🔍 Vérification avec dd()
        // dd($suggestions); // Activer pour vérifier si des suggestions existent bien

        // Préparer les données pour les graphiques
        $ageLabels = array_keys($ageGroups);
        $ageData = array_values($ageGroups);
        $genderLabels = array_keys($genderCount);
        $genderData = array_values($genderCount);
        $localityLabels = array_keys($localityCount);
        $localityData = array_values($localityCount);
        $complexityLabels = array_keys($complexityCount);
        $complexityData = array_values($complexityCount);

        // Retourner la vue avec les suggestions
        return view('frontend.admin.diligence', compact(
            'ageLabels', 'ageData',
            'genderLabels', 'genderData',
            'localityLabels', 'localityData',
            'complexityLabels', 'complexityData',
            'suggestions'
        ));
    }
}
