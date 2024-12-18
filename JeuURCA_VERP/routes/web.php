<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\PouleController;
use App\Http\Controllers\ClassementController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::post('/equipes/menu_equipes', [EquipeController::class, 'store'])->name('menu_equipes');

Route::get('/equipes/menu_equipes', [EquipeController::class, 'index'])->name('menu_equipes');

Route::get('/equipes/equipe_create', function () {
    return view('equipes.equipe_create');
})->name('equipe_create');

Route::get('/equipes/membre_create/{id_equipe}', [MemberController::class, 'create'])->name('membre_create');


Route::get('/equipes/detail_equipe/{id}', [MemberController::class, 'index'])->name('detail_equipe');
Route::post('/equipes/detail_equipe/{id}', [MemberController::class, 'store'])->name('retour_detail');

Route::get('/epreuves/epreuve_create', [EpreuveController::class, 'create'])->name('epreuve_create');
Route::get('/epreuves/classement_epreuve/{id}', [PouleController::class, 'index'])->name('classement_epreuve');
Route::post('/epreuves/menu_epreuves', [EpreuveController::class, 'store'])->name('menu_epreuves');
Route::get('/epreuves/menu_epreuves', [EpreuveController::class, 'index'])->name('menu_epreuves');

Route::get('/epreuves/poule_create/{id_epreuve}', [PouleController::class, 'create'])->name('poule_create');
Route::post('/epreuves/poule_create/{id_epreuve}', [PouleController::class, 'store'])->name('poule_fin_create');

Route::get('/epreuves/classement_create/{id_epreuve}', [ClassementController::class, 'create'])->name('classement_create');
Route::post('/epreuves/classement_create/{id}', [ClassementController::class, 'store'])->name('retour_epreuve');

// Dans routes/web.php


Route::get('/equipes/edit_equipe', function () {
    return view('equipes.edit_equipe');
})->name('edit_equipe');



Route::get('/classement/menu_classement', function () {
    return view('classement.menu_classement');
})->name('menu_classement');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


