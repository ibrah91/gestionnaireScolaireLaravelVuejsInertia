<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\NiveauScolaireController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

// Route page d'accueil
Route::get('/', function () {
    return inertia("Home");
})->name("home");

//Route page creation,edit,delete étudiant
Route::get('/etudiant',[EtudiantController::class,"index"])->name("etudiant.index");
Route::post('/etudiant',[EtudiantController::class,"store"])->name("etudiant.store");
Route::get('/etudiant/create',[EtudiantController::class,"create"])->name("etudiant.create");
Route::get('/etudiant/edit/{id}',[EtudiantController::class,"edit"])->name("etudiant.edit");

//Route page creation,edit,delete niveau scolaire
Route::get('/niveauscolaire',[NiveauScolaireController::class,"index"])->name("niveauscolaire.index");
Route::post('/niveauscolaire/create',[NiveauScolaireController::class,"store"])->name("niveauscolaire.store");
Route::get('/niveauscolaire/edit/{niveauScolaire}',[NiveauScolaireController::class,"edit"])->name("niveauscolaire.edit");
Route::put('/niveauscolaire/{niveauScolaire}',[NiveauScolaireController::class,"update"])->name("niveauscolaire.update");
Route::delete('/niveauscolaire/{niveauScolaire}',[NiveauScolaireController::class,"delete"])->name("niveauscolaire.delete");
