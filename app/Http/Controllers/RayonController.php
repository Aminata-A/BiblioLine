<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    public function index(){
        $rayons = Rayon::all();
        return view('rayons.index', compact('rayons'));
    }

    public function creation()
    {
        return view('rayons.creation');
    }

    public function sauvegarde(Request $request)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required'
        ]);

        Rayon::create($request->all());
        return redirect()->back()->with('success', 'rayon ajouté avec succès');
    }

    public function modifier($id)
    {
        $rayon = Rayon::findOrFail($id);
        return view('rayons.modifier', compact('rayon'));
    }

    public function enregistrer(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required'
        ]);

        $rayon = Rayon::findOrFail($id);
        $rayon->update($request->all());
        return redirect()->back()->with('success', 'rayon modifié avec succès');
    }

    public function supprimer($id)
    {
        $rayon = Rayon::findOrFail($id);
        $rayon->delete();
        return redirect()->route('rayons.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
