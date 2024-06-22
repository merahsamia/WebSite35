<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController ;
use App\Http\Controllers\ContactController ;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/actualites', [ActualiteController::class, 'index']);
Route::get('/AllActualites', [ActualiteController::class, 'actualites']);

// Route::post('/actualites/create', [ActualiteController::class, 'store']);
//Route::get('/actualites/actualite/{id}', [ActualiteController::class, 'show']);

Route::resource('actualites', ActualiteController::class);

Route::post('storeContact', [ContactController::class, 'storeContact']);
