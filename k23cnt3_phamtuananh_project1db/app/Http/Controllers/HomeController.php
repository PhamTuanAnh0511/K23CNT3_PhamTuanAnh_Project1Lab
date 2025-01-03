<?php

namespace App\Http\Controllers;

use App\Models\pta_san_pham;
use App\Models\pta_hoa_don;
use App\Models\pta_ct_hoa_don;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Trang chủ - hiển thị tất cả sản phẩm
    public function index()
    {
        // Lấy tất cả sản phẩm với phân trang, 6 sản phẩm mỗi trang
        $sanPhams = pta_san_pham::paginate(6);  // Sử dụng paginate() để phân trang
    
        // Trả về view và truyền dữ liệu sản phẩm vào
        return view('ptauser.home', compact('sanPhams'));
    }
    
    public function index1()
    {
        // Lấy tất cả sản phẩm với phân trang, 6 sản phẩm mỗi trang
        $sanPhams = pta_san_pham::paginate(6);  // Sử dụng paginate() để phân trang
        
        // Trả về view và truyền dữ liệu sản phẩm vào
        return view('ptauser.home1', compact('sanPhams'));
    }
    

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        // Lấy sản phẩm theo id
        $sanPham = pta_san_pham::findOrFail($id); 
        
        // Trả về view chi tiết sản phẩm
        return view('ptauser.show', compact('sanPham')); 
    }






 


}   