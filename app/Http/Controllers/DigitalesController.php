<?php
namespace App\Http\Controllers;

use App\Models\EvaluationAccessibilite; // Assurez-vous que ce modèle existe
use Illuminate\Http\Request;
use App\Models\Digitale;
class DigitalesController extends Controller
{
  public function index()
  {
      // Récupérer les évaluations d'accessibilité
      $evaluations = Digitale::all();
  
      // Compter le nombre d'occurrences pour chaque évaluation
      $data = [
          'tres_accessible' => $evaluations->where('evaluation_accessibilite', 'tres_accessible')->count(),
          'accessible' => $evaluations->where('evaluation_accessibilite', 'accessible')->count(),
          'moyennement_accessible' => $evaluations->where('evaluation_accessibilite', 'moyennement_accessible')->count(),
          'difficilement_accessible' => $evaluations->where('evaluation_accessibilite', 'difficilement_accessible')->count(),
          'tres_difficilement_accessible' => $evaluations->where('evaluation_accessibilite', 'tres_difficilement_accessible')->count(),
      ];
  
      // Passer les données à la vue
      return view('frontend.admin.digitale', compact('data')); // Assurez-vous que le nom de la vue est correct
  }
  
}

