<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\vtd_SAN_PHAM; 
use App\Models\vtd_KHACH_HANG; 
use App\Models\vtd_TIN_TUC; 
class VTD_DANH_SACH_QUAN_TRIController extends Controller
{
    //
    // Danh mục
    public function danhmuc()
    {
        // Truy vấn số lượng sản phẩm
        $productCount = vtd_SAN_PHAM::count();
        
        // Truy vấn số lượng người dùng
        $userCount = vtd_KHACH_HANG::count();
        $ttCount = vtd_TIN_TUC::count();

        
        // Trả về view và truyền cả productCount và userCount
        return view('vtdAdmins.vtddanhsachquantri.vtddanhmuc', compact('productCount', 'userCount','ttCount'));
    }

    public function nguoidung()
    {
        $vtdnguoidung = vtd_KHACH_HANG::all();
        
        // Chuyển đổi vtdNgayDangKy thành đối tượng Carbon thủ công
        foreach ($vtdnguoidung as $user) {
            // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
            $user->vtdNgayDangKy = Carbon::parse($user->vtdNgayDangKy);
        }
        
        return view('vtdAdmins.vtddanhsachquantri.vtddanhmuc.vtdnguoidung', ['vtdnguoidung' => $vtdnguoidung]);
    }
        

    public function tintuc()
    {
        // Retrieve all news articles from the database (assuming you have a model named vtd_TIN_TUC)
        $vtdtintucs = vtd_TIN_TUC::all();  // Fetching all articles
        
        // Loop through articles and add the full URL to the image
        foreach ($vtdtintucs as $article) {
            // Assuming vtdHinhAnh stores the image name, we'll prepend the 'public/storage' path
            $article->image_url = asset('storage/' . $article->vtdHinhAnh);
        }
        
        // Return the view and pass the articles to it
        return view('vtdAdmins.vtddanhsachquantri.vtddanhmuc.vtdtintuc', [
            'vtdtintucs' => $vtdtintucs, // Passing the news articles to the view
        ]);
    }
        
    

    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        $vtdsanphams = vtd_SAN_PHAM::all(); // Lấy tất cả sản phẩm
        return view('vtdAdmins.vtddanhsachquantri.vtddanhmuc.vtdsanpham', ['vtdsanphams' => $vtdsanphams]);
    }

    // Hiển thị mô tả chi tiết sản phẩm
    public function mota($id)
    {
        // Lấy sản phẩm theo id
        $product = vtd_SAN_PHAM::find($id);
        
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('vtdAdmins.vtddanhsachquantri.danhmuc.sanpham')
                             ->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view với thông tin sản phẩm
        return view('vtdAdmins.vtddanhsachquantri.vtddanhmuc.vtdmota', ['product' => $product]);
    }
}