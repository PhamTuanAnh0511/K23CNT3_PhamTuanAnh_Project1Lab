<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ptaProductController extends Controller
{
    public function ptaindex()
    {
        $fruits = array("Apple","Orange","Mango","Banana","Pineapple");
        return view('test',['fruits'=>$fruits]);
    }
}
