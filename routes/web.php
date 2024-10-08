<?php

use App\Http\Controllers\ContexteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\templateButterfly;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\EnqueteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\RapporteurController;
use App\Http\Controllers\EnqueteRegionController;
use App\Http\Controllers\EnqueteRapporteurController;

// Route pour la page d'accueil
Route::get('/', [templateButterfly::class, 'index']);

// Routes pour l'authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); 

// Route pour participer
Route::get('/participer', function () {
    return view('frontend.participer');
})->name('participation.form');
Route::get('/', [templateButterfly::class, 'index'])->name('home');

// Route pour soumettre une participation
Route::post('/participer/soumettre', [ParticipationController::class, 'submit'])->name('participation.submit');

// Route pour soumettre une enquête
Route::post('/enquete', [EnqueteController::class, 'store'])->name('enquete.store');

// Routes pour les tableaux de bord
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/consultant/dashboard', [ConsultantController::class, 'index'])->name('consultant.dashboard');
Route::get('/rapporteur/dashboard', [RapporteurController::class, 'index'])->name('rapporteur.dashboard');

// Routes pour récupérer les départements et les représentants
Route::get('/departements/{region}', [RapporteurController::class, 'getDepartements']); // Remplacez 'index' par 'getDepartements'


// Route pour récupérer les régions
Route::get('/regions', [RapporteurController::class, 'getRegions']);

Route::get('/secteurs/{departementId}', [RapporteurController::class, 'getSecteurs']);

//Contexte page
Route::get('/contexte', [ContexteController::class, 'index'])->name('contexte');


Route::resource('enquete-region', EnqueteRegionController::class);

Route::resource('enquetes', EnqueteRapporteurController::class);