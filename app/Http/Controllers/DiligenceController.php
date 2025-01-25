<?php

namespace App\Http\Controllers;

use App\Models\Diligence;
use Illuminate\Http\Request;

class DiligenceController extends Controller
{
    public function index()
    {
        // Compter le nombre de chaque catégorie
        $pasLong = Diligence::where('procedures_longues', 1)->count();
        $delaisLong = Diligence::where('procedures_longues', 0)->count();
        $complexe = Diligence::where('formalites_complexes', 1)->count();
        $pasComplexe = Diligence::where('formalites_complexes', 0)->count();

        // Passer ces données à la vue
        return view('frontend.admin.diligence', compact('delaisLong', 'pasLong', 'complexe', 'pasComplexe'));
    }
}

