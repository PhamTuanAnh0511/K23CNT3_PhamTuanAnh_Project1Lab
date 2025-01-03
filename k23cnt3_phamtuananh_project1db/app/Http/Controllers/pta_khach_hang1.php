<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_khach_hang; 
class pta_khach_hang1 extends Controller
{
    //
    // CRUD
    // list
    public function ptaList()
    {
        $khachhangs = pta_khach_hang::all();
        return view('ptaadmins.ptakhachhang.ptaList',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function ptaDetail($id)
    {
        $ptakhachhang = pta_khach_hang::where('id',$id)->first();
        return view('ptaadmins.ptakhachhang.ptaDetail',['ptakhachhang'=>$ptakhachhang]);
    }
    // create
    public function ptaCreate()
    {
        return view('ptaadmins.ptakhachhang.ptaCreate');
    }
    //post
    public function ptaCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'ptaMaKhachHang' => 'required|unique:pta_khach_hang,ptaMaKhachHang',
            'ptaHoTenKhachHang' => 'required|string',
            'ptaEmail' => 'required|email|unique:pta_khach_hang,ptaEmail',  
            'ptaMatKhau' => 'required|min:6',
            'ptaDienThoai' => 'required|numeric|unique:pta_khach_hang,ptaDienThoai',  
            'ptaDiaChi' => 'required|string',
            'ptaNgayDangKy' => 'required|date',  
            'ptaTrangThai' => 'required|in:0,1,2',
        ]);

        $ptakhachhang = new pta_khach_hang;
        $ptakhachhang->ptaMaKhachHang = $request->ptaMaKhachHang;
        $ptakhachhang->ptaHoTenKhachHang = $request->ptaHoTenKhachHang;
        $ptakhachhang->ptaEmail = $request->ptaEmail;
        $ptakhachhang->ptaMatKhau = $request->ptaMatKhau;
        $ptakhachhang->ptaDienThoai = $request->ptaDienThoai;
        $ptakhachhang->ptaDiaChi = $request->ptaDiaChi;
        $ptakhachhang->ptaNgayDangKy = $request->ptaNgayDangKy;
        $ptakhachhang->ptaTrangThai = $request->ptaTrangThai;

        $ptakhachhang->save();

        return redirect()->route('ptaadmins.ptakhachhang');


    }

    // edit
    public function ptaEdit($id)
    {
        // Lấy khách hàng theo id
        $ptakhachhang = pta_khach_hang::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$ptakhachhang) {
            return redirect()->route('ptaadmins.ptakhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('ptaadmins.ptakhachhang.ptaEdit', ['ptakhachhang' => $ptakhachhang]);
    }
    
    public function ptaEditsubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'ptaMaKhachHang' => 'required|unique:pta_khach_hang,ptaMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'ptaHoTenKhachHang' => 'required|string',
            'ptaEmail' => 'required|email|unique:pta_khach_hang,ptaEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'ptaMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'ptaDienThoai' => 'required|numeric|unique:pta_khach_hang,ptaDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'ptaDiaChi' => 'required|string',
            'ptaNgayDangKy' => 'required|date',
            'ptaTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $ptakhachhang = pta_khach_hang::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$ptakhachhang) {
            return redirect()->route('ptaadmins.ptakhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $ptakhachhang->ptaMaKhachHang = $request->ptaMaKhachHang;
        $ptakhachhang->ptaHoTenKhachHang = $request->ptaHoTenKhachHang;
        $ptakhachhang->ptaEmail = $request->ptaEmail;
        $ptakhachhang->ptaMatKhau = $request->ptaMatKhau;
        $ptakhachhang->ptaDienThoai = $request->ptaDienThoai;
        $ptakhachhang->ptaDiaChi = $request->ptaDiaChi;
        $ptakhachhang->ptaNgayDangKy = $request->ptaNgayDangKy;
        $ptakhachhang->ptaTrangThai = $request->ptaTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $ptakhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('ptaadmins.ptakhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function ptaDelete($id)
    {
        pta_khach_hang::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}