<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vtd_SAN_PHAM; 
use App\Models\vtd_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class VTD_SAN_PHAMController extends Controller
{


    
    // In your controller
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = vtd_SAN_PHAM::where('vtdTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = vtd_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('vtduser.search', compact('products', 'search'));
    }

    public function search1(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = vtd_SAN_PHAM::where('vtdTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = vtd_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('vtduser.search1', compact('products', 'search'));
    }


    // search sap pham admin
    public function searchAdmins(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = vtd_SAN_PHAM::where('vtdTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = vtd_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('vtdAdmins.vtdsanpham.vtd-search', compact('products', 'search'));
    }

     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdList()
{


    // Apply pagination and filter by vtdTrangThai
    $vtdsanphams = vtd_SAN_PHAM::where('vtdTrangThai', 0); 
                   // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
     $vtdsanphams = vtd_SAN_PHAM::paginate(5);    
    
    // Pass the paginated products to the view
    return view('vtdAdmins.vtdsanpham.vtd-list', ['vtdsanphams' => $vtdsanphams]);
}

    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function vtdDetail($id)
    {
        // Tìm sản phẩm theo ID
        $vtdsanpham = vtd_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('vtdAdmins.vtdsanpham.vtd-detail', ['vtdsanpham' => $vtdsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function vtdCreate()
      {
            // đọc dữ liệu từ vtd_LOAI_SAN_PHAM
            $vtdloaisanpham = vtd_LOAI_SAN_PHAM::all();
          return view('vtdAdmins.vtdsanpham.vtd-create',['vtdloaisanpham'=>$vtdloaisanpham]);
      }
     

     // Controller
public function vtdCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'vtdMaSanPham' => 'required|unique:vtd_SAN_PHAM,vtdMaSanPham',
        'vtdTenSanPham' => 'required|string|max:255',
        'vtdHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'vtdSoLuong' => 'required|numeric|min:1',
        'vtdDonGia' => 'required|numeric',
        'vtdMaLoai' => 'required|exists:vtd_LOAI_SAN_PHAM,id',
        'vtdTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng vtd_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $vtdsanpham = new vtd_SAN_PHAM;
    $vtdsanpham->vtdMaSanPham = $request->vtdMaSanPham;
    $vtdsanpham->vtdTenSanPham = $request->vtdTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('vtdHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('vtdHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->vtdMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $vtdsanpham->vtdHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $vtdsanpham->vtdSoLuong = $request->vtdSoLuong;
    $vtdsanpham->vtdDonGia = $request->vtdDonGia;
    $vtdsanpham->vtdMaLoai = $request->vtdMaLoai;
    $vtdsanpham->vtdTrangThai = $request->vtdTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $vtdsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('vtdadims.vtdsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function vtddelete($id)
{
    vtd_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function vtdEdit($id)
    {
       // Tìm sản phẩm theo ID
    $vtdsanpham = VTD_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng vtd_LOAI_SAN_PHAM
    $vtdloaisanpham = Vtd_LOAI_SAN_PHAM::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('vtdAdmins.vtdsanpham.vtd-edit', [
        'vtdsanpham' => $vtdsanpham,
        'vtdloaisanpham' => $vtdloaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function vtdEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'vtdMaSanPham' => 'required|max:20',
        'vtdTenSanPham' => 'required|max:255',
        'vtdHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'vtdSoLuong' => 'required|integer',
        'vtdDonGia' => 'required|numeric',
        'vtdMaLoai' => 'required|max:10',
        'vtdTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $vtdsanpham = VTD_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $vtdsanpham->vtdMaSanPham = $request->vtdMaSanPham;
    $vtdsanpham->vtdTenSanPham = $request->vtdTenSanPham;
    $vtdsanpham->vtdSoLuong = $request->vtdSoLuong;
    $vtdsanpham->vtdDonGia = $request->vtdDonGia;
    $vtdsanpham->vtdMaLoai = $request->vtdMaLoai;
    $vtdsanpham->vtdTrangThai = $request->vtdTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('vtdHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($vtdsanpham->vtdHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $vtdsanpham->vtdHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $vtdsanpham->vtdHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('vtdHinhAnh')->store('img/san_pham', 'public');
        $vtdsanpham->vtdHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $vtdsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('vtdadims.vtdsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}