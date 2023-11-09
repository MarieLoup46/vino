<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\CellierController;

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


Route::get('liste-produits/{page}', [BouteilleController::class, 'getProduits'])->name('listeProduits');

Route::get('/cellier/ajouter', [CellierController::class, 'create'])->name('cellier.create');

Route::post('/cellier', [CellierController::class, 'store'])->name('cellier.store');
