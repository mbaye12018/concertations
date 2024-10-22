<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnqueteGenerale;
use App\Models\Secteur;
use App\Models\Region;
use App\Models\Departement;
use App\Models\EnqueteRapporteur;
use Illuminate\Support\Facades\DB; 


class AdminController extends Controller
{
    public function index()
    {
        // Fetch location data
        $les_donnees = EnqueteGenerale::select('location', \DB::raw('count(*) as total'))
            ->whereIn('location', ['Senegal', 'Diaspora']) 
            ->groupBy('location')
            ->get();
    
        $labels = $les_donnees->pluck('location');
        $data = $les_donnees->pluck('total');

        // Fetch data
        $secteurs = Secteur::select('nom_secteur')->get();
        $regions = Region::select('nom')->get();
        $departements = Departement::select('nom')->get();


        $regionCounts = EnqueteRapporteur::select('region_id', DB::raw('count(*) as total'))
        ->groupBy('region_id',)
        ->get();

        $departementCounts = EnqueteRapporteur::select('departement_id', DB::raw('count(*) as total_departement'))
        ->groupBy('departement_id')
        ->get();



        // $departementCounts = EnqueteRapporteur::select('departement_id', DB::raw('count(*) as total_departement')) 
        //  ->WHERE('region_id',1)
        // ->groupBy('departement_id')
        // ->get();
    
        // Pass all data to the view
        return view('frontend.admin.dashboard', [
            'labels' => $labels,
            'data' => $data,
            'secteurs' => $secteurs,
            'regions' => $regions,
            'departements' => $departements,
            'regionCounts' => $regionCounts,
            'departementCounts' => $departementCounts
            // 'departementbyregion' => $departementByDepartement
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