<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManzanaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', ManzanaController::class .'@index')->name('manzanas.index');
Route::post('/manzanas', ManzanaController::class .'@store')->name('manzanas.store');
Route::put('/manzanas/{id}', ManzanaController::class .'@update')->name('manzanas.update');
Route::delete('/manzanas/{id}', ManzanaController::class .'@destroy')->name('manzanas.destroy');
Route::get('/manzanas/create', ManzanaController::class .'@create')->name('manzanas.create');
Route::get('/manzanas/edit', ManzanaController::class .'@edit')->name('manzanas.edit');
