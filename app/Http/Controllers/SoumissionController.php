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
use App\Models\Soumission;
use Illuminate\Support\Str;

class SoumissionController extends Controller
{


 /**
     * Enregistrer les réponses pour l'accès aux services publics.
     */
    public function storeAccesPublics(Request $request)
    {
        try {
            // 🔍 Étape 1: Log des données reçues pour debug
            Log::info('📥 Données reçues pour Accès Publics :', $request->all());

            // 🔹 Étape 2: Vérification et conversion JSON
            $servicesFrequentes = $request->input('servicesFrequents', []);
            if (is_string($servicesFrequentes)) {
                $servicesFrequentes = json_decode($servicesFrequentes, true);
            }

            $infoPreferences = $request->input('infoPreferences', []);
            if (is_string($infoPreferences)) {
                $infoPreferences = json_decode($infoPreferences, true);
            }

            // 🔹 Étape 3: Vérifier si l'ID de soumission existe
            $idSoumission = session('id_soumission');

            if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
                Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
                return response()->json([
                    'success' => false,
                    'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
                ], 400);
            }

            // 🔹 Étape 4: Structurer les données avant insertion
            $validatedData = [
                'id_soumission'         => $idSoumission,
                'services_frequentes'    => json_encode($servicesFrequentes),
                'accessibilite'          => $request->input('accessibilite', ''),
                'pourquoi_accessibilite' => $request->input('pourquoi_accessibilite', ''),
                'suggestions_acces'      => $request->input('suggestions_acces', ''),
                'mode_information'       => json_encode($infoPreferences),
                'created_at'             => now(),
                'updated_at'             => now(),
            ];

            // 🔍 Vérification des données avant insertion
            Log::info("✅ Données à enregistrer :", $validatedData);

            // 🔹 Étape 5: Enregistrement dans la base
            $response = AccesServicesPublics::create($validatedData);

            // 🔹 Étape 6: Mise à jour des réponses globales
            $this->updateReponsesGlobales($idSoumission, $validatedData);

            return response()->json([
                'success' => true,
                'id_soumission' => $idSoumission,
                'message' => 'Réponse enregistrée avec succès.',
                'data'    => $response
            ]);

        } catch (\Exception $e) {
            Log::error("🚨 Erreur lors de l'enregistrement Accès Publics : " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’enregistrement.',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    /**
     * Enregistrer les réponses pour accueil et orientation
     */
    public function storeAccueilOrientation(Request $request)
    {
        try {
            // 🔍 Étape 1: Log des données reçues
            Log::info('📥 Données reçues pour Accueil & Orientation :', $request->all());

            // 🔹 Étape 2: Vérification de l'ID de soumission (on récupère depuis la session)
            $idSoumission = session('id_soumission');

            if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
                Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
                return response()->json([
                    'success' => false,
                    'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
                ], 400);
            }

            // 🔹 Étape 3: Vérification et structuration des données
            $validatedData = $request->validate([
                'evaluation_accueil'  => 'required|string|max:50',
                'pourquoi_accueil'    => 'required|string',
                'signaletique_claire' => 'required|in:0,1', // 1 = Oui, 0 = Non
                'bonne_orientation'   => 'required|in:0,1',
                'suggestions_accueil' => 'nullable|string',
            ]);

            // 🔹 Ajout de l'ID de soumission validé
            $validatedData['id_soumission'] = $idSoumission;

            // 🔍 Vérification des données avant insertion
            Log::info("✅ Données à enregistrer :", $validatedData);

            // 🔹 Étape 4: Enregistrement dans la base **sans `updated_at` et `created_at`**
            $response = AccueilOrientation::insert($validatedData);

            // 🔹 Étape 5: Mise à jour des réponses globales
            $this->updateReponsesGlobales($idSoumission, $validatedData);

            return response()->json([
                'success' => true,
                'id_soumission' => $idSoumission,
                'message' => 'Réponse enregistrée avec succès.',
                'data'    => $response
            ]);

        } catch (\Exception $e) {
            Log::error("🚨 Erreur lors de l'enregistrement Accueil & Orientation : " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’enregistrement.',
                'error' => $e->getMessage()
            ], 500);
        }
    }





