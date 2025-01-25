<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamations;

class ReclamationsController extends Controller
{
    public function index()
    {
        // Retrieve the relevant data
        $reclamations = Reclamations::select('processus_clair', \DB::raw('count(*) as count'))
                                    ->groupBy('processus_clair')
                                    ->pluck('count', 'processus_clair')
                                    ->toArray();

        // Pass the data to the view
        return view('frontend.admin.reclamations', compact('reclamations'));
    }
}

