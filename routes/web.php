<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Livewire\TheaterCreate;
use App\Http\Livewire\TheaterList;
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
    //movie controller
	Route::get('/movie/{id}/form',[MovieController::class,'movieForm'])->name('movie-form');
	Route::get('/movie/{id}/delete',[MovieController::class,'deleteMovie'])->name('movie-delete');
	Route::post('/movie/save',[MovieController::class,'saveMovieData'])->name('save-movie-data');
    // //theater controller 
    // Route::get('/theater/create', [TheaterController::class, 'create'])->name('theater.create');
    // Route::post('/theater/store', [TheaterController::class, 'store'])->name('theater.store');

 

 // Theater routes
Route::get('/theaters', function () {
    return view('admin.theaters-list');
})->name('theaters-list');

// Theater controller
Route::get('/theater/{id}/form', [TheaterController::class, 'theaterForm'])->name('theater-form');
Route::get('/theater/{id}/delete', [TheaterController::class, 'deleteTheater'])->name('theater-delete');
Route::post('/theater/save', [TheaterController::class, 'saveTheaterData'])->name('save-theater-data');

});
