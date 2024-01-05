<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\ShowController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
      //movie Routes
	Route::get('/movies', function () {
		return view('admin.movies-list');
	})->name('movies-list');
	Route::get('/movie/{id}/form',[MovieController::class,'movieForm'])->name('movie-form');
	Route::get('/movie/{id}/delete',[MovieController::class,'deleteMovie'])->name('movie-delete');
	Route::post('/movie/save',[MovieController::class,'saveMovieData'])->name('save-movie-data');

 // Theater routes
Route::get('/theaters', function () {
    return view('admin.theaters-list');
})->name('theaters-list');
Route::get('/theater/{id}/form', [TheaterController::class, 'theaterForm'])->name('theater-form');
Route::get('/theater/{id}/delete', [TheaterController::class, 'deleteTheater'])->name('theater-delete');
Route::post('/theater/save', [TheaterController::class, 'saveTheaterData'])->name('save-theater-data');
Route::get('/theater/{theaterId}/open-screen-modal', [TheaterController::class, 'openScreenModal'])->name('theater.open-screen-modal');
Route::post('/add-screen', [TheaterController::class, 'addScreen'])->name('add-screen');
Route::delete('/delete-screen/{screenId}/{theaterId}', [TheaterController::class, 'deleteScreen'])->name('delete-screen');
Route::get('/api/screens/{screenId}', [TheaterController::class, 'getScreenDetails']);
Route::post('/update-screen-capacity', [TheaterController::class, 'updateScreenCapacity'])->name('update-screen-capacity');

// Show Routes
Route::get('/shows', function () {
    return view('admin.show-list');
})->name('shows-list');
Route::get('/show/{id}/form', [ShowController::class, 'showForm'])->name('show-form');
Route::get('/show/{id}/delete', [ShowController::class, 'deleteShow'])->name('show-delete');
Route::post('/show/save', [ShowController::class, 'saveShowData'])->name('save-show-data');

});
