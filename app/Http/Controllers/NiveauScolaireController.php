<?php

namespace App\Http\Controllers;

use App\Models\NiveauScolaire;
use Inertia\Inertia;
use Inertia\Controller;
use Illuminate\Http\Request;


class NiveauScolaireController extends Controller
{
    public function index(){
        //permet de récupérer la liste de tous les niveaux scolaires
        $niveauScolaires = NiveauScolaire::orderBy("nom","ASC")->paginate(3);

        return Inertia::render("NiveauScolaire/Index",[
            "niveauScolaires"=>$niveauScolaires
        ]);
    }
    public function create(){
        return Inertia::render("NiveauScolaire/Create");
    }
    public function edit(){
        return Inertia::render("NiveauScolaire/Edit");
    }
}
