<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ptaSessionController extends Controller
{
    public function ptagetSessionData(Request $request)
    {
        if($request->session()->has('K23CNT3_PhamTuanAnh'))
        {    
            echo $request->session()->get('K23CNT3_PhamTuanAnh');
        }else{
            echo "<h2> Không có dữ liệu trong session </h2>";
        }
    }    

    #Lưu dữ liệu vào session
    public function ptastoreSessionData(Request $request)
    {
        $request->session()->put('K23CNT3_PhamTuanAnh','K23CNT3 - Phạm Tuấn Anh - 231090003');
        echo "<h2> Dữ liệu đã được lưu và session </h2>";
    }
    #Xóa dữ liệu trong session
    public function ptadeleteSessionData(Request $request)
    {
        $request->session()->forget('K23CNT3_PhamTuanAnh');
        echo "<h2> Dữ liệu đã được xóa khỏi session </h2>";
    }
}
