<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RayonController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LivreController::class, 'accueil'])->name('accueil');
Route::get('/livres', [LivreController::class, 'livres'])->name('livres');
Route::get('/livres/detail/{id}', [LivreController::class, 'detail'])->name('detail')->where('id', '[0-9]+');
Route::get('/livres/creation', [LivreController::class, 'creation'])->name('creation')->middleware('auth');
Route::post('/livres/sauvegarde', [LivreController::class, 'sauvegarde'])->name('sauvegarde')->middleware('auth');
Route::get('livres/modifier/{id}', [LivreController::class, 'modifier'])->name('modifier')->where('id', '[0-9]+')->middleware('auth');
Route::post('livres/{id}/enregistrer', [LivreController::class, 'enregistrer'])->name('enregistrer')->middleware('auth');
Route::get('livres/supprimer/{id}', [LivreController::class, 'supprimer'])->name('supprimer')->where('id', '[0-9]+')->middleware('auth');

Route::get('/categories', [CategorieController::class, 'index'])->name('index');
Route::get('/categories/creation', [CategorieController::class, 'creation'])->name('categories.creation')->middleware('auth');
Route::post('/categories/sauvegarde', [CategorieController::class, 'sauvegarde'])->name('categories.sauvegarde')->middleware('auth');
Route::get('categories/modifier/{id}', [CategorieController::class, 'modifier'])->name('categories.modifier')->where('id', '[0-9]+')->middleware('auth');
Route::post('categories/{id}/enregistrer', [CategorieController::class, 'enregistrer'])->name('categories.enregistrer')->middleware('auth');
Route::get('categories/supprimer/{id}', [CategorieController::class, 'supprimer'])->name('categories.supprimer')->where('id', '[0-9]+')->middleware('auth');

Route::get('/rayons', [RayonController::class, 'index'])->name('rayons');
Route::get('/rayons/creation', [RayonController::class, 'creation'])->name('rayons.creation')->middleware('auth');
Route::post('/rayons/sauvegarde', [RayonController::class, 'sauvegarde'])->name('rayons.sauvegarde')->middleware('auth');
Route::get('rayons/modifier/{id}', [RayonController::class, 'modifier'])->name('rayons.modifier')->where('id', '[0-9]+')->middleware('auth');
Route::post('rayons/{id}/enregistrer', [RayonController::class, 'enregistrer'])->name('rayons.enregistrer')->middleware('auth');
Route::get('rayons/supprimer/{id}', [RayonController::class, 'supprimer'])->name('rayons.supprimer')->where('id', '[0-9]+')->middleware('auth');

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get("/register", [RegisterController::class, 'create'])->name('register');
Route::post("/register", [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
