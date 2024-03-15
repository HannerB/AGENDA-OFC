<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\SearchController;

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

Route::resource('agenda', AgendaController::class);


Route::get('/search', [SearchController::class, 'search'])->name('agenda.search');

// Route::get('/listado', [AgendaController::class, 'listado'])->name('agenda.listado');
// Route::get('/search', 'SearchController@search')->name('agenda.search');



