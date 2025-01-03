<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_ct_hoa_don; 
use App\Models\pta_san_pham; 
use App\Models\pta_hoa_don; 
use App\Models\pta_khach_hang; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class pta_ct_hoa_don1 extends Controller
{
   //Create hoadon user

  // Controller
    public function show($sanPhamId)
    {
        $sanPham = pta_san_pham::find($sanPhamId);

        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('ptaMaKhachHang');

        // Kiểm tra khách hàng tồn tại trong hệ thống
        $khachHang = pta_khach_hang::find($userId);

        // Truyền thông tin qua view
        return view('ptauser.hoadon', [
            'sanPham' => $sanPham,
            'khachHang' => $khachHang, // Truyền thông tin khách hàng vào view
        ]);
    }
  

  
  


   /**
    * Xử lý khi người dùng nhấn "Mua", tạo hóa đơn tự động.
    */
    public function store(Request $request)
    {
        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('ptaMaKhachHang'); // Lấy ID khách hàng từ session
    
        // Kiểm tra nếu không có khách hàng trong session
        if (!$userId) {
            return redirect()->route('ptauser.login')->with('error', 'Vui lòng đăng nhập để tiếp tục!');
        }
    
        // Kiểm tra khách hàng tồn tại trong bảng pta_khach_hang
        $khachhang = pta_khach_hang::find($userId);
        if (!$khachhang) {
            return redirect()->route('ptauser.login')->with('error', 'Khách hàng không tồn tại.');
        }
    
        // Lấy thông tin sản phẩm từ bảng pta_san_pham
        $sanPham = pta_san_pham::find($request->ptaSanPhamId);
        if (!$sanPham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Tạo mã hóa đơn tự động (ptaMaHoaDon)
        $ptaMaHoaDon = 'HD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); // Tạo mã hóa đơn ngẫu nhiên
    
        // Tạo hóa đơn mới với thông tin lấy từ khách hàng
        $hoaDon = pta_hoa_don::Create([
            'ptaMaHoaDon' => $ptaMaHoaDon,
            'ptaMaKhachHang' => $khachhang->id,  // Sử dụng ID của khách hàng từ bảng pta_khach_hang
            'ptaNgayHoaDon' => Carbon::now()->toDateString(),
            'ptaNgayNhan' => Carbon::now()->addDays(3)->toDateString(),
            'ptaHoTenKhachHang' => $request->ptaHoTenKhachHang,
            'ptaEmail' => $request->ptaEmail,
            'ptaDienThoai' => $request->ptaDienThoai,
            'ptaDiaChi' => $request->ptaDiaChi,
            'ptaTongGiaTri' => $sanPham->ptaDonGia * $request->ptaSoLuong, // Tính tổng giá trị
            'ptaTrangThai' => 0, // 0 nghĩa là chưa thanh toán
        ]);
     
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('hoadon.show', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    
    
    

    // xem cthoadon
    public function Create($hoaDonId, $sanPhamId)
    {
        // Lấy thông tin hóa đơn và sản phẩm
        $hoaDon = pta_hoa_don::find($hoaDonId);
        $sanPham = pta_san_pham::find($sanPhamId);

        // Kiểm tra nếu hóa đơn hoặc sản phẩm không tồn tại
        if (!$hoaDon || !$sanPham) {
            return redirect()->route('hoadon.index')->with('error', 'Hóa đơn hoặc sản phẩm không tồn tại.');
        }
        // Lấy số lượng từ request
        $soLuong = request('ptaSoLuong', 1); // Số lượng mặc định là 1 nếu không có giá trị
        // Truyền dữ liệu vào view
        return view('ptauser.cthoadon', [
            'hoaDon' => $hoaDon,
            'sanPham' => $sanPham,
            'soLuong' => $soLuong // Truyền số lượng vào view
        ]);
    }


    public function cthoadonshow($hoaDonId, $sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = pta_hoa_don::findOrFail($hoaDonId);

        // Lấy chi tiết hóa đơn từ ID
        $chiTietHoaDon = pta_ct_hoa_don::where('ptaHoaDonID', $hoaDonId)
                                    ->where('ptaSanPhamID', $sanPhamId)
                                    ->firstOrFail();

        // Trả về view và truyền dữ liệu
        return view('ptaUser.cthuchoadonshow', compact('hoaDon', 'chiTietHoaDon'));
    }





    public function storecthoadon(Request $request)
    {
        // Validate các dữ liệu yêu cầu
        $validated = $request->validate([
            'ptaSanPhamID' => 'required|exists:pta_san_pham,id',
            'ptaHoaDonID' => 'required|exists:pta_hoa_don,id',
            'ptaSoLuong' => 'required|integer|min:1',
        ]);
    
        // Lấy thông tin sản phẩm và hóa đơn
        $sanPham = pta_san_pham::find($request->ptaSanPhamID);
        $hoaDon = pta_hoa_don::find($request->ptaHoaDonID);
    
        // Kiểm tra xem sản phẩm và hóa đơn có tồn tại không
        if (!$sanPham || !$hoaDon) {
            return redirect()->back()->with('error', 'Sản phẩm hoặc hóa đơn không tồn tại.');
        }
    
        // Kiểm tra xem chi tiết hóa đơn đã tồn tại chưa
        $chiTietHoaDon = pta_ct_hoa_don::where('ptaHoaDonID', $hoaDon->id)
                                        ->where('ptaSanPhamID', $sanPham->id)
                                        ->first();
    
        // Nếu chi tiết hóa đơn đã tồn tại, cập nhật số lượng và tính lại thành tiền
        if ($chiTietHoaDon) {
            // Cập nhật số lượng và tính lại tổng thành tiền
            $chiTietHoaDon->ptaSoLuongMua += $request->ptaSoLuong;  // Tăng số lượng
            $chiTietHoaDon->ptaThanhTien = $chiTietHoaDon->ptaSoLuongMua * $sanPham->ptaDonGia; // Tính lại thành tiền
            $chiTietHoaDon->save(); // Lưu cập nhật
        } else {
            // Nếu không tồn tại chi tiết hóa đơn, tạo mới chi tiết hóa đơn
            $ptaThanhTien = $request->ptaSoLuong * $sanPham->ptaDonGia;
    
            pta_ct_hoa_don::Create([
                'ptaHoaDonID' => $hoaDon->id, // ID hóa đơn
                'ptaSanPhamID' => $sanPham->id, // ID sản phẩm
                'ptaSoLuongMua' => $request->ptaSoLuong, // Số lượng mua
                'ptaDonGiaMua' => $sanPham->ptaDonGia, // Đơn giá của sản phẩm
                'ptaThanhTien' => $ptaThanhTien, // Tổng thành tiền
                'ptaTrangThai' => 1,  // Trạng thái đơn hàng đã xác nhận
            ]);
        }
    
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('cthoadon.cthoadonshow', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    


    
    
    

    
    // thanh toán
    // Hiển thị sản phẩm khi nhấn vào "Mua"
    public function ptathanhtoan($product_id)
    {
        // Lấy sản phẩm theo ID sử dụng model
        $sanPham = pta_san_pham::find($product_id);

        // Kiểm tra nếu không có sản phẩm
        if (!$sanPham) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        // Trả về view với thông tin sản phẩm
        return view('ptauser.thanhtoan', compact('sanPham'));
    }

    // Lưu thông tin thanh toán (chỉ cần lưu vào bảng thanh toán nếu cần, ở đây ta không tạo bảng ThanhToan)
    public function storeThanhtoan(Request $request)
    {
        // Lấy thông tin sản phẩm từ model SanPham
        $sanPham = pta_san_pham::find($request->product_id);

        // Kiểm tra nếu không có sản phẩm
        if (!$sanPham) {
         return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
        }

        // Tính tổng tiền thanh toán
        $tongTien = $request->ptaSoLuong * $sanPham->ptaDonGia;

        // Nếu muốn lưu vào bảng thanh toán, bạn có thể thêm logic ở đây.
        // Nhưng ở đây chỉ cần hiển thị thông tin và tính tổng tiền.

        return view('ptauser.thanhtoan', [
         'sanPham' => $sanPham,
         'ptaSoLuong' => $request->ptaSoLuong,
         'tongTien' => $tongTien
        ]);
    }

    //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaList()
    {
        $ptacthoadons = pta_ct_hoa_don::all();
        return view('ptaadmins.ptacthoadon.ptaList',['ptacthoadons'=>$ptacthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ptacthoadon = pta_ct_hoa_don::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('ptaadmins.ptacthoadon.ptaDetail', ['ptacthoadon' => $ptacthoadon]);
    }

    // Create-----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaCreate()
    {
        $ptahoadon = pta_hoa_don::all();
        $ptasanpham = pta_san_pham::all();
        return view('ptaadmins.ptacthoadon.ptaCreate',['ptahoadon'=>$ptahoadon,'ptasanpham'=>$ptasanpham]);
    }
    //post-----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ptaHoaDonID' => 'required|exists:pta_hoa_don,id',
            'ptaSanPhamID' => 'required|exists:pta_san_pham,id',
            'ptaSoLuongMua' => 'required|numeric',  
            'ptaDonGiaMua' => 'required|numeric',
            'ptaThanhTien' => 'required|numeric',  
            'ptaTrangThai' => 'required|in:0,1,2',
        ]);
     
        // Tạo một bản ghi hóa đơn mới
        $ptacthoadon = new pta_ct_hoa_don;
     
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ptacthoadon->ptaHoaDonID = $request->ptaHoaDonID;
        $ptacthoadon->ptaSanPhamID = $request->ptaSanPhamID;  
        $ptacthoadon->ptaSoLuongMua = $request->ptaSoLuongMua;
        $ptacthoadon->ptaDonGiaMua = $request->ptaDonGiaMua;
        $ptacthoadon->ptaThanhTien = $request->ptaThanhTien;
        $ptacthoadon->ptaTrangThai = $request->ptaTrangThai;
     
        
     
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ptacthoadon->save();
     
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ptaadmins.ptacthoadon');
    }

    // edit-----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaEdit($id)
    {
        $ptahoadon = pta_hoa_don::all(); // Lấy tất cả các hóa đơn
        $ptasanpham = pta_san_pham::all(); // Lấy tất cả các sản phẩm

        // Lấy chi tiết hóa đơn cần chỉnh sửa
        $ptacthoadon = pta_ct_hoa_don::where('id', $id)->first();

        if (!$ptacthoadon) {
            // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
            return redirect()->route('ptaadmins.ptacthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
        }

        // Trả về view với dữ liệu
        return view('ptaAdmins.ptacthoadon.ptaEdit', [
            'ptahoadon' => $ptahoadon,
            'ptasanpham' => $ptasanpham,
            'ptacthoadon' => $ptacthoadon
        ]);
    }

    //post-----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'ptaHoaDonID' => 'required|exists:pta_hoa_don,id',
            'ptaSanPhamID' => 'required|exists:pta_san_pham,id',
            'ptaSoLuongMua' => 'required|numeric',  
            'ptaDonGiaMua' => 'required|numeric',
            'ptaThanhTien' => 'required|numeric',  
            'ptaTrangThai' => 'required|in:0,1,2',
        ]);
         
      
        // Tạo một bản ghi hóa đơn mới
        $ptacthoadon = pta_ct_hoa_don::where('id', $id)->first();
      
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $ptacthoadon->ptaHoaDonID = $request->ptaHoaDonID;
        $ptacthoadon->ptaSanPhamID = $request->ptaSanPhamID;  
        $ptacthoadon->ptaSoLuongMua = $request->ptaSoLuongMua;
        $ptacthoadon->ptaDonGiaMua = $request->ptaDonGiaMua;
        $ptacthoadon->ptaThanhTien = $request->ptaThanhTien;
        $ptacthoadon->ptaTrangThai = $request->ptaTrangThai;
      
         
      
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $ptacthoadon->save();
      
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('ptaadmins.ptacthoadon');
    }

    //delete
    public function ptaDelete($id)
    {
        pta_ct_hoa_don::where('id',$id)->delete();
        return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
    }
     
}