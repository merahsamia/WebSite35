<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


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
//     return view('index');
// });

Route::get('/storage/{path}', function ($path) {
    // Vérifie si le chemin du fichier est valide
    $filePath = storage_path('app/public/' . $path);

    // Vérifie si le fichier existe
    if (!file_exists($filePath)) {
        abort(404);
    }

    // Retourne le fichier avec le type MIME approprié
    return response()->file($filePath);
})->where('path', '.*');


Route::controller(AuthController::class)->group(function() {
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});


Route::get('/auth-check', function() {
    return response()->json(['authenticated' => Auth::check()]);
});


Route::get('/{any}', function () {
    return view('layouts/template');
    })->where('any', '.*');

