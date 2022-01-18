<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ColisController;
use App\Http\Controllers\Liste;
use App\Http\Controllers\AeroportController;
use App\Http\Controllers\socialController;

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);
Route::get('annonces', [Liste::class, 'getanonces']);
Route::get('searchannonces', [Liste::class, 'search']);
Route::get('annonce/{id}', [Liste::class, 'show']);
Route::get('aeroportlist', [AeroportController::class, 'getaeroport']);
Route::get('login/{provider}', [socialController::class, 'redirectToProvider']);

Route::get('login/{provider}/callback', [socialController::class, 'handleProviderCallback']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('profile', [ApiController::class, 'get_user']);
    Route::put('updateuser/{user}',  [ApiController::class, 'update']);
    Route::get('mesannonces', [AnnonceController::class, 'index']);
    //Route::get('annonce/{id}', [AnnonceController::class, 'show']);
    Route::post('createannonce', [AnnonceController::class, 'store']);
    Route::put('updateannonce/{annonce}',  [AnnonceController::class, 'update']);
    Route::delete('deleteannonce/{annonce}',  [AnnonceController::class, 'destroy']);




    Route::get('mescolis', [ColisController::class, 'index']);
    Route::get('coli/{id}', [ColisController::class, 'show']);
    Route::post('createcoli', [ColisController::class, 'store']);
    Route::put('updatecoli/{annonce}',  [ColisController::class, 'update']);
    Route::delete('deletecoli/{annonce}',  [ColisController::class, 'destroy']);
});
