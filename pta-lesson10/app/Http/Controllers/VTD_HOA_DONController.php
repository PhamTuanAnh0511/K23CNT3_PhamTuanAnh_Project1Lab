<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vtd_HOA_DON; 
use App\Models\vtd_KHACH_HANG; 
use App\Models\vtd_SAN_PHAM; 
class VTD_HOA_DONController extends Controller
{
    //
    public function show($hoaDonId,$sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = vtd_HOA_DON::findOrFail($hoaDonId);
        $sanPham = vtd_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn
        return view('vtduser.hoadonshow', compact('hoaDon','sanPham'));
    }


    //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdList()
    {
        $vtdhoadons = vtd_HOA_DON::all();
        return view('vtdAdmins.vtdhoadon.vtd-list',['vtdhoadons'=>$vtdhoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdDetail($id)
    {
        // Tìm sản phẩm theo ID
        $vtdhoadon = vtd_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('vtdAdmins.vtdhoadon.vtd-detail', ['vtdhoadon' => $vtdhoadon]);
    }
    // create
    public function vtdCreate()
    {
        $vtdkhachhang = vtd_KHACH_HANG::all();
        return view('vtdAdmins.vtdhoadon.vtd-create',['vtdkhachhang'=>$vtdkhachhang]);
    }
    //post
    public function vtdCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'vtdMaHoaDon' => 'required|unique:vtd_hoa_don,vtdMaHoaDon',
            'vtdMaKhachHang' => 'required|exists:vtd_khach_hang,id',
            'vtdNgayHoaDon' => 'required|date',  
            'vtdNgayNhan' => 'required|date',
            'vtdHoTenKhachHang' => 'required|string',  
            'vtdEmail' => 'required|email',
            'vtdDienThoai' => 'required|numeric',  
            'vtdDiaChi' => 'required|string',  
            'vtdTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'vtdTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $vtdhoadon = new vtd_HOA_DON;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $vtdhoadon->vtdMaHoaDon = $request->vtdMaHoaDon;
        $vtdhoadon->vtdMaKhachHang = $request->vtdMaKhachHang;  // Giả sử đây là khóa ngoại
        $vtdhoadon->vtdHoTenKhachHang = $request->vtdHoTenKhachHang;
        $vtdhoadon->vtdEmail = $request->vtdEmail;
        $vtdhoadon->vtdDienThoai = $request->vtdDienThoai;
        $vtdhoadon->vtdDiaChi = $request->vtdDiaChi;
        
        // Lưu 'vtdTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $vtdhoadon->vtdTongGiaTri = (double) $request->vtdTongGiaTri; // Chuyển đổi sang double
        
        $vtdhoadon->vtdTrangThai = $request->vtdTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $vtdhoadon->vtdNgayHoaDon = $request->vtdNgayHoaDon;
        $vtdhoadon->vtdNgayNhan = $request->vtdNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $vtdhoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('vtdadmins.vtdhoadon');
    }
    


    public function vtdEdit($id)
    {
        $vtdhoadon = vtd_HOA_DON::where('id', $id)->first();
        $vtdkhachhang = vtd_KHACH_HANG::all();
        return view('vtdAdmins.vtdhoadon.vtd-edit',['vtdkhachhang'=>$vtdkhachhang,'vtdhoadon'=>$vtdhoadon]);
    }
    //post
    public function vtdEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'vtdMaHoaDon' => 'required|unique:vtd_hoa_don,vtdMaHoaDon,'. $id,
            'vtdMaKhachHang' => 'required|exists:vtd_khach_hang,id',
            'vtdNgayHoaDon' => 'required|date',  
            'vtdNgayNhan' => 'required|date',
            'vtdHoTenKhachHang' => 'required|string',  
            'vtdEmail' => 'required|email',
            'vtdDienThoai' => 'required|numeric',  
            'vtdDiaChi' => 'required|string',  
            'vtdTongGiaTri' => 'required|numeric', 
            'vtdTrangThai' => 'required|in:0,1,2',
        ]);
    
        $vtdhoadon = vtd_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $vtdhoadon->vtdMaHoaDon = $request->vtdMaHoaDon;
        $vtdhoadon->vtdMaKhachHang = $request->vtdMaKhachHang;  // Giả sử đây là khóa ngoại
        $vtdhoadon->vtdHoTenKhachHang = $request->vtdHoTenKhachHang;
        $vtdhoadon->vtdEmail = $request->vtdEmail;
        $vtdhoadon->vtdDienThoai = $request->vtdDienThoai;
        $vtdhoadon->vtdDiaChi = $request->vtdDiaChi;
        
        // Lưu 'vtdTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $vtdhoadon->vtdTongGiaTri = (double) $request->vtdTongGiaTri; // Chuyển đổi sang double
        
        $vtdhoadon->vtdTrangThai = $request->vtdTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $vtdhoadon->vtdNgayHoaDon = $request->vtdNgayHoaDon;
        $vtdhoadon->vtdNgayNhan = $request->vtdNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $vtdhoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('vtdadmins.vtdhoadon');
    }
    
    //delete
    public function vtdDelete($id)
    {
        vtd_HOA_DON::where('id',$id)->delete();
        return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
    }
}