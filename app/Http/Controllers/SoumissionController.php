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

class SoumissionController extends Controller
{
    /**
     * Enregistrer les réponses pour l'accès aux services publics.
     */
    public function storeAccesPublics(Request $request)
    {
        $data = $request->all();

        // Insérer dans la table spécifique
        AccesServicesPublics::create($data);

        // Mettre à jour la table globale
        ReponsesGlobales::updateOrCreate(
            ['id' => 1], // Unique pour ce projet, car c'est une mise à jour continue
            ['data' => json_encode($data)]
        );

        return response()->json(['success' => true, 'message' => 'Réponse enregistrée !']);
    }

    /**
     * Enregistrer les réponses pour l'accueil et l'orientation.
     */
    public function storeAccueilOrientation(Request $request)
    {
        $data = $request->all();
        AccueilOrientation::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }

    /**
     * Enregistrer les réponses pour la diligence.
     */
    public function storeDiligence(Request $request)
    {
        $data = $request->all();
        Diligence::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }

    /**
     * Enregistrer les réponses pour le coût du service.
     */
    public function storeCoutService(Request $request)
    {
        $data = $request->all();
        CoutService::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }

    /**
     * Enregistrer les réponses pour la corruption.
     */
    public function storeCorruption(Request $request)
    {
        $data = $request->all();
        Corruption::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }

    /**
     * Enregistrer les réponses pour les réclamations.
     */
    public function storeReclamations(Request $request)
    {
        $data = $request->all();
        Reclamations::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }

    /**
     * Enregistrer les réponses pour la transformation digitale.
     */
    public function storeDigitale(Request $request)
    {
        $data = $request->all();
        Digitale::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }

    /**
     * Enregistrer les réponses pour la participation citoyenne.
     */
    public function storeParticipation(Request $request)
    {
        $data = $request->all();
        Participation::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }

    /**
     * Enregistrer les réponses pour les ressources humaines.
     */
    public function storeRessourcesHumaines(Request $request)
    {
        $data = $request->all();
        RessourcesHumaines::create($data);

        ReponsesGlobales::updateOrCreate(['id' => 1], ['data' => json_encode($data)]);

        return response()->json(['success' => true]);
    }
}
