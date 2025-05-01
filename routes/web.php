<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ProfController;

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
Route::controller(EleveController:: class)->group(function () {
    Route::resource('eleve', EleveController::class);
    Route::get('classe/{slug}/eleves', 'index')->name('eleves.classe');
   

});

route::resource('professeur', ProfController::class);


// Route::get('/', function () {
//     return view('welcome');
// });
