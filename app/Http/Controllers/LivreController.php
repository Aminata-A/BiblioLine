<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Livre;
use App\Models\Rayon;
use App\Models\Categorie;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    // Affiche la liste des livres sur la page d'accueil
    public function accueil()
    {
        $livres = Livre::take(3)->get(); // Récupère les 3 premiers livres
        return view('bibliotheques/accueil', compact('livres'));
    }

    // Affiche tous les livres
    public function livres(Request $request)
    {
        $categories = Categorie::all(); // Récupère toutes les catégories
        $categorie_id = $request->input('categorie_id'); // Récupère l'ID de la catégorie sélectionnée
        $search = $request->input('search'); // Récupère le terme de recherche

        $query = Livre::query();

        if ($categorie_id) {
            $query->where('categorie_id', $categorie_id); // Filtre les livres par catégorie
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('titre', 'like', '%' . $search . '%')
                  ->orWhere('auteur', 'like', '%' . $search . '%');
            });
        }

        $livres = $query->get();

        return view('bibliotheques/livres', compact('livres', 'categories', 'categorie_id'));
    }

    // Affiche les détails d'un livre spécifique
    public function detail($id)
    {
        $livre = Livre::findOrFail($id);
        return view('bibliotheques/details', compact('livre'));
    }

    // Affiche le formulaire de création d'un nouveau livre
    public function creation()
    {
        $categories = Categorie::all();
        $rayons = Rayon::all();
        return view('bibliotheques.creation', compact('categories', 'rayons'));
    }

    // Méthode pour sauvegarder un nouveau livre
    public function sauvegarde(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'nombre_de_pages' => 'required|integer|min:32',
            'date_de_publication' => 'required|date_format:Y-m-d\TH:i',
            'editeur' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'rayon_id' => 'required|exists:rayons,id',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|url',
        ]);
        $date_de_publication = Carbon::createFromFormat('Y-m-d\TH:i', $request->date_de_publication);


        Livre::create($request->all());
        return redirect('/')->with('success', 'Livre ajouté avec succès');
    }

    // Affiche le formulaire de modification d'un livre existant
    public function modifier($id)
    {
        $livre = Livre::findOrFail($id);
        $categories = Categorie::all();
        $rayons = Rayon::all();
        return view('bibliotheques/modifier', compact('livre', 'categories', 'rayons'));
    }

    // Méthode pour enregistrer les modifications d'un livre existant
    public function enregistrer(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'nombre_de_pages' => 'required|integer|min:32',
            'date_de_publication' => 'required|date_format:Y-m-d\TH:i',
            'editeur' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'rayon_id' => 'required|exists:rayons,id',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|url',
        ]);
    
        $date_de_publication = Carbon::createFromFormat('Y-m-d\TH:i', $request->date_de_publication);

        $livre = Livre::findOrFail($id);
        $livre->update($request->all());
        return redirect('/livres/detail/' . $livre->id)->with('success', 'Modification réussie');
    }

    // Méthode pour supprimer un livre
    public function supprimer($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();
        return redirect('/')->with('success', 'Livre supprimé avec succès');
    }
}
