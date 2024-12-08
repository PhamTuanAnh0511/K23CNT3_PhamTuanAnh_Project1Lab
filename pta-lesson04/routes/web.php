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

Route::get('/test', function () {
    return view('test');
});

#Views
Route::get('/pta-view1',function(){return view('pta-view1',['name'=>'Devmaster
    Academy!']);
});

Route::get('/pta-view2',function(){
    return view('pta-view2',[
    
    'name'=>'Devmaster Academy!',
    'arr'=>[1,4,7,2,9],
    ]);
});

Route::get('/pta-view3',function(){
    return view('pta-view3',[
    
    'name'=>["Devmaster","Academy","Chung","Trịnh"],
    'arr'=>[10,15,12,1,22,30],
    'users'=>[],]);
});

Route::get('/test', [App\Http\Controllers\ptaProductController::class,'ptaindex']);