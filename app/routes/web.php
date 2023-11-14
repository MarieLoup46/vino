<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CellierController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/get-bouteilles', [BouteilleController::class, 'getBouteilles'])->name('getBouteilles')->middleware('auth');
Route::get('/ajouter-bouteilles', [BouteilleController::class, 'AdminAjoutBouteilles'])->name('FormAjoutBouteilles')->middleware('auth');
Route::post('/ajouter-bouteilles', [BouteilleController::class, 'AjoutBouteilles'])->name('AjoutBouteilles')->middleware('auth');





//Route::get('liste-produits/{page}', [BouteilleController::class, 'getProduits'])->name('listeProduits');

Route::get('/celliers', [CellierController::class, 'index'])->name('cellier.index')->middleware('auth');
Route::get('/cellier/ajouter', [CellierController::class, 'create'])->name('cellier.create')->middleware('auth');

Route::post('/cellier', [CellierController::class, 'store'])->name('cellier.store')->middleware('auth');

Route::get('/cellier/{cellier}', [CellierController::class, 'show'])->name('cellier.show')->middleware('auth');
Route::put('/cellier/{cellier}', [CellierController::class, 'update'])->name('cellier.update')->middleware('auth');
Route::delete('/cellier/{cellier}', [CellierController::class, 'destroy'])->name('cellier.destroy')->middleware('auth');

Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('/registration', [CustomAuthController::class, 'store']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication']);
Route::get('/accueil', [CustomAuthController::class, 'accueil'])->name('accueil')->middleware('auth');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');



Route::get('/recherche', [BouteilleController::class, 'index'])->name('bouteille.index')->middleware('auth');

Route::get('/admin-user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');
Route::delete('/admin-user-list/{user}', [CustomAuthController::class, 'destroy'])->name('user.delete')->middleware('auth');

