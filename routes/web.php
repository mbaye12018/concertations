<?php

use Illuminate\Support\Facades\Route;

// Contrôleurs existants
use App\Http\Controllers\templateButterfly;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\EnqueteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\RapporteurController;
use App\Http\Controllers\EnqueteRegionController;
use App\Http\Controllers\EnqueteRapporteurController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\TendanceController;
use App\Http\Controllers\AjoutController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\PaysMondeController;
use App\Http\Controllers\AccesPublicsController;
use App\Http\Controllers\AccueilOrientationController;
use App\Http\Controllers\DiligenceController;
use App\Http\Controllers\CoutServiceController;
use App\Http\Controllers\CorruptionController;
use App\Http\Controllers\ReclamationsController;
use App\Http\Controllers\DigitaleController;
//use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\RessourcesHumainesController;
// Contrôleurs pour soumissions / réponses
use App\Http\Controllers\SoumissionController;
use App\Http\Controllers\ReponseController;

// ==================
//  Page d'accueil
// ==================
Route::get('/', [templateButterfly::class, 'index'])->name('home');

// ==================
//  Authentification
// ==================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// ==================
//  Participation
// ==================
Route::get('/participer', function () {
    return view('frontend.participer');
})->name('participation.form');

// (Si ces participations ne sont plus utiles, tu peux les supprimer)
Route::post('/participer/soumettre', [ParticipationController::class, 'submit'])->name('participation.submit');

// ==================
//  Enquête
// ==================
Route::post('/enquete', [EnqueteController::class, 'store'])->name('enquete.store');

// ==================
//  Tableaux de bord
// ==================
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/consultant/dashboard', [ConsultantController::class, 'index'])->name('consultant.dashboard');
Route::get('/rapporteur/dashboard', [RapporteurController::class, 'index'])->name('rapporteur.dashboard');

// ==================
//  Récupération départements, régions
// ==================
Route::get('/departements/{region}', [RapporteurController::class, 'getDepartements']);
Route::get('/regions', [RapporteurController::class, 'getRegions']);
Route::get('/secteurs/{departementId}', [RapporteurController::class, 'getSecteurs']);

// ==================
//  Pages Contexte, Objectif, Tendance
// ==================
Route::get('/contexte', [ContexteController::class, 'index'])->name('contexte');
Route::get('/objectif', [ObjectifController::class, 'index'])->name('objectif');
Route::get('/tendance', [TendanceController::class, 'index'])->name('tendance');

// ==================
//  Resource Controllers existants
// ==================
Route::resource('enquete-region', EnqueteRegionController::class);
Route::resource('enquetes', EnqueteRapporteurController::class);

// ==================
//  Ajout user
// ==================
Route::post('/ajoutuser', [AjoutController::class, 'store'])->name('ajoutuser.store');
Route::get('/admin/ajoutuser', [AjoutController::class, 'create'])->name('ajoutuser.create');

// ==================
//  Utilisateurs
// ==================
Route::get('/utilisateur/create', [UtilisateurController::class, 'create'])->name('utilisateur.create');
Route::post('/utilisateur', [UtilisateurController::class, 'store'])->name('utilisateur.store');
Route::delete('/utilisateur/{id}', [UtilisateurController::class, 'destroy'])->name('utilisateur.destroy');
Route::get('/utilisateur/{id}/edit', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
Route::put('/utilisateur/{id}', [UtilisateurController::class, 'update'])->name('utilisateur.update');

// ==================
//  Statistiques
// ==================
Route::get('/statistique', [StatistiqueController::class, 'index'])->name('statistique.statistique');
Route::get('/get-statistics', [StatistiqueController::class, 'getStatistics']);
Route::get('/statistique/get', [StatistiqueController::class, 'getStatistics'])->name('statistique.getStatistics');

// ==================
//  PaysMondeController
// ==================
Route::get('/participer8', [PaysMondeController::class, 'index']);
// (Si c’est juste pour la liste des pays, OK)

// ==================
//  Autres routes "participerX"
// (Si elles ne servent plus, tu peux les supprimer.)
// ==================
Route::get('/participer1', function () { return view('frontend.participer1'); })->name('participation.form');
Route::get('/participer2', function () { return view('frontend.participer2'); })->name('participation.form');
Route::get('/participer3', function () { return view('frontend.participer3'); })->name('participation.form');
Route::get('/participer4', function () { return view('frontend.participer4'); })->name('participation.form');
Route::get('/participer5', function () { return view('frontend.participer5'); })->name('participation.form');
Route::get('/participer6', function () { return view('frontend.participer6'); })->name('participation.form');
Route::get('/participer7', function () { return view('frontend.participer7'); })->name('participation.form');
Route::get('/participer9', function () { return view('frontend.participer9'); })->name('participation.form');

// ==================
//  Les routes pour chaque THÉMATIQUE
// ==================
Route::post('/soumissions/acces-services-publics', [SoumissionController::class, 'storeAccesPublics'])->name('soumissions.acces_publics');
Route::post('/soumissions/accueil-orientation', [SoumissionController::class, 'storeAccueilOrientation'])->name('soumissions.accueil_orientation');
Route::post('/soumissions/diligence', [SoumissionController::class, 'storeDiligence'])->name('soumissions.diligence');
Route::post('/soumissions/cout-service', [SoumissionController::class, 'storeCoutService'])->name('soumissions.cout_service');
Route::post('/soumissions/corruption', [SoumissionController::class, 'storeCorruption'])->name('soumissions.corruption');
Route::post('/soumissions/reclamations', [SoumissionController::class, 'storeReclamations'])->name('soumissions.reclamations');
Route::post('/soumissions/digitale', [SoumissionController::class, 'storeDigitale'])->name('soumissions.digitale');
Route::post('/soumissions/participation', [SoumissionController::class, 'storeParticipation'])->name('soumissions.participation');
Route::post('/soumissions/ressources-humaines', [SoumissionController::class, 'storeRessourcesHumaines'])->name('soumissions.ressources_humaines');

// Si tu gères les infos générales dans la table "soumissions"
Route::post('/soumissions/infos-generales', [SoumissionController::class, 'storeInfosGenerales'])->name('soumissions.infos_generales');

// ==================
//  Les routes pour chaque THÉMATIQUE
// ==================


Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistique.index');
Route::get('/statistiques/data', [StatistiqueController::class, 'getStatistics'])->name('statistique.getStatistics');



Route::get('/acces-publics', [AccesPublicsController::class, 'index']);
Route::get('/accueil-orientation', [AccueilOrientationController::class, 'index']);
Route::get('/diligence', [DiligenceController::class, 'index']);
Route::get('/cout-service', [CoutServiceController::class, 'index']);
Route::get('/corruption', [CorruptionController::class, 'index']);
Route::get('/reclamations', [ReclamationsController::class, 'index']);
Route::get('/digitale', [DigitaleController::class, 'index']);
Route::get('/participation', [ParticipationController::class, 'index']);
Route::get('/ressources-humaines', [RessourcesHumainesController::class, 'index']);
Route::get('/service-public/{service}', 'ServicePublicController@getData');
//use App\Http\Controllers\AccesPublicsController;

//Route::get('/acces-publics', [AccesPublicsController::class, 'index']);
Route::post('/acces-publics/data', [AccesPublicsController::class, 'getData']);
Route::get('/graphique/{service}', [GraphiqueController::class, 'getGraphData']);
