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
Route::get('/etudiant/create',[EtudiantController::class,"create"])->name("etudiant.create");
Route::get('/etudiant/edit',[EtudiantController::class,"edit"])->name("etudiant.edit");

//Route page creation,edit,delete niveau scolaire
Route::get('/niveauscolaire',[NiveauScolaireController::class,"index"])->name("niveauscolaire.index");
Route::get('/niveauscolaire/create',[NiveauScolaireController::class,"create"])->name("niveauscolaire.create");
Route::get('/niveauscolaire/edit',[NiveauScolaireController::class,"edit"])->name("niveauscolaire.edit");
