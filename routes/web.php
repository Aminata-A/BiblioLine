<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LivreController::class, 'accueil'])->name('accueil');
Route::get('/livres/detail/{id}', [LivreController::class, 'detail'])->name('detail')->where('id', '[0-9]+');
Route::get('/livres/creation', [LivreController::class, 'creation'])->name('creation');
Route::post('/livres/sauvegarde', [LivreController::class, 'sauvegarde'])->name('sauvegarde');
Route::get('livres/modifier/{id}', [LivreController::class, 'modifier'])->name('modifier')->where('id', '[0-9]+');
Route::post('livres/{id}/enregistrer', [LivreController::class, 'enregistrer'])->name('enregistrer');
Route::get('livres/supprimer/{id}', [LivreController::class, 'supprimer'])->name('supprimer')->where('id', '[0-9]+');

