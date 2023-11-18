<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use Illuminate\Http\Request;
use App\Models\NiveauScolaire;

use Illuminate\Validation\Rule;


class NiveauScolaireController extends Controller
{
    public function index()
    {
        //permet de récupérer la liste de tous les niveaux scolaires
        $niveauScolaires = NiveauScolaire::latest("nom", "ASC")->paginate(5);

        return Inertia::render("NiveauScolaire/IndexNiveauScolaire", [
            "niveauScolaires" => $niveauScolaires
        ]);
    }
    public function store(Request $request)
    {
        $request->validate(["nom" => "required|unique:App\\Models\NiveauScolaire"]);
        NiveauScolaire::create(["nom" => $request->nom]);
        return redirect()->back();
    }
    public function edit(NiveauScolaire $niveauScolaire)
    {
        return response()->json(["niveauScolaire" => $niveauScolaire]);
    }

    public function update(Request $request, NiveauScolaire $niveauScolaire)
    {
        $request->validate([
            "nom" => [
                "required",
                Rule::unique((new NiveauScolaire)->getTable(), "nom")->ignore($niveauScolaire->id)
            ]
        ]);

        if ($request->nom != $niveauScolaire->nom) {
            $niveauScolaire->nom = $request->nom;
            $niveauScolaire->save();
        }

        return redirect()->back();
    }



    public function delete(NiveauScolaire $niveauScolaire)
    {
        if (count($niveauScolaire->etudiants)>0) {
            return redirect()->back()->withErrors([
                "message" => "Ce niveau scolaire ne peut être supprimé car il existe des étudiants qui dépendent de ce dernier."
            ]);
        }
        $niveauScolaire->delete();
        return redirect()->back();
    }
}
