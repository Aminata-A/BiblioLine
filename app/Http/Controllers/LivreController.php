<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function accueil(){
        $livres = Livre::All();
        return view('bibliotheques/accueil', compact('livres')); 
    }
    public function detail($id){
        $livre = Livre::findOrFail($id); // Trouve le livre par son ID ou renvoie une erreur 404
        return view('bibliotheques/details', compact('livre')); 

    }

    public function creation()
    {
        return view('bibliotheques.creation'); // Retourne la vue 'ajout' pour ajouter un livre
    }

    // Méthode pour sauvegarder un nouveau livre
    public function sauvegarde(Request $request)
    {
        // $request->validate([
        //     'titre' => 'required|max:255',
        //     'image' => 'required|url',
        //     'date_de_publication' => 'required',
        //     'nombre_de_pages' => 'required',
        //     'auteur' => 'required|max:150',
        //     'isbn' => 'required|max:13',
        //     'editeur' => 'required',
        //     'id_categorie' => 'required|integer',
        //     'id_rayon' => 'required|integer'
        // ]); 

        Livre::create($request->all()); 

        return redirect('/')->with('success', 'livre ajouté avec succès'); 
    }

    public function modifier($id)
    {
        $livre = Livre::findOrFail($id); 
        return view('bibliotheques.modifier', compact('livre')); 
    }
    
    public function enregistrer(Request $request, $id)
    {
        $livre = Livre::findOrFail($id); 

        $livre->save();
        return redirect('/livres/detail/' . $livre->id)->with('success', 'Modification réussie');
    }
        // Méthode pour supprimer un bien
        public function supprimer($id)
        {
            $livre = Livre::findOrFail($id); // Trouve le bien par son ID ou renvoie une erreur 404
            $livre->delete(); // Supprime le bien
            return redirect('/')->with('livre', 'Bien supprimé avec succès'); // Redirige vers la page des biens
        }
}
