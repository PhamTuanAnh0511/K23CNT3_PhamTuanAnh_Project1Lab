<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  

class  ptaKhoaController extends Controller
{
    public function ptaGetAllKhoa()
        {
            $ptakhoas = DB::select('select * from ptakhoa ');

            return view('ptakhoa.ptalist',['ptakhoas'=> $ptakhoas]);
        }

}
