<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\GenreController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
/* Image Upload */
    Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
    Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
/* Games */
    Route::get('/dashboard',[GamesController::class, 'index'])->name('dashboard');
    Route::get('/game',[GamesController::class, 'add']);
    Route::post('/game',[GamesController::class, 'create']);
    Route::get('/search',[GamesController::class, 'search']);
    Route::get('/game/{game}', [GamesController::class, 'edit']);
    Route::post('/game/{game}', [GamesController::class, 'update']);
/* Developer */
    Route::get('/dev',[DevelopersController::class, 'index'])->name('dev');
    Route::get('/adddev',[DevelopersController::class, 'add']);
    Route::post('/adddev',[DevelopersController::class, 'create']);
    Route::get('/adddev/{developer}', [DevelopersController::class, 'edit']);
    Route::post('/adddev/{developer}', [DevelopersController::class, 'update']);
/* Genre */
    Route::get('/genre',[GenreController::class, 'index'])->name('genre');
    Route::get('/addgenre',[GenreController::class, 'add']);
    Route::post('/addgenre',[GenreController::class, 'create']);
    Route::get('/addgenre/{genre}', [GenreController::class, 'edit']);
    Route::post('/addgenre/{genre}', [GenreController::class, 'update']);


});

Auth::routes();
Route::resource('games', 'GamesController');
