<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pta_quan_triController extends Controller
{
    // //GET: login (authentication)
    public function ptaLogin(){
        return view('ptaLogin.pta-login');
    }
    public function ptaLoginSubmit(Request $request){
        return view('ptaLogin.pta-login');
    }
}
