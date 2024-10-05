<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\templateButterfly;



route::get('/',[templateButterfly::class,'index']);
// routes/web.php

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');

use App\Http\Controllers\ParticipationController;

Route::get('/participer', function () {
    return view('frontend.participer');
})->name('participation.form');

Route::post('/participer/soumettre', [ParticipationController::class, 'submit'])->name('participation.submit');

