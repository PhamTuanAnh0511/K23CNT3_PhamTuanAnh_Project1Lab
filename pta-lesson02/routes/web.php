<?php
use App\Http\Controllers\PtaAccountController;
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

Route::get('/greeting', function () {
    return "<h1> hello world i'm Pham Tuan Anh</h1>";
});

#redirect
Route::redirect('/here','/three');

Route::get('/three', function () {
    return "<h1> Redirect to three </h1>";
});

#router return view

Route::get('/Pham-Tuan-Anh', function (){
    return view('PhamTuanAnh');
});

#Route parameter 
Route::get('/devmaster/{id}',function($id){
    return "<h1> devmaster ".$id . "</h1>";
});

#optional paramaster
Route::get('/dev/{name?}',function($name="Phạm Tuấn Anh"){
    return "<h1> Xin chào ".$name . "</h1>";
});

Route::get('pta-account',[PtaAccountController::class,'index'])->name('ptaaccount.index');

Route::get('/pta-account-create',[PtaAccountController::class,'create']);