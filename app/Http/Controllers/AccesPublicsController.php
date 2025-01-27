<?php

namespace App\Http\Controllers;

use App\Models\AccesServicesPublics;
use App\Models\Soumission;
use Illuminate\Http\Request;

class AccesPublicsController extends Controller
{
    public function index()
    {
        // 1) Récupérer les données
        $services = AccesServicesPublics::join('soumissions', 'acces_services_publics.id_soumission', '=', 'soumissions.id_soumission')
            ->select(
                'acces_services_publics.id_soumission',
                'services_frequentes',
                'accessibilite',
                'tranche_age',
                'sexe',
                'pays_diaspora'
            )
            ->get();

        // 2) Définir le mapping (correspondance) pour transformer
        //    "moyennement_accessible" => "moyennement accessible", etc.
        $mapping = [
            'tres_accessible'               => 'très accessible',
            'accessible'                    => 'accessible',
            'moyennement_accessible'        => 'moyennement accessible',
            'difficilement_accessible'      => 'difficilement accessible',
            'tres_difficilement_accessible' => 'très difficilement accessible',
        ];

        // 3) Initialiser les compteurs globaux
        $accessibilityCount = [
            'très accessible'               => 0,
            'accessible'                    => 0,
            'moyennement accessible'        => 0,
            'difficilement accessible'      => 0,
            'très difficilement accessible' => 0,
        ];

        $servicesCount   = []; // Nombre de fois qu'un service est cité (global)
        $detailedServices = []; // Détails pour chaque service
        $ageGroups       = []; // Répartition globale par âge (si besoin)
        $genderCount     = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount   = ['Sénégal' => 0, 'Diaspora' => 0];

        // Compteur total pour calculer les pourcentages d’accessibilité
        $totalAccessibilities = 0;

        // 4) Parcourir les enregistrements
        foreach ($services as $row) {
            // Décoder les champs JSON
            $servicesArray = json_decode($row->services_frequentes, true) ?? [];
            $accessibilityRaw = json_decode($row->accessibilite, true) ?? [];

            // Normaliser l’accessibilité au cas où c’est un objet JSON
            if (is_object($accessibilityRaw)) {
                $accessibilityRaw = (array) $accessibilityRaw;
            }
            $accessibilityArray = array_values($accessibilityRaw);

            // Boucler sur chaque service récupéré
            foreach ($servicesArray as $index => $serviceName) {
                // Incrémenter le compteur global pour ce service
                if (!isset($servicesCount[$serviceName])) {
                    $servicesCount[$serviceName] = 0;
                }
                $servicesCount[$serviceName]++;

                // Récupérer l’accessibilité correspondante
                $accessLevelKey = $accessibilityArray[$index] ?? null;

                // 5) Si c’est vide, on considère par défaut "moyennement_accessible"
                if (empty($accessLevelKey)) {
                    $accessLevelKey = 'moyennement_accessible';
                }

                // Vérifier qu'on a un label dans le mapping
                if (isset($mapping[$accessLevelKey])) {
                    $labelFr = $mapping[$accessLevelKey];

                    // Incrémenter le total global
                    $accessibilityCount[$labelFr]++;
                    $totalAccessibilities++;

                    // Vérifier si on a déjà un tableau détaillé pour ce service
                    if (!isset($detailedServices[$serviceName])) {
                        $detailedServices[$serviceName] = [
                            'count'         => 0,
                            'accessibility' => [
                                'très accessible'               => 0,
                                'accessible'                    => 0,
                                'moyennement accessible'        => 0,
                                'difficilement accessible'      => 0,
                                'très difficilement accessible' => 0,
                            ],
                            'gender'    => ['Masculin' => 0, 'Féminin' => 0],
                            'locality'  => ['Sénégal' => 0, 'Diaspora' => 0],
                            'age_groups'=> [],
                        ];
                    }

                    // Incrémenter le nombre total d'utilisations de ce service
                    $detailedServices[$serviceName]['count']++;
                    // Incrémenter son niveau d’accessibilité
                    $detailedServices[$serviceName]['accessibility'][$labelFr]++;
                }
            }

            // Gérer maintenant l’âge, le sexe, la localité (globalement ET par service)
            $age     = trim($row->tranche_age);
            $gender  = ucfirst(strtolower(trim($row->sexe)));
            $isDiaspora = !empty($row->pays_diaspora);

            // -- 4.1) Répartition globale par âge
            if ($age) {
                if (!isset($ageGroups[$age])) {
                    $ageGroups[$age] = 0;
                }
                $ageGroups[$age]++;
            }
            // -- 4.2) Répartition globale par sexe
            if ($gender === "Masculin" || $gender === "Féminin") {
                $genderCount[$gender]++;
            }
            // -- 4.3) Répartition globale par localité
            if ($isDiaspora) {
                $localityCount['Diaspora']++;
            } else {
                $localityCount['Sénégal']++;
            }

            // -- 4.4) Répartition par service de l’âge, du sexe et de la localité
            foreach ($servicesArray as $index => $serviceName) {
                // Si pas encore initialisé (cas rare), on le crée
                if (!isset($detailedServices[$serviceName])) {
                    $detailedServices[$serviceName] = [
                        'count'         => 0,
                        'accessibility' => [
                            'très accessible'               => 0,
                            'accessible'                    => 0,
                            'moyennement accessible'        => 0,
                            'difficilement accessible'      => 0,
                            'très difficilement accessible' => 0,
                        ],
                        'gender'    => ['Masculin' => 0, 'Féminin' => 0],
                        'locality'  => ['Sénégal' => 0, 'Diaspora' => 0],
                        'age_groups'=> [],
                    ];
                }

                // Age par service
                if ($age) {
                    if (!isset($detailedServices[$serviceName]['age_groups'][$age])) {
                        $detailedServices[$serviceName]['age_groups'][$age] = 0;
                    }
                    $detailedServices[$serviceName]['age_groups'][$age]++;
                }

                // Genre par service
                if ($gender === "Masculin" || $gender === "Féminin") {
                    $detailedServices[$serviceName]['gender'][$gender]++;
                }

                // Localité par service
                if ($isDiaspora) {
                    $detailedServices[$serviceName]['locality']['Diaspora']++;
                } else {
                    $detailedServices[$serviceName]['locality']['Sénégal']++;
                }
            }
        }

        // 6) Calculer les pourcentages globaux d’accessibilité
        if ($totalAccessibilities > 0) {
            foreach ($accessibilityCount as $key => $value) {
                $accessibilityCount[$key] = round(($value / $totalAccessibilities) * 100, 2);
            }
        }

        // 7) Déterminer la tranche d’âge majoritaire pour chaque service
        foreach ($detailedServices as $serviceName => &$details) {
            if (!empty($details['age_groups'])) {
                $maxAgeCount = max($details['age_groups']);
                $majorAgeGroup = array_search($maxAgeCount, $details['age_groups']);
                $details['major_age_group'] = $majorAgeGroup;
            } else {
                $details['major_age_group'] = 'N/A';
            }
        }

        // 8) Préparer les données pour vos graphiques, si nécessaire
        $servicesLabels       = array_keys($servicesCount);
        $servicesData         = array_values($servicesCount);
        $accessibilityLabels  = array_keys($accessibilityCount);
        $accessibilityData    = array_values($accessibilityCount);
        $ageLabels            = array_keys($ageGroups);
        $ageData              = array_values($ageGroups);
        $genderLabels         = array_keys($genderCount);
        $genderData           = array_values($genderCount);
        $localityLabels       = array_keys($localityCount);
        $localityData         = array_values($localityCount);

        // 9) Retourner la vue
        return view('frontend.admin.acces_publics', compact(
            'servicesLabels', 'servicesData',
            'accessibilityLabels', 'accessibilityData',
            'detailedServices', 'ageLabels', 'ageData',
            'genderLabels', 'genderData',
            'localityLabels', 'localityData'
        ));
    }
}
