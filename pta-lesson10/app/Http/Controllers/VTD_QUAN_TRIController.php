<?php

namespace App\Http\Controllers;

use App\Models\vtd_QUAN_TRI; // Thêm dòng này để sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Thêm dòng này để sử dụng session

class VTD_QUAN_TRIController extends Controller
{
    // GET login (authentication)
    public function vtdLogin()
    {
        return view('vtdAdmins.vtd-login');
    }

    // POST login (authentication)
    public function vtdLoginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'vtdTaiKhoan' => 'required|string',
            'vtdMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng vtd_QUAN_TRI
        $user = vtd_QUAN_TRI::where('vtdTaiKhoan', $request->vtdTaiKhoan)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->vtdMatKhau, $user->vtdMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->vtdTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/vtd-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['vtdMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    public function vtdlist()
{
    $vtdquantris = vtd_QUAN_TRI::all(); // Lấy tất cả quản trị viên
    return view('vtdAdmins.vtdquantri.vtd-list', ['vtdquantris'=>$vtdquantris]);
}

public function vtdDetail($id)
    {
        $vtdquantri = vtd_QUAN_TRI::where('id', $id)->first();
        return view('vtdAdmins.vtdquantri.vtd-detail',['vtdquantri'=>$vtdquantri]);

    }

    //create
    // GET: Hiển thị form thêm mới quản trị viên
public function vtdCreate()
{
    return view('vtdAdmins.vtdquantri.vtd-create');
}

// POST: Xử lý form thêm mới quản trị viên
public function vtdCreateSubmit(Request $request)
{
    // Xác thực dữ liệu
    $request->validate([
        'vtdTaiKhoan' => 'required|string|unique:vtd_quan_tri,vtdTaiKhoan',
        'vtdMatKhau' => 'required|string|min:6',
        'vtdTrangThai' => 'required|in:0,1', 
    ]);

    // Tạo bản ghi mới trong cơ sở dữ liệu
    $vtdquantri = new vtd_QUAN_TRI();
    $vtdquantri->vtdTaiKhoan = $request->vtdTaiKhoan;
    $vtdquantri->vtdMatKhau = Hash::make($request->vtdMatKhau); // Mã hóa mật khẩu
    $vtdquantri->vtdTrangThai = $request->vtdTrangThai;
    $vtdquantri->save();

    // Chuyển hướng về trang danh sách với thông báo thành công
    return redirect()->route('vtdadmins.vtdquantri')->with('success', 'Thêm quản trị viên thành công');
}

// edit
// GET: Hiển thị form chỉnh sửa quản trị viên
public function vtdEdit($id)
{
    $vtdquantri = vtd_QUAN_TRI::find($id); // Lấy thông tin quản trị viên cần chỉnh sửa
    if (!$vtdquantri) {
        return redirect()->route('vtdadmins.vtdquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    return view('vtdAdmins.vtdquantri.vtd-edit', ['vtdquantri'=>$vtdquantri]);
}

// POST: Xử lý form chỉnh sửa quản trị viên
public function vtdEditSubmit(Request $request, $id)
{
    // Xác thực dữ liệu
    $request->validate([
        'vtdTaiKhoan' => 'required|string|unique:vtd_quan_tri,vtdTaiKhoan,' . $id,
        'vtdMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
        'vtdTrangThai' => 'required|in:0,1',
    ]);

    // Lấy quản trị viên cần sửa
    $vtdquantri = vtd_QUAN_TRI::find($id);
    if (!$vtdquantri) {
        return redirect()->route('vtdadmins.vtdquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }

    // Cập nhật thông tin
    $vtdquantri->vtdTaiKhoan = $request->vtdTaiKhoan;
    if ($request->vtdMatKhau) {
        $vtdquantri->vtdMatKhau = Hash::make($request->vtdMatKhau); // Cập nhật mật khẩu nếu có
    }
    $vtdquantri->vtdTrangThai = $request->vtdTrangThai;
    $vtdquantri->save();

    return redirect()->route('vtdadmins.vtdquantri')->with('success', 'Cập nhật quản trị viên thành công');
}

// delete
public function vtdDelete($id)
{
    $vtdquantri = vtd_QUAN_TRI::find($id); // Tìm quản trị viên cần xóa
    if (!$vtdquantri) {
        return redirect()->route('vtdadmins.vtdquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    $vtdquantri->delete(); // Xóa bản ghi

    return redirect()->route('vtdadmins.vtdquantri')->with('success', 'Xóa quản trị viên thành công');
}



}