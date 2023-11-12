<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\AdminController;
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


Route::get('/get-bouteilles', [AdminController::class, 'getBouteilles'])->name('getBouteilles');
Route::get('/ajouter-bouteilles', [AdminController::class, 'FormAjoutBouteilles'])->name('FormAjoutBouteilles');
Route::post('/ajouter-bouteilles', [AdminController::class, 'AjoutBouteilles'])->name('AjoutBouteilles');





Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('/registration', [CustomAuthController::class, 'store']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication']);
Route::get('/accueil', [CustomAuthController::class, 'accueil'])->name('accueil');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::get('/recherche', [BouteilleController::class, 'index'])->name('bouteille.index');