    /**
     * Enregistrer les réponses pour l'accès aux services publics.
     */
    public function storeInfosGenerales(Request $request)
{
    try {
        // 🔹 Supprimer l'ancienne session pour éviter d'anciens ID persistants
        session()->forget('id_soumission');

        // 🔹 Validation des données
        $validatedData = $request->validate([
            'age' => 'required|string',
            'sexe' => 'required|string|max:10',
            'location' => 'required|string',
            'region' => 'nullable|string',
            'department' => 'nullable|string',
            'country' => 'nullable|string',
        ]);

        // 🔹 Création d'une nouvelle soumission
        $soumission = Soumission::create([
            'tranche_age' => $validatedData['age'],
            'sexe' => $validatedData['sexe'],
            'lieu_residence' => $validatedData['location'],
            'region_id' => !empty($validatedData['region']) ? $validatedData['region'] : null,
            'departement_id' => !empty($validatedData['department']) ? $validatedData['department'] : null,
            'pays_diaspora' => !empty($validatedData['country']) ? $validatedData['country'] : null,
            'date_soumission' => now(),
        ]);

        // 🔹 Stocker `id_soumission` en session pour réutilisation
        session(['id_soumission' => $soumission->id_soumission]);

        Log::info("🆕 Nouvelle soumission enregistrée avec ID : " . $soumission->id_soumission);

        return response()->json([
            'success' => true,
            'id_soumission' => $soumission->id_soumission, // ✅ Retourne cet ID au frontend
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
 * Enregistrer les réponses pour Diligence.
 */

 public function storeDiligence(Request $request)
 {
     try {
         // 🔍 Étape 1: Log des données reçues
         Log::info('📥 Données reçues pour Diligence :', $request->all());

         // 🔹 Étape 2: Vérification de l'ID de soumission (récupéré depuis la session)
         $idSoumission = session('id_soumission');

         if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
             Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
             return response()->json([
                 'success' => false,
                 'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
             ], 400);
         }

         Log::info("📥 ID de soumission récupéré dans storeDiligence : " . $idSoumission);

         // 🔹 Étape 3: Validation des données
         $validatedData = $request->validate([
             'procedures_longues'   => 'required|boolean',
             'pourquoi_longues'     => 'required|string',
             'suggestions_delai'    => 'required|string',
             'formalites_complexes' => 'required|boolean',
             'pourquoi_complexes'   => 'required|string',
             'suggestions_formalites' => 'required|string',
         ]);

         // ✅ Ajouter `id_soumission` manuellement dans les données à insérer
         $validatedData['id_soumission'] = $idSoumission;

         // 🔍 Vérification des données avant insertion
         Log::info("✅ Données finales à enregistrer :", $validatedData);

         // 🔹 Étape 4: Forcer l'insertion pour s'assurer que `id_soumission` est bien pris en compte
         $response = Diligence::insert([
             'id_soumission' => $validatedData['id_soumission'],
             'procedures_longues' => $validatedData['procedures_longues'],
             'pourquoi_longues' => $validatedData['pourquoi_longues'],
             'suggestions_delai' => $validatedData['suggestions_delai'],
             'formalites_complexes' => $validatedData['formalites_complexes'],
             'pourquoi_complexes' => $validatedData['pourquoi_complexes'],
             'suggestions_formalites' => $validatedData['suggestions_formalites'],
             'created_at' => now(),
             'updated_at' => now(),
         ]);

         // 🔹 Étape 5: Mise à jour des réponses globales
         $this->updateReponsesGlobales($idSoumission, $validatedData);

         return response()->json([
             'success' => true,
             'id_soumission' => $idSoumission,
             'message' => 'Réponse enregistrée avec succès.',
             'data'    => $response
         ]);

     } catch (\Exception $e) {
         Log::error("🚨 Erreur lors de l'enregistrement Diligence : " . $e->getMessage());
         return response()->json([
             'success' => false,
             'message' => 'Erreur lors de l’enregistrement.',
             'error' => $e->getMessage()
         ], 500);
     }
 }


    /**
     * store cout service
     */
    public function storeCoutService(Request $request)
{
    try {
        // 🔍 Étape 1: Log des données reçues
        Log::info('📥 Données reçues pour Coût du Service :', $request->all());

        // 🔹 Étape 2: Vérification de l'ID de soumission (on récupère depuis la session)
        $idSoumission = session('id_soumission');

        if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
            Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
            return response()->json([
                'success' => false,
                'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
            ], 400);
        }

        Log::info("📥 ID de soumission récupéré dans storeCoutService : " . $idSoumission);

        // 🔹 Étape 3: Validation des données
        $validatedData = $request->validate([
            'evaluation_cout'     => 'required|string|max:50',
            'cout_justifie'       => 'required|in:0,1',
            'mecanisme_paiement'  => 'required|string|max:50',
            'suggestions_cout'    => 'nullable|string',
        ]);

        // 🔹 Ajout de `id_soumission`
        $validatedData['id_soumission'] = $idSoumission;

        // 🔍 Vérification des données avant insertion
        Log::info("✅ Données finales à enregistrer :", $validatedData);

        // 🔹 Étape 4: Forcer l'insertion avec `id_soumission`
        $response = CoutService::insert([
            'id_soumission'      => $validatedData['id_soumission'],
            'evaluation_cout'    => $validatedData['evaluation_cout'],
            'cout_justifie'      => $validatedData['cout_justifie'],
            'mecanisme_paiement' => $validatedData['mecanisme_paiement'],
            'suggestions_cout'   => $validatedData['suggestions_cout'],
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        // 🔹 Étape 5: Mise à jour des réponses globales
        $this->updateReponsesGlobales($idSoumission, $validatedData);

        return response()->json([
            'success' => true,
            'id_soumission' => $idSoumission,
            'message' => 'Réponse enregistrée avec succès.',
            'data'    => $response
        ]);

    } catch (\Exception $e) {
        Log::error("🚨 Erreur lors de l'enregistrement Coût du Service : " . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de l’enregistrement.',
            'error' => $e->getMessage()
        ], 500);
    }
}

   /**
     *corruption
     */
    public function storeCorruption(Request $request)
{
    try {
        // 🔍 Étape 1: Log des données reçues
        Log::info('📥 Données reçues pour Corruption :', $request->all());

        // 🔹 Étape 2: Récupération de l'ID de soumission
        $idSoumission = session('id_soumission');

        if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
            Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
            return response()->json([
                'success' => false,
                'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
            ], 400);
        }

        // 🔹 Étape 3: Correction : Décoder `typeCorruption` si reçu en JSON
        $typeCorruption = $request->input('typeCorruption', []);

        if (!is_array($typeCorruption)) {
            $typeCorruption = (array) $typeCorruption; // ✅ Force un tableau si une seule valeur est envoyée
        }


        // 🔹 Étape 4: Validation des données
        $validatedData = $request->validate([
            'corruption_existante'  => 'required|in:0,1',
            'niveau_corruption'     => 'nullable|string|max:50',
            'precisions_corruption' => 'nullable|string',
            'suggestions_corruption' => 'nullable|string',
            'typeCorruption'        => 'nullable|array', // S'assure que c'est un tableau
            'typeCorruption.*'      => 'string',
        ]);

        // ✅ Transformation JSON propre pour `typeCorruption`
        $validatedData['types_corruption'] = json_encode($typeCorruption);
        $validatedData['id_soumission'] = $idSoumission;

        // 🔍 Vérification des données avant insertion
        Log::info("✅ Données à enregistrer :", $validatedData);

        // ✅ Correction : Assurer que `id_soumission` est bien inséré
        $response = Corruption::create([
            'id_soumission' => $idSoumission, // ✅ Ajout de l'ID de soumission
            'corruption_existante' => $validatedData['corruption_existante'],
            'niveau_gravite' => $validatedData['niveau_corruption'],
            'types_corruption' => json_encode($validatedData['typeCorruption']), // ✅ Stocker sous format JSON
            'autres_corruption' => $validatedData['precisions_corruption'] ?? null,
            'suggestions_integrite' => $validatedData['suggestions_corruption'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🔹 Étape 5: Mise à jour des réponses globales
        $this->updateReponsesGlobales($idSoumission, $validatedData);

        return response()->json([
            'success' => true,
            'id_soumission' => $idSoumission,
            'message' => 'Réponse enregistrée avec succès.',
            'data'    => $response
        ]);

    } catch (\Exception $e) {
        Log::error("🚨 Erreur lors de l'enregistrement Corruption : " . $e->getMessage());
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

