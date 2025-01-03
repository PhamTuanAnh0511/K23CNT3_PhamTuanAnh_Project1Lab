<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_hoa_don; 
use App\Models\pta_khach_hang; 
use App\Models\pta_san_pham; 
class pta_hoa_don1 extends Controller
{
    //
    public function show($hoaDonId,$sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = pta_hoa_don::findOrFail($hoaDonId);
        $sanPham = pta_san_pham::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn
        return view('ptauser.hoadonshow', compact('hoaDon','sanPham'));
    }


      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaList()
    {
        $ptahoadons = pta_hoa_don::all();
        return view('ptaadmins.ptahoadon.ptaList',['ptahoadons'=>$ptahoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ptahoadon = pta_hoa_don::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('ptaadmins.ptahoadon.ptaDetail', ['ptahoadon' => $ptahoadon]);
    }
    // create
    public function ptaCreate()
    {
        $ptakhachhang = pta_khach_hang::all();
        return view('ptaadmins.ptahoadon.ptaCreate',['ptakhachhang'=>$ptakhachhang]);
    }
    //post
    public function ptaCreatesubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ptaMaHoaDon' => 'required|unique:pta_hoa_don,ptaMaHoaDon',
            'ptaMaKhachHang' => 'required|exists:pta_khach_hang,id',
            'ptaNgayHoaDon' => 'required|date',  
            'ptaNgayNhan' => 'required|date',
            'ptaHoTenKhachHang' => 'required|string',  
            'ptaEmail' => 'required|email',
            'ptaDienThoai' => 'required|numeric',  
            'ptaDiaChi' => 'required|string',  
            'ptaTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'ptaTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $ptahoadon = new pta_hoa_don;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ptahoadon->ptaMaHoaDon = $request->ptaMaHoaDon;
        $ptahoadon->ptaMaKhachHang = $request->ptaMaKhachHang;  // Giả sử đây là khóa ngoại
        $ptahoadon->ptaHoTenKhachHang = $request->ptaHoTenKhachHang;
        $ptahoadon->ptaEmail = $request->ptaEmail;
        $ptahoadon->ptaDienThoai = $request->ptaDienThoai;
        $ptahoadon->ptaDiaChi = $request->ptaDiaChi;
        
        // Lưu 'ptaTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $ptahoadon->ptaTongGiaTri = (double) $request->ptaTongGiaTri; // Chuyển đổi sang double
        
        $ptahoadon->ptaTrangThai = $request->ptaTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $ptahoadon->ptaNgayHoaDon = $request->ptaNgayHoaDon;
        $ptahoadon->ptaNgayNhan = $request->ptaNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ptahoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ptaadmins.ptahoadon');
    }
    


    public function ptaEdit($id)
    {
        $ptahoadon = pta_hoa_don::where('id', $id)->first();
        $ptakhachhang = pta_khach_hang::all();
        return view('ptaadmins.ptahoadon.ptaEdit',['ptakhachhang'=>$ptakhachhang,'ptahoadon'=>$ptahoadon]);
    }
    //post
    public function ptaEditsubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ptaMaHoaDon' => 'required|unique:pta_hoa_don,ptaMaHoaDon,'. $id,
            'ptaMaKhachHang' => 'required|exists:pta_khach_hang,id',
            'ptaNgayHoaDon' => 'required|date',  
            'ptaNgayNhan' => 'required|date',
            'ptaHoTenKhachHang' => 'required|string',  
            'ptaEmail' => 'required|email',
            'ptaDienThoai' => 'required|numeric',  
            'ptaDiaChi' => 'required|string',  
            'ptaTongGiaTri' => 'required|numeric', 
            'ptaTrangThai' => 'required|in:0,1,2',
        ]);
    
        $ptahoadon = pta_hoa_don::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ptahoadon->ptaMaHoaDon = $request->ptaMaHoaDon;
        $ptahoadon->ptaMaKhachHang = $request->ptaMaKhachHang;  // Giả sử đây là khóa ngoại
        $ptahoadon->ptaHoTenKhachHang = $request->ptaHoTenKhachHang;
        $ptahoadon->ptaEmail = $request->ptaEmail;
        $ptahoadon->ptaDienThoai = $request->ptaDienThoai;
        $ptahoadon->ptaDiaChi = $request->ptaDiaChi;
        
        // Lưu 'ptaTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $ptahoadon->ptaTongGiaTri = (double) $request->ptaTongGiaTri; // Chuyển đổi sang double
        
        $ptahoadon->ptaTrangThai = $request->ptaTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $ptahoadon->ptaNgayHoaDon = $request->ptaNgayHoaDon;
        $ptahoadon->ptaNgayNhan = $request->ptaNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ptahoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ptaadmins.ptahoadon');
    }
    
        //delete
        public function ptaDelete($id)
        {
            pta_hoa_don::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}