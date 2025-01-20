<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccesServicesPublics;
use App\Models\AccueilOrientation;
use App\Models\Diligence;
use App\Models\CoutService;
use App\Models\Corruption;
use App\Models\Reclamations;
use App\Models\Digitale;
use App\Models\Participation;
use App\Models\RessourcesHumaines;
use App\Models\ReponsesGlobales;
use Illuminate\Support\Facades\Log;

class SoumissionController extends Controller
{






    /**
     * Enregistrer les réponses pour l'accès aux services publics.
     */
    public function storeInfosGenerales(Request $request)
{
    try {
        // 🔹 Validation des données
        $validatedData = $request->validate([
            'age' => 'required|string',
            'sexe' => 'required|string',
            'location' => 'required|string',
            'region' => 'nullable|string',
            'department' => 'nullable|string',
            'country' => 'nullable|string',
        ]);

        // 🔹 Générer un ID unique pour la soumission
        $idSoumission = uniqid('S_');

        // 🔹 Enregistrement en base
        $soumission = Soumission::create([
            'id_soumission' => $idSoumission,
            'tranche_age' => $validatedData['age'],
            'sexe' => $validatedData['sexe'],
            'lieu_residence' => $validatedData['location'],
            'region_id' => !empty($validatedData['region']) ? $validatedData['region'] : null,
            'departement_id' => !empty($validatedData['department']) ? $validatedData['department'] : null,
            'pays_diaspora' => !empty($validatedData['country']) ? $validatedData['country'] : null,
            'date_soumission' => now(),
        ]);

        return response()->json([
            'success' => true,
            'id_soumission' => $soumission->id_soumission,
            'message' => 'Soumission enregistrée avec succès.'
        ]);

    } catch (\Exception $e) {
        Log::error("❌ Erreur d'enregistrement : " . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de l’enregistrement.',
            'error' => $e->getMessage()
        ], 500);
    }
}




    /**
     * Enregistrer les réponses pour les autres thématiques.
     */
    public function storeAccueilOrientation(Request $request)
    {
        return $this->saveResponse($request, AccueilOrientation::class);
    }

    public function storeDiligence(Request $request)
    {
        return $this->saveResponse($request, Diligence::class);
    }

    public function storeCoutService(Request $request)
    {
        return $this->saveResponse($request, CoutService::class);
    }

    public function storeCorruption(Request $request)
    {
        return $this->saveResponse($request, Corruption::class, ['type_corruption']);
    }

    public function storeReclamations(Request $request)
    {
        return $this->saveResponse($request, Reclamations::class, ['reclamation_service']);
    }

    public function storeDigitale(Request $request)
    {
        return $this->saveResponse($request, Digitale::class, ['services_digitaux_utilises', 'problemes_en_ligne']);
    }

    public function storeParticipation(Request $request)
    {
        return $this->saveResponse($request, Participation::class);
    }

    public function storeRessourcesHumaines(Request $request)
    {
        return $this->saveResponse($request, RessourcesHumaines::class);
    }

    /**
     * Fonction générique pour enregistrer les réponses et mettre à jour la table globale.
     */
    private function saveResponse(Request $request, $model, $jsonFields = [])
    {
        try {
            // Étape 1: Validation des données
            $validatedData = $this->validateRequest($request, $jsonFields);

            // Étape 2: Traitement des champs JSON (checkboxes multiples)
            foreach ((array) $jsonFields as $field) {
                if ($request->has($field)) {
                    $validatedData[$field] = json_encode($request->input($field));
                }
            }

            // Étape 3: Enregistrement dans la table spécifique
            $response = $model::create($validatedData);

            // Étape 4: Mise à jour des réponses globales
            $this->updateReponsesGlobales($validatedData);

            return response()->json([
                'success' => true,
                'message' => '✅ Réponse enregistrée avec succès.',
                'data' => $response
            ]);

        } catch (\Exception $e) {
            Log::error("🚨 Erreur lors de l'enregistrement : " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Erreur lors de l’enregistrement.'], 500);
        }
    }

    /**
     * Valider la requête avant enregistrement.
     */
    private function validateRequest(Request $request, $jsonFields)
    {
        $rules = [];

        foreach ((array) $jsonFields as $field) {
            $rules[$field] = 'nullable|array';
            $rules["{$field}.*"] = 'string';
        }

        return $request->validate($rules);
    }

    /**
     * Met à jour la table `ReponsesGlobales` en fusionnant les nouvelles réponses.
     */
    private function updateReponsesGlobales($newData)
    {
        $idSoumission = $newData['id_soumission'] ?? null;

        if (!$idSoumission) {
            Log::error("❌ Impossible de mettre à jour `reponses_globales` : `id_soumission` est NULL.");
            return;
        }

        // Vérifier s'il existe déjà une entrée pour cette soumission
        $existingResponse = ReponsesGlobales::where('id_soumission', $idSoumission)->first();

        if ($existingResponse) {
            // Fusionner les nouvelles données avec les anciennes
            $existingData = json_decode($existingResponse->contenu_json, true) ?? [];
            $mergedData = array_merge($existingData, $newData);

            // Mise à jour
            $existingResponse->update([
                'contenu_json' => json_encode($mergedData),
                'derniere_mise_a_jour' => now(),
            ]);
        } else {
            // Créer une nouvelle entrée
            ReponsesGlobales::create([
                'id_soumission' => $idSoumission,
                'contenu_json' => json_encode($newData),
                'derniere_mise_a_jour' => now(),
            ]);
        }
    }

}
