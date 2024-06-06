<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function accueil(){
        $livres = Livre::All(); // Récupère les 3 premiers livres
        return view('livres.accueil', compact('livres')); 
    }
}
