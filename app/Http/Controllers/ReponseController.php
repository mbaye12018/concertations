<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Models
use App\Models\Soumissions;            // Table soumissions
use App\Models\ReponsesGlobales;       // Table globale JSON
use App\Models\AccesServicesPublics;   // Table acces_services_publics
use App\Models\AccueilOrientation;     // Table accueil_orientation
use App\Models\Diligence;              // Table diligence
use App\Models\CoutService;            // Table cout_service
use App\Models\Corruption;             // Table corruption
use App\Models\Reclamations;           // Table reclamations
use App\Models\Digitale;               // Table digitale
use App\Models\Participation;          // Table participation
use App\Models\RessourcesHumaines;     // Table ressources_humaines

class SoumissionController extends Controller
{
    /**
     * Étape 1 : Enregistrer les infos générales (âge, sexe, lieu, etc.)
     * On crée une ligne dans la table soumissions et on met à jour reponses_globales
     */
    public function storeInfosGenerales(Request $request)
    {
        DB::beginTransaction();
        try {
            // 1) Créer la ligne dans la table soumissions
            $nouvelle = Soumissions::create([
                'tranche_age'     => $request->input('age'),   // "18_30", etc.
                'sexe'            => $request->input('sexe'),  // "Masculin", "Féminin"
                'lieu_residence'  => $request->input('location'), // "Senegal" / "Diaspora"
                // Si "Senegal", tu peux stocker region_id, departement_id
                // Si "Diaspora", tu stockes pays_diaspora
                'region_id'       => $request->input('region'),
                'departement_id'  => $request->input('department'),
                'pays_diaspora'   => $request->input('country')
            ]);

            // 2) Mettre à jour (ou créer) la ligne dans reponses_globales
            // On associe l'id_soumission
            $global = ReponsesGlobales::firstOrCreate(
                ['id_soumission' => $nouvelle->id_soumission],
                ['contenu_json' => []]
            );

            // On récupère le JSON actuel
            $data = $global->contenu_json;

            // On ajoute la section "informations_generales"
            $data['informations_generales'] = [
                'age'           => $request->input('age'),
                'sexe'          => $request->input('sexe'),
                'lieu_residence'=> $request->input('location'),
                'region'        => $request->input('region'),
                'departement'   => $request->input('department'),
                'pays_diaspora' => $request->input('country'),
            ];

            // On enregistre
            $global->update(['contenu_json' => $data]);

            DB::commit();

            // Retourne l'id_soumission pour le front (si besoin)
            return response()->json([
                'message' => 'Infos générales enregistrées',
                'id_soumission' => $nouvelle->id_soumission
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Thématique : Accès aux services publics
     */
    public function storeAccesPublics(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission'); // Reçu depuis un champ hidden ou autre

            // Convertir les checkbox en CSV
            $servicesFrequents = $request->input('servicesFrequents', []);
            $servicesCSV = implode(',', $servicesFrequents);

            $acces = AccesServicesPublics::create([
                'id_soumission'          => $idSoum,
                'services_frequentes'    => $servicesCSV,
                'accessibilite'          => $request->input('accessibilite'),
                'pourquoi_accessibilite' => $request->input('pourquoi'),
                'suggestions_acces'      => $request->input('suggestions'),
                // etc. pour mode_information, etc.
            ]);

            // Mettre à jour la table reponses_globales
            $global = ReponsesGlobales::firstOrCreate(
                ['id_soumission' => $idSoum],
                ['contenu_json' => []]
            );
            $data = $global->contenu_json;
            $data['accesPublics'] = [
                'services_frequentes'    => $servicesCSV,
                'accessibilite'          => $request->input('accessibilite'),
                'pourquoi_accessibilite' => $request->input('pourquoi'),
                'suggestions_acces'      => $request->input('suggestions'),
            ];
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Accès aux services publics enregistré']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Thématique : Accueil & orientation
     */
    public function storeAccueilOrientation(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $accueil = AccueilOrientation::create([
                'id_soumission'       => $idSoum,
                'evaluation_accueil'  => $request->input('evaluation_accueil'),
                'pourquoi_accueil'    => $request->input('pourquoi'),
                'signaletique_claire' => $request->input('signaletique') === 'sign_o' ? 1 : 0,
                'bonne_orientation'   => $request->input('guide_service') === 'guide_o' ? 1 : 0,
                'suggestions_accueil' => $request->input('suggestions'),
            ]);

            // MAJ table globale
            $global = ReponsesGlobales::firstOrCreate(
                ['id_soumission' => $idSoum],
                ['contenu_json' => []]
            );
            $data = $global->contenu_json;
            $data['accueilOrientation'] = [
                'evaluation_accueil'  => $request->input('evaluation_accueil'),
                'pourquoi'            => $request->input('pourquoi'),
                'signaletique_claire' => $request->input('signaletique'),
                'bonne_orientation'   => $request->input('guide_service'),
                'suggestions'         => $request->input('suggestions'),
            ];
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Accueil & orientation enregistré']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===========================
    //  Diligence
    // ===========================
    public function storeDiligence(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $dilig = Diligence::create([
                'id_soumission'          => $idSoum,
                'procedures_longues'     => ($request->input('procedures_longues') === 'proc_oui') ? 1 : 0,
                'pourquoi_longues'       => $request->input('pourquoi'),
                'suggestions_delai'      => $request->input('suggestions'),
                'formalites_complexes'   => ($request->input('formComplexes') === 'formYes') ? 1 : 0,
                'pourquoi_complexes'     => $request->input('pourquoi'),
                'suggestions_formalites' => $request->input('suggestions'),
            ]);

            $global = ReponsesGlobales::firstOrCreate(
                ['id_soumission' => $idSoum],
                ['contenu_json' => []]
            );
            $data = $global->contenu_json;
            $data['diligence'] = [
                'procedures_longues'     => $dilig->procedures_longues,
                'pourquoi_longues'       => $dilig->pourquoi_longues,
                'suggestions_delai'      => $dilig->suggestions_delai,
                'formalites_complexes'   => $dilig->formalites_complexes,
                'pourquoi_complexes'     => $dilig->pourquoi_complexes,
                'suggestions_formalites' => $dilig->suggestions_formalites,
            ];
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Diligence enregistré']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===========================
    //  Coût du service
    // ===========================
    public function storeCoutService(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $cout = CoutService::create([
                'id_soumission'      => $idSoum,
                'evaluation_cout'    => $request->input('evaluation_cout'),
                'cout_justifie'      => ($request->input('cout_justifie') === 'cout_oui') ? 1 : 0,
                'mecanisme_paiement' => $request->input('mecaPaiement'),
                'suggestions_cout'   => $request->input('suggestions'),
            ]);

            $global = ReponsesGlobales::firstOrCreate(['id_soumission' => $idSoum], ['contenu_json' => []]);
            $data = $global->contenu_json;
            $data['coutService'] = [
                'evaluation_cout'    => $cout->evaluation_cout,
                'cout_justifie'      => $cout->cout_justifie,
                'mecanisme_paiement' => $cout->mecanisme_paiement,
                'suggestions_cout'   => $cout->suggestions_cout,
            ];
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Coût du service enregistré']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===========================
    //  Corruption
    // ===========================
    public function storeCorruption(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $corrupt = Corruption::create([
                'id_soumission'        => $idSoum,
                'corruption_existante' => ($request->input('corruption_reelle') === 'corr_oui') ? 1 : 0,
                'niveau_gravite'       => $request->input('gravite'),
                // 'types_corruption' => ... CSV si multiple
                'suggestions_integrite'=> $request->input('suggestions'),
            ]);

            // MAJ globale
            $global = ReponsesGlobales::firstOrCreate(['id_soumission' => $idSoum], ['contenu_json' => []]);
            $data = $global->contenu_json;
            $data['corruption'] = [
                'corruption_existante' => $corrupt->corruption_existante,
                'niveau_gravite'       => $corrupt->niveau_gravite,
                'suggestions_integrite'=> $corrupt->suggestions_integrite
            ];
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Corruption enregistrée']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===========================
    //  Réclamations
    // ===========================
    public function storeReclamations(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $rec = Reclamations::create([
                'id_soumission'        => $idSoum,
                'deja_deposee'         => ($request->input('reclamation_deposee') === 'rec_oui') ? 1 : 0,
                // etc...
            ]);

            $global = ReponsesGlobales::firstOrCreate(['id_soumission' => $idSoum], ['contenu_json' => []]);
            $data = $global->contenu_json;
            $data['reclamations'] = $request->all(); // Ou un mapping
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Réclamations enregistré']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===========================
    //  Digitale
    // ===========================
    public function storeDigitale(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $dig = Digitale::create([
                'id_soumission'              => $idSoum,
                'utilise_services_digitaux'  => ($request->input('services_digitaux') === 'serdig_oui') ? 1 : 0,
                // etc
            ]);

            $global = ReponsesGlobales::firstOrCreate(['id_soumission' => $idSoum], ['contenu_json' => []]);
            $data = $global->contenu_json;
            $data['digitale'] = $request->all();
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Transformation digitale enregistrée']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===========================
    //  Participation citoyenne
    // ===========================
    public function storeParticipation(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $part = Participation::create([
                'id_soumission'              => $idSoum,
                'information_reformes'       => ($request->input('inform_reformes') === 'infref_oui') ? 1 : 0,
                // etc...
            ]);

            $global = ReponsesGlobales::firstOrCreate(['id_soumission' => $idSoum], ['contenu_json' => []]);
            $data = $global->contenu_json;
            $data['participation'] = $request->all();
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Participation enregistrée']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // ===========================
    //  Ressources humaines
    // ===========================
    public function storeRessourcesHumaines(Request $request)
    {
        DB::beginTransaction();
        try {
            $idSoum = $request->input('id_soumission');

            $rh = RessourcesHumaines::create([
                'id_soumission'   => $idSoum,
                'avis_relations'  => $request->input('avis_relations'),
                'pourquoi_relations' => $request->input('pourquoi')
            ]);

            $global = ReponsesGlobales::firstOrCreate(['id_soumission' => $idSoum], ['contenu_json' => []]);
            $data = $global->contenu_json;
            $data['ressourcesHumaines'] = [
                'avis_relations'  => $rh->avis_relations,
                'pourquoi'        => $rh->pourquoi_relations
            ];
            $global->update(['contenu_json' => $data]);

            DB::commit();
            return response()->json(['message' => 'Ressources humaines enregistré']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
