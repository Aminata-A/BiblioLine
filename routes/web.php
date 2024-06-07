<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LivreController::class, 'accueil'])->name('accueil');
Route::get('/livres', [LivreController::class, 'livres'])->name('livres');
Route::get('/livres/detail/{id}', [LivreController::class, 'detail'])->name('detail')->where('id', '[0-9]+');
Route::get('/livres/creation', [LivreController::class, 'creation'])->name('creation');
Route::post('/livres/sauvegarde', [LivreController::class, 'sauvegarde'])->name('sauvegarde');
Route::get('livres/modifier/{id}', [LivreController::class, 'modifier'])->name('modifier')->where('id', '[0-9]+');
Route::post('livres/{id}/enregistrer', [LivreController::class, 'enregistrer'])->name('enregistrer');
Route::get('livres/supprimer/{id}', [LivreController::class, 'supprimer'])->name('supprimer')->where('id', '[0-9]+');


Route::get('/categories', [CategorieController::class, 'index'])->name('index');
Route::get('/categories/creation', [CategorieController::class, 'creation'])->name('categories.creation');
Route::post('/categories/sauvegarde', [CategorieController::class, 'sauvegarde'])->name('categories.sauvegarde');
Route::get('categories/modifier/{id}', [CategorieController::class, 'modifier'])->name('categories.modifier')->where('id', '[0-9]+');
Route::post('categories/{id}/enregistrer', [CategorieController::class, 'enregistrer'])->name('categories.enregistrer');
Route::get('categories/supprimer/{id}', [CategorieController::class, 'supprimer'])->name('categories.supprimer')->where('id', '[0-9]+');




Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get("/register", [RegisterController::class, 'create'])->name('register');
Route::post("/register", [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');