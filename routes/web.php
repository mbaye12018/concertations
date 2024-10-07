<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\templateButterfly;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\EnqueteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\RapporteurController;


Route::get('/', [templateButterfly::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); 


Route::get('/participer', function () {
    return view('frontend.participer');
})->name('participation.form');


Route::post('/participer/soumettre', [ParticipationController::class, 'submit'])->name('participation.submit');


Route::post('/enquete', [EnqueteController::class, 'store'])->name('enquete.store');


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/consultant/dashboard', [ConsultantController::class, 'index'])->name('consultant.dashboard');
Route::get('/rapporteur/dashboard', [RapporteurController::class, 'index'])->name('rapporteur.dashboard');
Route::get('/departements/{region}', 'YourController@getDepartements');
Route::get('/representants/{department}', 'YourController@getRepresentants');
