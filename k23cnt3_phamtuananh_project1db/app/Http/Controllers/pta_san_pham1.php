<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_san_pham; 
use App\Models\pta_loai_san_pham; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class pta_san_pham1 extends Controller
{


    
    // In your controller
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = pta_san_pham::where('ptaTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = pta_san_pham::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('ptauser.search', compact('products', 'search'));
    }

    public function search1(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = pta_san_pham::where('ptaTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = pta_san_pham::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('ptauser.search1', compact('products', 'search'));
    }


    // search sap pham admin
    public function searchadmins(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = pta_san_pham::where('ptaTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = pta_san_pham::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('ptaadmins.ptasanpham.ptaSearch', compact('products', 'search'));
    }

    //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaList()
    {


        // Apply pagination and filter by ptaTrangThai
        $ptasanphams = pta_san_pham::where('ptaTrangThai', 0); 
         // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
        $ptasanphams = pta_san_pham::paginate(5);    
    
        // Pass the paginated products to the view
        return view('ptaadmins.ptasanpham.ptaList', ['ptasanphams' => $ptasanphams]);
    }

    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaDetail($id)
    {
        // Tìm sản phẩm theo ID
        $ptasanpham = pta_san_pham::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('ptaadmins.ptasanpham.ptaDetail', ['ptasanpham' => $ptasanpham]);
    }

    //create  -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaCreate()
    {
        // đọc dữ liệu từ pta_loai_san_pham
        $ptaloaisanpham = pta_loai_san_pham::all();
        return view('ptaadmins.ptasanpham.ptaCreate',['ptaloaisanpham'=>$ptaloaisanpham]);
    }
     

    // Controller
    public function ptaCreatesubmit(Request $request)
    {

        // Validate input
        $validatedData = $request->validate([
        'ptaMaSanPham' => 'required|unique:pta_san_pham,ptaMaSanPham',
        'ptaTenSanPham' => 'required|string|max:255',
        'ptaHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'ptaSoLuong' => 'required|numeric|min:1',
        'ptaDonGia' => 'required|numeric',
        'ptaMaLoai' => 'required|exists:pta_loai_san_pham,id',
        'ptaTrangThai' => 'required|in:0,1',
        ]);

        // Khởi tạo đối tượng pta_san_pham và lưu thông tin vào cơ sở dữ liệu
        $ptasanpham = new pta_san_pham;
        $ptasanpham->ptaMaSanPham = $request->ptaMaSanPham;
        $ptasanpham->ptaTenSanPham = $request->ptaTenSanPham;

        // Kiểm tra nếu có tệp hình ảnh
        if ($request->hasFile('ptaHinhAnh')) {
            // Lấy tệp hình ảnh
            $file = $request->file('ptaHinhAnh');

            // Kiểm tra nếu tệp hợp lệ
            if ($file->isValid()) {
                // Tạo tên tệp dựa trên mã sản phẩm
                $fileName = $request->ptaMaSanPham . '.' . $file->extension();

                // Lưu tệp vào thư mục public/img/san_pham
                $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

                // Lưu đường dẫn vào cơ sở dữ liệu
                $ptasanpham->ptaHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
            }
        }

        // Lưu các thông tin còn lại vào cơ sở dữ liệu
        $ptasanpham->ptaSoLuong = $request->ptaSoLuong;
        $ptasanpham->ptaDonGia = $request->ptaDonGia;
        $ptasanpham->ptaMaLoai = $request->ptaMaLoai;
        $ptasanpham->ptaTrangThai = $request->ptaTrangThai;

        // Lưu dữ liệu vào cơ sở dữ liệu
        $ptasanpham->save();

        // Chuyển hướng người dùng về trang danh sách sản phẩm
        return redirect()->route('ptaadmins.ptasanpham');
    }

    //Delete    -----------------------------------------------------------------------------------------------------------------------------------------

    public function ptaDelete($id)
    {
        pta_san_pham::where('id',$id)->Delete();
        return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
    }

    // edit -----------------------------------------------------------------------------------------------------------------------------------------
    public function ptaEdit($id)
    {
       // Tìm sản phẩm theo ID
        $ptasanpham = pta_san_pham::findOrFail($id);

        // Lấy tất cả các loại sản phẩm từ bảng pta_loai_san_pham
        $ptaloaisanpham = pta_loai_san_pham::all();

        // Trả về view với dữ liệu sản phẩm và loại sản phẩm
        return view('ptaadmins.ptasanpham.ptaEdit', [
            'ptasanpham' => $ptasanpham,
            'ptaloaisanpham' => $ptaloaisanpham
        ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function ptaEditsubmit(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'ptaMaSanPham' => 'required|max:20',
            'ptaTenSanPham' => 'required|max:255',
            'ptaHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ptaSoLuong' => 'required|integer',
            'ptaDonGia' => 'required|numeric',
            'ptaMaLoai' => 'required|max:10',
            'ptaTrangThai' => 'required|in:0,1',
        ]);

        // Tìm sản phẩm cần chỉnh sửa
        $ptasanpham = pta_san_pham::findOrFail($id);

        // Cập nhật thông tin sản phẩm
        $ptasanpham->ptaMaSanPham = $request->ptaMaSanPham;
        $ptasanpham->ptaTenSanPham = $request->ptaTenSanPham;
        $ptasanpham->ptaSoLuong = $request->ptaSoLuong;
        $ptasanpham->ptaDonGia = $request->ptaDonGia;
        $ptasanpham->ptaMaLoai = $request->ptaMaLoai;
        $ptasanpham->ptaTrangThai = $request->ptaTrangThai;

        // Kiểm tra nếu có hình ảnh mới
        if ($request->hasFile('ptaHinhAnh')) {
            // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
            if ($ptasanpham->ptaHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $ptasanpham->ptaHinhAnh)) {
                // Xóa file cũ nếu tồn tại
                Storage::disk('public')->Delete('img/san_pham/' . $ptasanpham->ptaHinhAnh);
            }
            // Lưu hình ảnh mới
            $imagePath = $request->file('ptaHinhAnh')->store('img/san_pham', 'public');
            $ptasanpham->ptaHinhAnh = $imagePath;
        }

        // Lưu thông tin sản phẩm đã chỉnh sửa
        $ptasanpham->save();

        // Redirect về trang danh sách sản phẩm
        return redirect()->route('ptaadmins.ptasanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    

}
