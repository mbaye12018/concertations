<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RessourcesHumaines;

class RessourcesHumainesController extends Controller
{
    public function index()
    {
        // 1️⃣ Récupérer les données en joignant la table 'soumissions'
        $rhData = RessourcesHumaines::join('soumissions', 'ressources_humaines.id_soumission', '=', 'soumissions.id_soumission')
            ->select(
                'ressources_humaines.id_soumission',
                'avis_relations',
                'info_claire',
                'esprit_collaboratif',
                'competence_agents',
                'tranche_age',
                'sexe',
                'pays_diaspora'
            )
            ->get();

        // Récupérer les champs "pourquoi_relations" pour le carrousel
        $pourquoiRelations = RessourcesHumaines::whereNotNull('pourquoi_relations')
            ->pluck('pourquoi_relations')
            ->toArray();

        // 2️⃣ Initialisation des compteurs
        $avisRelationsCount = [];
        $infoClaireCount = ['Oui' => 0, 'Non' => 0];
        $espritCollaboratifCount = ['Oui' => 0, 'Non' => 0];
        $competenceAgentsCount = ['Oui' => 0, 'Non' => 0];

        $ageGroups = [];
        $genderCount = ['Masculin' => 0, 'Féminin' => 0];
        $localityCount = ['Sénégal' => 0, 'Diaspora' => 0];

        // 3️⃣ Parcourir les données
        foreach ($rhData as $row) {
            // A) Avis Relations (ex. "positif", "négatif", etc. si c’est textuel)
            //    Sinon, vous pouvez normaliser ou prévoir un certain mapping
            $avis = trim($row->avis_relations);
            if (!empty($avis)) {
                $avisRelationsCount[$avis] = ($avisRelationsCount[$avis] ?? 0) + 1;
            }

            // B) Information Claire
            $infoClaireCount[$row->info_claire ? 'Oui' : 'Non']++;

            // C) Esprit Collaboratif
            $espritCollaboratifCount[$row->esprit_collaboratif ? 'Oui' : 'Non']++;

            // D) Compétence des Agents
            $competenceAgentsCount[$row->competence_agents ? 'Oui' : 'Non']++;

            // E) Tranche d’âge
            $age = trim($row->tranche_age);
            $ageGroups[$age] = ($ageGroups[$age] ?? 0) + 1;

            // F) Sexe
            $gender = ucfirst(strtolower(trim($row->sexe)));
            if (isset($genderCount[$gender])) {
                $genderCount[$gender]++;
            }

            // G) Localité
            $locality = !empty($row->pays_diaspora) ? 'Diaspora' : 'Sénégal';
            $localityCount[$locality]++;
        }

        // 4️⃣ Préparer les données pour Chart.js
        $avisRelationsLabels = array_keys($avisRelationsCount);
        $avisRelationsData = array_values($avisRelationsCount);

        $infoClaireLabels = ['Oui','Non'];
        $infoClaireData = [
            $infoClaireCount['Oui'],
            $infoClaireCount['Non']
        ];

        $espritCollaboratifLabels = ['Oui','Non'];
        $espritCollaboratifData = [
            $espritCollaboratifCount['Oui'],
            $espritCollaboratifCount['Non']
        ];

        $competenceAgentsLabels = ['Oui','Non'];
        $competenceAgentsData = [
            $competenceAgentsCount['Oui'],
            $competenceAgentsCount['Non']
        ];

        $ageLabels = array_keys($ageGroups);
        $ageData = array_values($ageGroups);

        $genderLabels = array_keys($genderCount);
        $genderData = array_values($genderCount);

        $localityLabels = array_keys($localityCount);
        $localityData = array_values($localityCount);

        // 5️⃣ Retourner la vue avec les données
        return view('frontend.admin.ressources_humaines', compact(
            'pourquoiRelations',

            'avisRelationsLabels','avisRelationsData',
            'infoClaireLabels','infoClaireData',
            'espritCollaboratifLabels','espritCollaboratifData',
            'competenceAgentsLabels','competenceAgentsData',
            'ageLabels','ageData',
            'genderLabels','genderData',
            'localityLabels','localityData'
        ));
    }
}
