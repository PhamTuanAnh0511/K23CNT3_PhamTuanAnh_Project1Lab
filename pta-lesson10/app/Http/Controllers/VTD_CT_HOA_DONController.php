<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vtd_CT_HOA_DON; 
use App\Models\vtd_SAN_PHAM; 
use App\Models\vtd_HOA_DON; 
use App\Models\vtd_KHACH_HANG; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VTD_CT_HOA_DONController extends Controller
{
    //create hoadon user

    // Controller
    public function show($sanPhamId)
    {
        $sanPham = vtd_SAN_PHAM::find($sanPhamId);

        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('vtdMaKhachHang');

        // Kiểm tra khách hàng tồn tại trong hệ thống
        $khachHang = vtd_KHACH_HANG::find($userId);

        // Truyền thông tin qua view
        return view('vtduser.hoadon', [
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
        $userId = Session::get('vtdMaKhachHang'); // Lấy ID khách hàng từ session
    
        // Kiểm tra nếu không có khách hàng trong session
        if (!$userId) {
            return redirect()->route('vtduser.login')->with('error', 'Vui lòng đăng nhập để tiếp tục!');
        }
    
        // Kiểm tra khách hàng tồn tại trong bảng vtd_KHACH_HANG
        $khachhang = vtd_KHACH_HANG::find($userId);
        if (!$khachhang) {
            return redirect()->route('vtduser.login')->with('error', 'Khách hàng không tồn tại.');
        }
    
        // Lấy thông tin sản phẩm từ bảng vtd_SAN_PHAM
        $sanPham = vtd_SAN_PHAM::find($request->vtdSanPhamId);
        if (!$sanPham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Tạo mã hóa đơn tự động (vtdMaHoaDon)
        $vtdMaHoaDon = 'HD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); // Tạo mã hóa đơn ngẫu nhiên
    
        // Tạo hóa đơn mới với thông tin lấy từ khách hàng
        $hoaDon = vtd_HOA_DON::create([
            'vtdMaHoaDon' => $vtdMaHoaDon,
            'vtdMaKhachHang' => $khachhang->id,  // Sử dụng ID của khách hàng từ bảng vtd_KHACH_HANG
            'vtdNgayHoaDon' => Carbon::now()->toDateString(),
            'vtdNgayNhan' => Carbon::now()->addDays(3)->toDateString(),
            'vtdHoTenKhachHang' => $request->vtdHoTenKhachHang,
            'vtdEmail' => $request->vtdEmail,
            'vtdDienThoai' => $request->vtdDienThoai,
            'vtdDiaChi' => $request->vtdDiaChi,
            'vtdTongGiaTri' => $sanPham->vtdDonGia * $request->vtdSoLuong, // Tính tổng giá trị
            'vtdTrangThai' => 0, // 0 nghĩa là chưa thanh toán
        ]);
     
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('hoadon.show', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    
    
    

    // xem cthoadon
    public function create($hoaDonId, $sanPhamId)
    {
        // Lấy thông tin hóa đơn và sản phẩm
        $hoaDon = vtd_HOA_DON::find($hoaDonId);
        $sanPham = vtd_SAN_PHAM::find($sanPhamId);

        // Kiểm tra nếu hóa đơn hoặc sản phẩm không tồn tại
        if (!$hoaDon || !$sanPham) {
            return redirect()->route('hoadon.index')->with('error', 'Hóa đơn hoặc sản phẩm không tồn tại.');
        }
        // Lấy số lượng từ request
        $soLuong = request('vtdSoLuong', 1); // Số lượng mặc định là 1 nếu không có giá trị
        // Truyền dữ liệu vào view
        return view('vtduser.cthoadon', [
            'hoaDon' => $hoaDon,
            'sanPham' => $sanPham,
            'soLuong' => $soLuong // Truyền số lượng vào view
        ]);
    }


    public function cthoadonshow($hoaDonId, $sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = vtd_HOA_DON::findOrFail($hoaDonId);

        // Lấy chi tiết hóa đơn từ ID
        $chiTietHoaDon = vtd_CT_HOA_DON::where('vtdHoaDonID', $hoaDonId)
                                        ->where('vtdSanPhamID', $sanPhamId)
                                        ->firstOrFail();

        // Trả về view và truyền dữ liệu
        return view('vtduser.cthoadonshow', compact('hoaDon', 'chiTietHoaDon'));
    }





    public function storecthoadon(Request $request)
    {
        // Validate các dữ liệu yêu cầu
        $validated = $request->validate([
            'vtdSanPhamID' => 'required|exists:vtd_SAN_PHAM,id',
            'vtdHoaDonID' => 'required|exists:vtd_HOA_DON,id',
            'vtdSoLuong' => 'required|integer|min:1',
        ]);
    
        // Lấy thông tin sản phẩm và hóa đơn
        $sanPham = vtd_SAN_PHAM::find($request->vtdSanPhamID);
        $hoaDon = vtd_HOA_DON::find($request->vtdHoaDonID);
    
        // Kiểm tra xem sản phẩm và hóa đơn có tồn tại không
        if (!$sanPham || !$hoaDon) {
            return redirect()->back()->with('error', 'Sản phẩm hoặc hóa đơn không tồn tại.');
        }
    
        // Kiểm tra xem chi tiết hóa đơn đã tồn tại chưa
        $chiTietHoaDon = vtd_CT_HOA_DON::where('vtdHoaDonID', $hoaDon->id)
                                        ->where('vtdSanPhamID', $sanPham->id)
                                        ->first();
    
        // Nếu chi tiết hóa đơn đã tồn tại, cập nhật số lượng và tính lại thành tiền
        if ($chiTietHoaDon) {
            // Cập nhật số lượng và tính lại tổng thành tiền
            $chiTietHoaDon->vtdSoLuongMua += $request->vtdSoLuong;  // Tăng số lượng
            $chiTietHoaDon->vtdThanhTien = $chiTietHoaDon->vtdSoLuongMua * $sanPham->vtdDonGia; // Tính lại thành tiền
            $chiTietHoaDon->save(); // Lưu cập nhật
        } else {
            // Nếu không tồn tại chi tiết hóa đơn, tạo mới chi tiết hóa đơn
            $vtdThanhTien = $request->vtdSoLuong * $sanPham->vtdDonGia;
    
            vtd_CT_HOA_DON::create([
                'vtdHoaDonID' => $hoaDon->id, // ID hóa đơn
                'vtdSanPhamID' => $sanPham->id, // ID sản phẩm
                'vtdSoLuongMua' => $request->vtdSoLuong, // Số lượng mua
                'vtdDonGiaMua' => $sanPham->vtdDonGia, // Đơn giá của sản phẩm
                'vtdThanhTien' => $vtdThanhTien, // Tổng thành tiền
                'vtdTrangThai' => 1,  // Trạng thái đơn hàng đã xác nhận
            ]);
        }
    
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('cthoadon.cthoadonshow', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    


    
    
    

    
    // thanh toán
    // Hiển thị sản phẩm khi nhấn vào "Mua"
    public function vtdthanhtoan($product_id)
    {
        // Lấy sản phẩm theo ID sử dụng model
        $sanPham = vtd_SAN_PHAM::find($product_id);

        // Kiểm tra nếu không có sản phẩm
        if (!$sanPham) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        // Trả về view với thông tin sản phẩm
        return view('vtduser.thanhtoan', compact('sanPham'));
    }

    // Lưu thông tin thanh toán (chỉ cần lưu vào bảng thanh toán nếu cần, ở đây ta không tạo bảng ThanhToan)
    public function storeThanhtoan(Request $request)
    {
        // Lấy thông tin sản phẩm từ model SanPham
        $sanPham = vtd_SAN_PHAM::find($request->product_id);

        // Kiểm tra nếu không có sản phẩm
        if (!$sanPham) {
            return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
        }

        // Tính tổng tiền thanh toán
        $tongTien = $request->vtdSoLuong * $sanPham->vtdDonGia;

        // Nếu muốn lưu vào bảng thanh toán, bạn có thể thêm logic ở đây.
        // Nhưng ở đây chỉ cần hiển thị thông tin và tính tổng tiền.

        return view('vtduser.thanhtoan', [
            'sanPham' => $sanPham,
            'vtdSoLuong' => $request->vtdSoLuong,
            'tongTien' => $tongTien
        ]);
    }

    //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdList()
    {
        $vtdcthoadons = vtd_CT_HOA_DON::all();
        return view('vtdAdmins.vtdcthoadon.vtd-list',['vtdcthoadons'=>$vtdcthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdDetail($id)
    {
        // Tìm sản phẩm theo ID
        $vtdcthoadon = vtd_CT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('vtdAdmins.vtdcthoadon.vtd-detail', ['vtdcthoadon' => $vtdcthoadon]);
    }

    // create-----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdCreate()
    {
        $vtdhoadon = vtd_HOA_DON::all();
        $vtdsanpham = VTD_SAN_PHAM::all();
        return view('vtdAdmins.vtdcthoadon.vtd-create',['vtdhoadon'=>$vtdhoadon,'vtdsanpham'=>$vtdsanpham]);
    }
    //post-----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'vtdHoaDonID' => 'required|exists:vtd_hoa_don,id',
            'vtdSanPhamID' => 'required|exists:vtd_san_pham,id',
            'vtdSoLuongMua' => 'required|numeric',  
            'vtdDonGiaMua' => 'required|numeric',
            'vtdThanhTien' => 'required|numeric',  
            'vtdTrangThai' => 'required|in:0,1,2',
        ]);
     
        // Tạo một bản ghi hóa đơn mới
        $vtdcthoadon = new vtd_CT_HOA_DON;
     
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $vtdcthoadon->vtdHoaDonID = $request->vtdHoaDonID;
        $vtdcthoadon->vtdSanPhamID = $request->vtdSanPhamID;  
        $vtdcthoadon->vtdSoLuongMua = $request->vtdSoLuongMua;
        $vtdcthoadon->vtdDonGiaMua = $request->vtdDonGiaMua;
        $vtdcthoadon->vtdThanhTien = $request->vtdThanhTien;
        $vtdcthoadon->vtdTrangThai = $request->vtdTrangThai;
     
        
     
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $vtdcthoadon->save();
     
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('vtdadmins.vtdcthoadon');
    }

    // edit-----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdEdit($id)
    {
        $vtdhoadon = vtd_HOA_DON::all(); // Lấy tất cả các hóa đơn
        $vtdsanpham = VTD_SAN_PHAM::all(); // Lấy tất cả các sản phẩm

        // Lấy chi tiết hóa đơn cần chỉnh sửa
        $vtdcthoadon = vtd_CT_HOA_DON::where('id', $id)->first();

        if (!$vtdcthoadon) {
            // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
            return redirect()->route('vtdadmins.vtdcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
        }

        // Trả về view với dữ liệu
        return view('vtdAdmins.vtdcthoadon.vtd-edit', [
            'vtdhoadon' => $vtdhoadon,
            'vtdsanpham' => $vtdsanpham,
            'vtdcthoadon' => $vtdcthoadon
        ]);
    }

    //post-----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'vtdHoaDonID' => 'required|exists:vtd_hoa_don,id',
            'vtdSanPhamID' => 'required|exists:vtd_san_pham,id',
            'vtdSoLuongMua' => 'required|numeric',  
            'vtdDonGiaMua' => 'required|numeric',
            'vtdThanhTien' => 'required|numeric',  
            'vtdTrangThai' => 'required|in:0,1,2',
        ]);
         
      
        // Tạo một bản ghi hóa đơn mới
        $vtdcthoadon = vtd_CT_HOA_DON::where('id', $id)->first();
      
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $vtdcthoadon->vtdHoaDonID = $request->vtdHoaDonID;
        $vtdcthoadon->vtdSanPhamID = $request->vtdSanPhamID;  
        $vtdcthoadon->vtdSoLuongMua = $request->vtdSoLuongMua;
        $vtdcthoadon->vtdDonGiaMua = $request->vtdDonGiaMua;
        $vtdcthoadon->vtdThanhTien = $request->vtdThanhTien;
        $vtdcthoadon->vtdTrangThai = $request->vtdTrangThai;
      
         
      
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $vtdcthoadon->save();
      
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('vtdadmins.vtdcthoadon');
    }

    //delete
    public function vtdDelete($id)
    {
        vtd_CT_HOA_DON::where('id',$id)->delete();
        return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
    }
     
}