<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function creation()
    {
        return view('categories.creation');
    }

    public function sauvegarde(Request $request)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required'
        ]);

        Categorie::create($request->all());
        return redirect()->back()->with('success', 'Categorie ajouté avec succès');
    }

    public function modifier($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.modifier', compact('categorie'));
    }

    public function enregistrer(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required'
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update($request->all());
        return redirect()->back()->with('success', 'Categorie modifié avec succès');
    }

    public function supprimer($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
