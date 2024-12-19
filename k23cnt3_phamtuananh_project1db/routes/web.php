<?php
use App\Http\Controllers\pta_quan_triController;
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
Route::get('/admins/pta-login',[pta_quan_triController::class,'ptaLogin'])->name('admins.ptaLogin');
Route::post('/admins/pta-login',[pta_quan_triController::class,'ptaLoginSubmit'])->name('admins.ptaLoginSubmit'); 