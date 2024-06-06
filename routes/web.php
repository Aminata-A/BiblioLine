<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LivreController::class, 'accueil']);

