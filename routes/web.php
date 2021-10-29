<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dash');
})->name('dashboard');


Route::get('/', [App\Http\Controllers\PublicController::class, 'home'])->name("home");
Route::resource('location', App\Http\Controllers\LocationController::class);

Route::resource('public', App\Http\Controllers\PublicController::class);

	Route::resource('voiture', App\Http\Controllers\VoitureController::class);

// Route::get('/', [App\Http\Controllers\VoitureController::class, 'index'])->name("home");

Route::group(['middleware' => 'auth'], function() {

	Route::resource('agrement', App\Http\Controllers\AgrementController::class);


});


// Route::group(['middleware' => 'isAdmin'], function() {     
//         Route::get('utilisateur/add',  [App\Http\Controllers\Admin\UtilisateursController::class, 'add'])->name("admin_ajouter_utilisateur");      
// });

