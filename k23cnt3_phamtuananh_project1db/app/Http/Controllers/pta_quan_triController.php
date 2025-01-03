<?php

namespace App\Http\Controllers;

use App\Models\pta_quan_tri; // Thêm dòng này để sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Thêm dòng này để sử dụng session

class pta_quan_triController extends Controller
{
    // GET login (authentication)
    public function ptaLogin()
    {
        return view('ptaadmins.pta-login');
    }

    // POST login (authentication)
    public function ptaLoginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'ptaTaiKhoan' => 'required|string',
            'ptaMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng pta_quan_tri
        $user = pta_quan_tri::where('ptaTaiKhoan', $request->ptaTaiKhoan)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->ptaMatKhau, $user->ptaMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->ptaTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('pta-admins/admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['ptaMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    public function ptalist()
    {
        $ptaquantris = pta_quan_tri::all(); // Lấy tất cả quản trị viên
        return view('ptaadmins.ptaquantri.ptaList', ['ptaquantris'=>$ptaquantris]);
    }

public function ptaDetail($id)
    {
        $ptaquantri = pta_quan_tri::where('id', $id)->first();
        return view('ptaadmins.ptaquantri.ptaDetail',['ptaquantri'=>$ptaquantri]);

    }

    //create
    // GET: Hiển thị form thêm mới quản trị viên
    public function ptaCreate()
    {
        return view('ptaadmins.ptaquantri.ptaCreate');
    }

    // POST: Xử lý form thêm mới quản trị viên
    public function ptaCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
        'ptaTaiKhoan' => 'required|string|unique:pta_quan_tri,ptaTaiKhoan',
        'ptaMatKhau' => 'required|string|min:6',
        'ptaTrangThai' => 'required|in:0,1', 
        ]);

        // Tạo bản ghi mới trong cơ sở dữ liệu
        $ptaquantri = new pta_quan_tri();
        $ptaquantri->ptaTaiKhoan = $request->ptaTaiKhoan;
        $ptaquantri->ptaMatKhau = Hash::make($request->ptaMatKhau); // Mã hóa mật khẩu
        $ptaquantri->ptaTrangThai = $request->ptaTrangThai;
        $ptaquantri->save();

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('ptaadmins.ptaquantri')->with('success', 'Thêm quản trị viên thành công');
    }

    // edit
    // GET: Hiển thị form chỉnh sửa quản trị viên
    public function ptaEdit($id)
    {
        $ptaquantri = pta_quan_tri::find($id); // Lấy thông tin quản trị viên cần chỉnh sửa
        if (!$ptaquantri) {
        return redirect()->route('ptaadmins.ptaquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        return view('ptaadmins.ptaquantri.ptaEdit', ['ptaquantri'=>$ptaquantri]);
    }

    // POST: Xử lý form chỉnh sửa quản trị viên
    public function ptaEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
        'ptaTaiKhoan' => 'required|string|unique:pta_quan_tri,ptaTaiKhoan,' . $id,
        'ptaMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
        'ptaTrangThai' => 'required|in:0,1',
        ]);

        // Lấy quản trị viên cần sửa
        $ptaquantri = pta_quan_tri::find($id);
        if (!$ptaquantri) {
        return redirect()->route('ptaadmins.ptaquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }

        // Cập nhật thông tin
        $ptaquantri->ptaTaiKhoan = $request->ptaTaiKhoan;
        if ($request->ptaMatKhau) {
        $ptaquantri->ptaMatKhau = Hash::make($request->ptaMatKhau); // Cập nhật mật khẩu nếu có
        }
        $ptaquantri->ptaTrangThai = $request->ptaTrangThai;
        $ptaquantri->save();

        return redirect()->route('ptaadmins.ptaquantri')->with('success', 'Cập nhật quản trị viên thành công');
    }

     // delete
    public function ptaDelete($id)
    {
        $ptaquantri = pta_quan_tri::find($id); // Tìm quản trị viên cần xóa
        if (!$ptaquantri) {
        return redirect()->route('ptaadmins.ptaquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        $ptaquantri->delete(); // Xóa bản ghi

     return redirect()->route('ptaadmins.ptaquantri')->with('success', 'Xóa quản trị viên thành công');
    }
}