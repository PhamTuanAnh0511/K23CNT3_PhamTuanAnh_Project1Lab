<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\pta_san_pham; 
use App\Models\pta_khach_hang; 
use App\Models\pta_tin_tuc; 
class pta_danh_sach_quan_tri1 extends Controller
{
    //
    // Danh mục
    public function danhmuc()
    {
        // Truy vấn số lượng sản phẩm
        $productCount = pta_san_pham::count();
        
        // Truy vấn số lượng người dùng
        $userCount = pta_khach_hang::count();
        $ttCount = pta_tin_tuc::count();

        
        // Trả về view và truyền cả productCount và userCount
        return view('ptaadmins.ptadanhsachquantri.ptadanhmuc', compact('productCount', 'userCount','ttCount'));
    }

    public function nguoidung()
    {
        $ptanguoidung = pta_khach_hang::all();
        
        // Chuyển đổi ptaNgayDangKy thành đối tượng Carbon thủ công
        foreach ($ptanguoidung as $user) {
            // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
            $user->ptaNgayDangKy = Carbon::parse($user->ptaNgayDangKy);
        }
        
        return view('ptaadmins.ptadanhsachquantri.ptadanhmuc.ptanguoidung', ['ptanguoidung' => $ptanguoidung]);
    }
        

        public function tintuc()
    {
        // Retrieve all news articles from the database (assuming you have a model named pta_tin_tuc)
        $ptatintucs = pta_tin_tuc::all();  // Fetching all articles
        
        // Loop through articles and add the full URL to the image
        foreach ($ptatintucs as $article) {
            // Assuming ptaHinhAnh stores the image name, we'll prepend the 'public/storage' path
            $article->image_url = asset('storage/' . $article->ptaHinhAnh);
        }
        
        // Return the view and pass the articles to it
        return view('ptaadmins.ptadanhsachquantri.ptadanhmuc.ptatintuc', [
            'ptatintucs' => $ptatintucs, // Passing the news articles to the view
        ]);
    }
        
    

    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        $ptasanphams = pta_san_pham::all(); // Lấy tất cả sản phẩm
        return view('ptaadmins.ptadanhsachquantri.ptadanhmuc.ptasanpham', ['ptasanphams' => $ptasanphams]);
    }

    // Hiển thị mô tả chi tiết sản phẩm
    public function mota($id)
    {
        // Lấy sản phẩm theo id
        $product = pta_san_pham::find($id);
        
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('ptaadmins.ptadanhsachquantri.danhmuc.sanpham')
                             ->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view với thông tin sản phẩm
        return view('ptaadmins.ptadanhsachquantri.ptadanhmuc.ptamota', ['product' => $product]);
    }
}