<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vtd_KHACH_HANG; 
class VTD_KHACH_HANGcontroller extends Controller
{
    //
    // CRUD
    // list
    public function vtdList()
    {
        $khachhangs = vtd_KHACH_HANG::all();
        return view('vtdAdmins.vtdkhachhang.vtd-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function vtdDetail($id)
    {
        $vtdkhachhang = vtd_KHACH_HANG::where('id',$id)->first();
        return view('vtdAdmins.vtdkhachhang.vtd-detail',['vtdkhachhang'=>$vtdkhachhang]);
    }
    // create
    public function vtdCreate()
    {
        return view('vtdAdmins.vtdkhachhang.vtd-create');
    }
    //post
    public function vtdCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'vtdMaKhachHang' => 'required|unique:vtd_khach_hang,vtdMaKhachHang',
            'vtdHoTenKhachHang' => 'required|string',
            'vtdEmail' => 'required|email|unique:vtd_khach_hang,vtdEmail',  
            'vtdMatKhau' => 'required|min:6',
            'vtdDienThoai' => 'required|numeric|unique:vtd_khach_hang,vtdDienThoai',  
            'vtdDiaChi' => 'required|string',
            'vtdNgayDangKy' => 'required|date',  
            'vtdTrangThai' => 'required|in:0,1,2',
        ]);

        $vtdkhachhang = new vtd_KHACH_HANG;
        $vtdkhachhang->vtdMaKhachHang = $request->vtdMaKhachHang;
        $vtdkhachhang->vtdHoTenKhachHang = $request->vtdHoTenKhachHang;
        $vtdkhachhang->vtdEmail = $request->vtdEmail;
        $vtdkhachhang->vtdMatKhau = $request->vtdMatKhau;
        $vtdkhachhang->vtdDienThoai = $request->vtdDienThoai;
        $vtdkhachhang->vtdDiaChi = $request->vtdDiaChi;
        $vtdkhachhang->vtdNgayDangKy = $request->vtdNgayDangKy;
        $vtdkhachhang->vtdTrangThai = $request->vtdTrangThai;

        $vtdkhachhang->save();

        return redirect()->route('vtdadmins.vtdkhachhang');


    }

    // edit
    public function vtdEdit($id)
    {
        // Lấy khách hàng theo id
        $vtdkhachhang = vtd_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$vtdkhachhang) {
            return redirect()->route('vtdadmins.vtdkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('vtdAdmins.vtdkhachhang.vtd-edit', ['vtdkhachhang' => $vtdkhachhang]);
    }
    
    public function vtdEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'vtdMaKhachHang' => 'required|unique:vtd_khach_hang,vtdMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'vtdHoTenKhachHang' => 'required|string',
            'vtdEmail' => 'required|email|unique:vtd_khach_hang,vtdEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'vtdMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'vtdDienThoai' => 'required|numeric|unique:vtd_khach_hang,vtdDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'vtdDiaChi' => 'required|string',
            'vtdNgayDangKy' => 'required|date',
            'vtdTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $vtdkhachhang = vtd_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$vtdkhachhang) {
            return redirect()->route('vtdadmins.vtdkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $vtdkhachhang->vtdMaKhachHang = $request->vtdMaKhachHang;
        $vtdkhachhang->vtdHoTenKhachHang = $request->vtdHoTenKhachHang;
        $vtdkhachhang->vtdEmail = $request->vtdEmail;
        $vtdkhachhang->vtdMatKhau = $request->vtdMatKhau;
        $vtdkhachhang->vtdDienThoai = $request->vtdDienThoai;
        $vtdkhachhang->vtdDiaChi = $request->vtdDiaChi;
        $vtdkhachhang->vtdNgayDangKy = $request->vtdNgayDangKy;
        $vtdkhachhang->vtdTrangThai = $request->vtdTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $vtdkhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('vtdadmins.vtdkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function vtdDelete($id)
    {
        vtd_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}