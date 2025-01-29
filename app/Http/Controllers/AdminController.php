<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnqueteGenerale;
use App\Models\Secteur;
use App\Models\Region;
use App\Models\Departement;
use App\Models\EnqueteRapporteur;
use Illuminate\Support\Facades\DB;
use App\Models\Soumission;
use App\Models\AccesServicesPublics;
use App\Models\AccueilOrientation;
use App\Models\Corruption;
use App\Models\CoutService;
use App\Models\Digitale;
use App\Models\Diligence;
use App\Models\Participation;
use App\Models\Reclamations;
use App\Models\RessourcesHumaines;
class AdminController extends Controller
{

    public function index()
    {
        // Fetch location data (Sénégal et Diaspora) et calculer leur total
        $les_donnees = Soumission::select('lieu_residence', \DB::raw('count(*) as total'))
            ->whereIn('lieu_residence', ['Senegal', 'Diaspora'])
            ->groupBy('lieu_residence')
            ->get();

            $accesPublicsTotal = AccesServicesPublics::count(); // Compte des soumissions
            $accueilOrientationTotal = AccueilOrientation::count(); // Compte des soumissions
            $corruptionTotal = Corruption::count(); // Compte des soumissions
            $coutServiceTotal = CoutService::count(); // Compte des soumissions
            $DigitaleTotal = Digitale::count(); // Compte des soumissions
            $DiligenceTotal = Diligence::count(); // Compte des soumissions
            $ParticipationTotal = Participation::count(); // Compte des soumissions
            $ReclamationsTotal = Reclamations::count(); // Compte des soumissions
            $RessourcesHumainesTotal = RessourcesHumaines::count(); // Compte des soumissions

        // Get the totals for Senegal and Diaspora
        $senegalTotal = $les_donnees->firstWhere('lieu_residence', 'Senegal')->total ?? 0;
        $diasporaTotal = $les_donnees->firstWhere('lieu_residence', 'Diaspora')->total ?? 0;

        // Calculate total sum
        $total = $senegalTotal + $diasporaTotal;

        // Fetch other data (secteurs, regions, départements)
        $secteurs = Secteur::select('nom_secteur')->get();
        $regions = Region::select('nom')->get();
        $departements = Departement::select('nom')->get();

        // Fetch counts of regions and départements from EnqueteRapporteur
        $regionCounts = EnqueteRapporteur::select('region_id', \DB::raw('count(*) as total'))
            ->groupBy('region_id')
            ->get();

        $departementCounts = EnqueteRapporteur::select('departement_id', \DB::raw('count(*) as total_departement'))
            ->groupBy('departement_id')
            ->get();

        // Pass all data to the view
        return view('frontend.admin.dashboard', [
            'senegalTotal' => $senegalTotal,
            'diasporaTotal' => $diasporaTotal,
            'total' => $total,
            'secteurs' => $secteurs,
            'regions' => $regions,
            'departements' => $departements,
            'regionCounts' => $regionCounts,
            'departementCounts' => $departementCounts,
            'accesPublicsTotal'=> $accesPublicsTotal,
            'accueilOrientationTotal' => $accueilOrientationTotal ,
           'corruptionTotal' =>  $corruptionTotal ,
            'coutServiceTotal'=>  $coutServiceTotal ,
            'DigitaleTotal'=>  $DigitaleTotal ,
           'DiligenceTotal' =>   $DiligenceTotal ,
            'ParticipationTotal'=>   $ParticipationTotal ,
           'ReclamationsTotal' =>   $ReclamationsTotal ,
           'RessourcesHumainesTotal' =>  $RessourcesHumainesTotal


        ]);
    }




    public function getDepartementsStats($region_id) {
        $departementCounts = EnqueteRapporteur::select('departement_id', DB::raw('count(*) as total_departement'))
            ->where('region_id', $region_id)
            ->groupBy('departement_id')
            ->get();

        // Fetch department names
        $departements = Departement::whereIn('id', $departementCounts->pluck('departement_id'))->get()->keyBy('id');

        // Prepare data for response
        $data = $departementCounts->map(function($item) use ($departements) {
            return [
                'nom' => $departements[$item->departement_id]->nom ?? 'Inconnu',
                'total_departement' => $item->total_departement,
            ];
        });

        return response()->json($data);
    }



    public function showForm() {
        $regions = Region::all();
        $departements = Departement::all();
        $secteurs = Secteur::all();

        return view('frontend.admin.dashboard', compact('regions', 'departements', 'secteurs'));
    }






}

