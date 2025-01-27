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
use App\Models\Reclamation;
use Illuminate\Support\Facades\Validator;

class SoumissionsController extends Controller
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
        if (!is_array($servicesFrequentes)) {
            $servicesFrequentes = json_decode($servicesFrequentes, true);  // Si c'est une chaîne JSON
        }

        $infoPreferences = $request->input('infoPreferences', []);
        if (!is_array($infoPreferences)) {
            $infoPreferences = json_decode($infoPreferences, true);  // Si c'est une chaîne JSON
        }

        // 🔹 Étape 3: Conversion de 'accessibilite' en JSON et gestion des valeurs nulles
        $accessibilite = $request->input('accessibilite', []);
        $accessibilite = array_filter($accessibilite, function($value) {
            return $value !== null; // Filtrer les valeurs nulles avant d'encoder
        });
        $accessibiliteJson = json_encode($accessibilite); // Encoder l'accessibilité en JSON

        // 🔹 Étape 4: Vérification si l'ID de soumission existe
        $idSoumission = session('id_soumission');
        if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
            Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
            return response()->json([
                'success' => false,
                'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
            ], 400);
        }

        // 🔹 Étape 5: Structurer les données avant insertion
        $validatedData = [
            'id_soumission'         => $idSoumission,
            'services_frequentes'    => json_encode($servicesFrequentes), // Encodé en JSON
            'accessibilite'          => $accessibiliteJson, // Encodé en JSON
            'pourquoi_accessibilite' => $request->input('pourquoi_accessibilite', ''),
            'suggestions_acces'      => $request->input('suggestions_acces', ''),
            'mode_information'       => json_encode($infoPreferences), // Encodé en JSON
            'created_at'             => now(),
            'updated_at'             => now(),
        ];

        // 🔍 Vérification des données avant insertion
        Log::info("✅ Données à enregistrer :", $validatedData);

        // 🔹 Étape 6: Enregistrement dans la base
        $response = AccesServicesPublics::create($validatedData);

        // 🔹 Étape 7: Mise à jour des réponses globales
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
        Log::info("📌 ID de soumission actuellement stocké en session : " . session('id_soumission'));
        Log::info("✅ Données finales avant insertion :", ['id_soumission' => $idSoumission, 'data' => $validatedData]);



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
             'suggestions_delai'    => 'nullable|string',
             'formalites_complexes' => 'required|boolean',
             'pourquoi_complexes'   => 'required|string',
             'suggestions_formalites' => 'nullable|string',
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
/**
 * Enregistrer les réponses pour Corruption.
 */


 /**
 * Enregistrer les réponses pour Corruption.
 */
