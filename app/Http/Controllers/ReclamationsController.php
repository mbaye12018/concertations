<?php

namespace App\Http\Controllers;

use App\Models\Reclamations;
use App\Models\Soumission;
use Illuminate\Http\Request;

class ReclamationsController extends Controller
{
    public function index()
{
    // 1️⃣ Récupération des données avec jointure
    $reclamationsData = Reclamations::join('soumissions', 'reclamations.id_soumission', '=', 'soumissions.id_soumission')
        ->select(
            'deja_deposee',
            'service_concerne',
            'mode_reclamation',
            'processus_clair',
            'delai_traitement',
            'tranche_age',
            'sexe',
            'pays_diaspora',
            'commentaires_reclamation' // Ajout pour récupérer les suggestions
        )
        ->get();

    // 2️⃣ Initialisation des compteurs
    $alreadyCount = ['Oui' => 0, 'Non' => 0];
    $servicesCount = [];
    $modeCount = [];
    $processCount = [];
    $delaiCount = [];
    $ageGroups = [];
    $genderCount = ['Masculin' => 0, 'Féminin' => 0];
    $localityCount = ['Sénégal' => 0, 'Diaspora' => 0];
    $suggestions = [];

    // 3️⃣ Parcours des données
    foreach ($reclamationsData as $row) {
        // A) Réclamation déjà déposée
        $alreadyKey = $row->deja_deposee ? 'Oui' : 'Non';
        $alreadyCount[$alreadyKey]++;

        // B) Services concernés (gestion JSON & CSV)
        $services = is_array(json_decode($row->service_concerne, true))
            ? json_decode($row->service_concerne, true)
            : explode(',', $row->service_concerne);

        foreach ($services as $service) {
            $service = trim($service);
            $servicesCount[$service] = ($servicesCount[$service] ?? 0) + 1;
        }

        // C) Mode de réclamation
        $mode = ucfirst(trim($row->mode_reclamation));
        $modeCount[$mode] = ($modeCount[$mode] ?? 0) + 1;

        // D) Processus clair
        $process = ucfirst(trim($row->processus_clair));
        $processCount[$process] = ($processCount[$process] ?? 0) + 1;

        // E) Délai de traitement
        $delai = ucfirst(trim($row->delai_traitement));
        $delaiCount[$delai] = ($delaiCount[$delai] ?? 0) + 1;

        // F) Tranche d’âge
        $age = trim($row->tranche_age);
        $ageGroups[$age] = ($ageGroups[$age] ?? 0) + 1;

        // G) Sexe
        $gender = ucfirst(strtolower(trim($row->sexe)));
        if (isset($genderCount[$gender])) {
            $genderCount[$gender]++;
        }

        // H) Localité (Sénégal / Diaspora)
        $locality = !empty($row->pays_diaspora) ? 'Diaspora' : 'Sénégal';
        $localityCount[$locality]++;

        // I) Suggestions
        if (!empty($row->commentaires_reclamation)) {
            $suggestions[] = trim($row->commentaires_reclamation);
        }
    }

    // 4️⃣ Préparation des données pour Chart.js
    $alreadyLabels = array_keys($alreadyCount);
    $alreadyData = array_values($alreadyCount);

    $servicesLabels = array_keys($servicesCount);
    $servicesData = array_values($servicesCount);

    $modeLabels = array_keys($modeCount);
    $modeData = array_values($modeCount);

    $processLabels = array_keys($processCount);
    $processData = array_values($processCount);

    $delaiLabels = array_keys($delaiCount);
    $delaiData = array_values($delaiCount);

    $ageLabels = array_keys($ageGroups);
    $ageData = array_values($ageGroups);

    $genderLabels = array_keys($genderCount);
    $genderData = array_values($genderCount);

    $localityLabels = array_keys($localityCount);
    $localityData = array_values($localityCount);

    // 5️⃣ Création du tableau récapitulatif
    $reclamationsTable = [];
    foreach ($servicesCount as $service => $count) {
        $reclamationsTable[$service] = [
            'total' => $count,
            'tres_clair' => $processCount['Très Clair'] ?? 0,
            'clair' => $processCount['Clair'] ?? 0,
            'moyennement_clair' => $processCount['Moyennement Clair'] ?? 0,
            'peu_clair' => $processCount['Peu Clair'] ?? 0,
            'tres_peu_clair' => $processCount['Très Peu Clair'] ?? 0,
            'traitement_rapide' => $delaiCount['Moins de 3 jours'] ?? 0,
            'traitement_moyen' => $delaiCount['1 semaine'] ?? 0,
            'traitement_lent' => $delaiCount['Plus d’une semaine'] ?? 0,
            'tranche_age_majoritaire' => $this->getMajorityAge($ageGroups),
            'hommes' => $genderCount['Masculin'] ?? 0,
            'femmes' => $genderCount['Féminin'] ?? 0,
            'senegal' => $localityCount['Sénégal'] ?? 0,
            'diaspora' => $localityCount['Diaspora'] ?? 0,
        ];
    }

    // 6️⃣ Retourner la vue avec les données
    return view('frontend.admin.reclamations', compact(
        'alreadyLabels', 'alreadyData',
        'servicesLabels', 'servicesData',
        'modeLabels', 'modeData',
        'processLabels', 'processData',
        'delaiLabels', 'delaiData',
        'ageLabels', 'ageData',
        'genderLabels', 'genderData',
        'localityLabels', 'localityData',
        'reclamationsTable',
        'suggestions'
    ));
}

/**
 * Détermine la tranche d'âge majoritaire
 */
private function getMajorityAge($ageGroups)
{
    return !empty($ageGroups) ? array_search(max($ageGroups), $ageGroups) : 'N/A';
}
}
