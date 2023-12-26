<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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
    return view('auth.register');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
	
	Route::get('/movies', function () {
		return view('admin.movies-list');
	})->name('movies-list');
	Route::get('/movie/{id}/form',[MovieController::class,'movieForm'])->name('movie-form');
	Route::get('/movie/{id}/delete',[MovieController::class,'deleteMovie'])->name('movie-delete');
	Route::post('/movie/save',[MovieController::class,'saveMovieData'])->name('save-movie-data');
});
