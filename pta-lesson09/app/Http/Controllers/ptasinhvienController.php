<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ptasinhvien;
class ptasinhvienController extends Controller
{
    public function ptaList()
    {
        // Lấy toàn bộ dữ liệu trong bảng sinh viên
        $ptasinhvien = ptasinhvien::all();
        return view('ptasinhvien.ptaList', ['ptasinhvien'=>$ptasinhvien]);
    }
    public function ptaCreate()
    {
        return view('ptasinhvien.ptaCreate');
    }

    // Add sumbit 
    public function ptaCreateSumbit(Request $request)
    {
        // Lấy dữ liệu trên form, gán cho các giá trị 
        $ptasinhvien = new ptasinhvien();
        $ptasinhvien ->ptamasv = $request->ptamasv;
        $ptasinhvien ->ptahosv = $request->ptaHoSV;
        $ptasinhvien ->ptatensv = $request->ptatensv;
        $ptasinhvien ->ptaphai = $request->ptaphai;
        $ptasinhvien ->ptangaysinh = $request->ptangaysinh;
        $ptasinhvien ->ptanoisinh = $request->ptanoisinh;
        $ptasinhvien ->ptamakh = $request->ptamakh;
        $ptasinhvien ->ptahocbong = $request->ptahocbong;
        $ptasinhvien ->ptaDTB = $request->ptaDTB;
        // Ghi vào bảng trong CSDL 
        $ptasinhvien ->save();

        // return view('ptasinhvien.ptaCreate');
        return back()-> with('ptasinhvien_Created','Đã thêm mới');
    }
}
