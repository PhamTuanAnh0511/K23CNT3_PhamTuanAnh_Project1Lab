<?php

use Illuminate\Support\Facades\Route;

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

#test session
Route::get('/pta-session/get', [ptaSessionController::class,'ptagetSessionData'])->name('ptasession.get');
Route::get('/pta-session/set', [ptaSessionController::class,'ptastoreSessionData'])->name('ptasession.set');
Route::get('/pta-session/delete', [ptaSessionController::class,'ptadeleteSessionData'])->name('ptasession.delete');