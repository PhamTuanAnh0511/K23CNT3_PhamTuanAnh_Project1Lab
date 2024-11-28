<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PtaAccountController extends Controller
{
    //
    public function index(){
        return "<h1> wellcome to, Phạm Tuấn Anh - Controller </h1>";
    }
    //create from
    public function create(){
        return view('pta-account-create');
    }
}
