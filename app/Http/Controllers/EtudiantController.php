<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;


class EtudiantController extends Controller
{
    public function index(){
         //permet de récupérer la liste de tous les étudiants
         $etudiants = Etudiant::orderBy("nom","ASC")->paginate(3);
        return Inertia::render("Etudiant/Index",[
            "etudiants"=>$etudiants
        ]);
    }
    public function create(){
        return Inertia::render("Etudiant/Create");
    }
    public function edit(){
        return Inertia::render("Etudiant/Edit");
    }
}
