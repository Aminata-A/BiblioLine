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
}
