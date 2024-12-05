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

#views

Route::get('/pta-view1', function() {
    return view('pta-view1',['name'=>"K23CNT - Project1 - Phạm Tuấn Anh"]);
});

Route::get('/pta-view2', function() {
    return view('pta-view2',[
            'name'=>"K23CNT - Project1 - Phạm Tuấn Anh",
            'array'=>[1,3,2,6,9]
        ]);
});

Route::get('/pta-view3', function() {
    return view('pta-view3',[
            'name'  =>["Phạm","Tuấn","Anh"],
            'array' =>[12,22,21,32,55,35],
            'users' =>[],
        ]);
});