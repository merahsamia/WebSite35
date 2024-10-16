<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController ;
use App\Http\Controllers\ContactController ;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/actualites', [ActualiteController::class, 'index']);
Route::get('/AllActualites', [ActualiteController::class, 'actualites']);

// Route::post('/actualites/create', [ActualiteController::class, 'store']);
//Route::get('/actualites/actualite/{id}', [ActualiteController::class, 'show']);

//Route::resource('actualites', ActualiteController::class);
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites.index');   // Afficher la liste des actualités
Route::get('/actualites/{actualite}', [ActualiteController::class, 'show'])->name('actualites.show');   // Afficher une actualité spécifique

Route::post('storeContact', [ContactController::class, 'storeContact']);

Route::middleware(['forcetojson', 'auth:api'])->group(function () {
    Route::post('/actualites', [ActualiteController::class, 'store'])->name('actualites.store');   // Enregistrer une nouvelle actualité
    Route::post('/actualites/{actualite}', [ActualiteController::class, 'update'])->name('actualites.update');   // Mettre à jour une actualité
    Route::delete('/actualites/{actualite}', [ActualiteController::class, 'destroy'])->name('actualites.destroy');   // Supprimer une actualité
    
});


Route::post('/AddDocument', [DocumentController::class, 'store'])->name('documents.store');  
Route::get('/AllDocuments', [DocumentController::class, 'index'])->name('documents.index');  