public function storeCorruption(Request $request)
{
    try {
        // 🔍 Étape 1: Log des données reçues
        Log::info('📥 Données reçues pour Corruption :', $request->all());

        // 🔹 Étape 2: Récupération de l'ID de soumission (depuis la session)
        $idSoumission = session('id_soumission');

        if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
            Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
            return response()->json([
                'success' => false,
                'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
            ], 400);
        }

        Log::info("📥 ID de soumission récupéré dans storeCorruption : " . $idSoumission);

        // 🔹 Étape 3: Correction : Décoder `typeCorruption` si reçu en JSON
        $typeCorruption = $request->input('typeCorruption', []);
        if (!is_array($typeCorruption)) {
            $typeCorruption = json_decode($typeCorruption, true) ?? [];
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

        // ✅ Transformation JSON propre pour `types_corruption`
        $validatedData['types_corruption'] = json_encode($typeCorruption);
        $validatedData['id_soumission'] = $idSoumission;

        // 🔍 Vérification des données avant insertion
        Log::info("✅ Données finales à enregistrer :", $validatedData);

        // ✅ Correction : Assurer que `id_soumission` est bien inséré
        $response = Corruption::insert([
            'id_soumission' => $validatedData['id_soumission'], // ✅ Ajout de l'ID de soumission
            'corruption_existante' => $validatedData['corruption_existante'],
            'niveau_gravite' => $validatedData['niveau_corruption'],
            'types_corruption' => $validatedData['types_corruption'], // ✅ Stocké sous format JSON
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
     * reclamation
     */

     public function storeReclamations(Request $request)
     {
         try {
             // 🔍 Étape 1: Log des données reçues
             Log::info('📥 Données reçues pour Réclamations :', $request->all());

             // 🔹 Étape 2: Vérification de l'ID de soumission
             $idSoumission = session('id_soumission');

             if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
                 Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
                 return response()->json([
                     'success' => false,
                     'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
                 ], 400);
             }

             Log::info("📥 ID de soumission récupéré dans storeReclamations : " . $idSoumission);

             // 🔹 Étape 3: Validation des données
             $validatedData = $request->validate([
                 'deja_deposee'       => 'required|in:0,1',
                 'mode_reclamation'   => 'nullable|string|max:50',
                 'processus_clair'    => 'nullable|string|max:50',
                 'delai_traitement'   => 'nullable|string|max:50',
                 'commentaires_reclamation' => 'nullable|string',
                 'service_concerne'   => 'nullable|array', // ✅ Assurer que c'est un tableau
                 'service_concerne.*' => 'string',
             ]);

             // ✅ Transformation JSON propre pour `service_concerne`
             $validatedData['service_concerne'] = json_encode($request->input('service_concerne', []));
             $validatedData['id_soumission'] = $idSoumission;

             // 🔍 Vérification des données avant insertion
             Log::info("✅ Données finales à enregistrer :", $validatedData);

             // ✅ Correction : Utilisation de `Reclamations`
             $response = Reclamations::create([
                 'id_soumission' => $idSoumission,
                 'deja_deposee' => $validatedData['deja_deposee'],
                 'service_concerne' => $validatedData['service_concerne'],
                 'mode_reclamation' => $validatedData['mode_reclamation'],
                 'processus_clair' => $validatedData['processus_clair'],
                 'delai_traitement' => $validatedData['delai_traitement'],
                 'commentaires_reclamation' => $validatedData['commentaires_reclamation'],
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
             Log::error("🚨 Erreur lors de l'enregistrement Réclamations : " . $e->getMessage());
             return response()->json([
                 'success' => false,
                 'message' => 'Erreur lors de l’enregistrement.',
                 'error' => $e->getMessage()
             ], 500);
         }
     }


       /**
     * digital
     */
    public function storeDigitale(Request $request)
    {
        try {
            // 🔍 Étape 1: Log des données reçues
            Log::info('📥 Données reçues pour Digitale :', $request->all());

            // 🔹 Étape 2: Récupération de l'ID de soumission depuis la session
            $idSoumission = session('id_soumission');
            Log::info("🔍 ID de soumission récupéré depuis la session : " . ($idSoumission ?? 'NULL'));

            // Vérification de l'ID de soumission
            if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
                Log::error("❌ ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
                return response()->json([
                    'success' => false,
                    'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
                ], 400);
            }

            Log::info("📥 ID de soumission validé : " . $idSoumission);

            // 🔹 Étape 3: Ajouter l'ID de soumission aux données reçues
            $data = $request->all();
            $data['id_soumission'] = $idSoumission;
            $data['autres_services_digitaux'] = $request->input('autres_services_digitaux', '');
            Log::info("🔍 Données après ajout de 'id_soumission' et 'autres_services_digitaux' : ", $data);

            // 🔹 Étape 4: Validation des données
            Log::info("🔍 Début de la validation des données.");
            $validatedData = Validator::make($data, [
                'id_soumission' => 'required|exists:soumissions,id_soumission',
                'utilise_services_digitaux' => 'required|boolean',
                'services_digitaux_utilises' => 'nullable|array',
                'autres_services_digitaux' => 'nullable|string|max:255',
                'evaluation_accessibilite' => 'required|string|max:50',
                'rencontree_problemes' => 'required|boolean',
                'types_problemes' => 'nullable|array',
                'autres_problemes' => 'nullable|string|max:255',
                'suggestions_digitale' => 'required|string',
            ])->validate();

            Log::info("✅ Données validées avec succès :", $validatedData);

            // 🔹 Étape 5: Préparation des données pour insertion
            $dataToInsert = [
                'id_soumission' => $validatedData['id_soumission'],
                'utilise_services_digitaux' => $validatedData['utilise_services_digitaux'],
                'services_digitaux_frequents' => json_encode($validatedData['services_digitaux_utilises'] ?? []),
                'autres_services_digitaux' => $validatedData['autres_services_digitaux'],
                'evaluation_accessibilite' => $validatedData['evaluation_accessibilite'],
                'rencontree_problemes' => $validatedData['rencontree_problemes'],
                'types_problemes' => json_encode($validatedData['types_problemes'] ?? []),
                'autres_problemes' => $validatedData['autres_problemes'] ?? '',
                'suggestions_digitale' => $validatedData['suggestions_digitale'],
                'created_at' => now(),
                'updated_at' => now(),


            ];

            Log::info("🔍 Données prêtes pour insertion :", $dataToInsert);

            // 🔹 Étape 6: Insertion dans la base de données
            $response = Digitale::create($dataToInsert);
            Log::info("✅ Données insérées avec succès dans la table Digitale. ID de soumission : " . $idSoumission);

            // 🔹 Étape 7: Mise à jour des réponses globales
            $this->updateReponsesGlobales($idSoumission, $validatedData);
            Log::info("✅ Réponses globales mises à jour avec succès pour l'ID de soumission : " . $idSoumission);

            // Retour du succès
            return response()->json([
                'success' => true,
                'id_soumission' => $idSoumission,
                'message' => 'Réponse enregistrée avec succès.',
                'data' => $response
            ]);

        } catch (\Exception $e) {
            // 🔴 Gestion des exceptions
            Log::error("🚨 Exception lors de l'enregistrement Digitale : " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l’enregistrement.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




  /**
     * Enregistrer les réponses pour rh
     */



public function storeRessourcesHumaines(Request $request)
    {
            try {
                // :loupe_gauche: Étape 1: Log des données reçues
                Log::info(':inbox: Données reçues pour Ressource humain :', $request->all());
                // :petit_diamant_bleu: Étape 2: Vérification de l'ID de soumission (récupéré depuis la session)
                $idSoumission = session('id_soumission');
                if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
                    Log::error(":x: ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
                    return response()->json([
                        'success' => false,
                        'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
                    ], 400);
                }
                Log::info(":inbox: ID de soumission récupéré dans storeRessourcehumain : " . $idSoumission);
                // :petit_diamant_bleu: Étape 3: Validation des données
                $validatedData = $request->validate([
                     /*bon*/    'avis_relations'     => 'required|string',
                      /*bon*/ 'pourquoi_relations' => 'required|string',
                                'info_claire'=>   'required|in:0,1',
                                'pourquoi_info_claire' => 'required|string',
                                'esprit_collaboratif' =>   'required|in:0,1',
                                'pourquoi_esprit_collaboratif' => 'required|string',
                                'competence_agents' =>   'required|in:0,1',
                                'pourquoi_competence_agents'  => 'required|string'
                ]);
                // :coche_blanche: Ajouter `id_soumission` manuellement dans les données à insérer
                $validatedData['id_soumission'] = $idSoumission;
                // :loupe_gauche: Vérification des données avant insertion
                Log::info(":coche_blanche: Données finales à enregistrer :", $validatedData);
                // :petit_diamant_bleu: Étape 4: Forcer l'insertion pour s'assurer que `id_soumission` est bien pris en compte
                $response = RessourcesHumaines::insert([
                    'id_soumission' => $validatedData['id_soumission'],
                     'avis_relations' => $validatedData['avis_relations'],
                      'pourquoi_relations' => $validatedData['pourquoi_relations'],
                      'info_claire' => $validatedData['info_claire'],
                      'pourquoi_info_claire' => $validatedData['pourquoi_info_claire'],
                       'esprit_collaboratif' => $validatedData['esprit_collaboratif'],
                       'pourquoi_esprit_collaboratif' => $validatedData['pourquoi_esprit_collaboratif'],
                       'competence_agents' => $validatedData['competence_agents'],
                       'pourquoi_competence_agents' => $validatedData['pourquoi_competence_agents'],
                ]);
                // :petit_diamant_bleu: Étape 5: Mise à jour des réponses globales
                $this->updateReponsesGlobales($idSoumission, $validatedData);
                return response()->json([
                    'success' => true,
                    'id_soumission' => $idSoumission,
                    'message' => 'Réponse enregistrée avec succès.',
                    'data'    => $response
                ]);
            } catch (\Exception $e) {
                Log::error(":gyrophare: Erreur lors de l'enregistrement Ressource humain : " . $e->getMessage());
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







   public function storeParticipation(Request $request)
    {
         try {
                // :loupe_gauche: Étape 1: Log des données reçues
                Log::info(':inbox: Données reçues pour Participation :', $request->all());
                // :petit_diamant_bleu: Étape 2: Récupération de l'ID de soumission
                $idSoumission = session('id_soumission');
                if (!$idSoumission || !Soumission::where('id_soumission', $idSoumission)->exists()) {
                    Log::error(":x: ID de soumission invalide ou inexistant : " . ($idSoumission ?? 'NULL'));
                    return response()->json([
                        'success' => false,
                        'message' => 'ID de soumission invalide. Veuillez recommencer la soumission générale.'
                    ], 400);
                }
                // :petit_diamant_bleu: Étape 4: Validation des données
                $validatedData = $request->validate([
                    'information_reformes' => 'required|boolean', // Obligatoire, doit être 0 ou 1
                    'satisfaction_participation' => 'nullable|string|max:50', // Max 50 caractères
                    'facilite_numerique' => 'required|boolean', // Obligatoire, doit être 0 ou 1
                    'impact_reel' => 'required|boolean', // Obligatoire, doit être 0 ou 1
                    'suggestions_inclusion' => 'nullable|string', // Facultatif, pas de limite stricte
                ]);
                   // :coche_blanche: Transformation JSON propre pour `typeCorruption`
               // $validatedData['types_corruption'] = json_encode($typeCorruption);
                $validatedData['id_soumission'] = $idSoumission;
                // :loupe_gauche: Vérification des données avant insertion
                Log::info(":coche_blanche: Données à enregistrer :", $validatedData);
                // :coche_blanche: Correction : Assurer que `id_soumission` est bien inséré
                $response = Participation::create([
                    'id_soumission' => $idSoumission, // :coche_blanche: Ajout de l'ID de soumission
                   'information_reformes' => $validatedData['information_reformes'] ?? 0, // Assurez une valeur par défaut
                  'satisfaction_participation' => $validatedData['satisfaction_participation'],
                    'facilite_numerique' => $validatedData['facilite_numerique'],
                     'impact_reel' => $validatedData['impact_reel'],
                     'suggestions_inclusion' => $validatedData['suggestions_inclusion'],
                    // 'date_insertion' => now(),
                    'updated_at' => now(),
                    'created_at' => now(),
                ]);
                // :petit_diamant_bleu: Étape 5: Mise à jour des réponses globales
                $this->updateReponsesGlobales($idSoumission, $validatedData);
                return response()->json([
                    'success' => true,
                    'id_soumission' => $idSoumission,
                    'message' => 'Réponse enregistrée avec succès.',
                    'data'    => $response
                ]);
            } catch (\Exception $e) {
                Log::error(":gyrophare: Erreur lors de l'enregistrement de la participation: " . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors de l’enregistrement.',
                    'error' => $e->getMessage()
                ], 500);
            }
        //return $this->saveResponse($request, Participation::class);
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

