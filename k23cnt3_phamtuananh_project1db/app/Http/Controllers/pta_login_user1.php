<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_khach_hang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class pta_login_user1 extends Controller
{
    // Show login form
    public function ptaLogin()
    {
        return view('ptauser.login');
    }

    // Handle login form submission
    public function ptaLoginSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'ptaEmail' => 'required|email',
            'ptaMatKhau' => 'required|string',
        ]);

        // Tìm người dùng theo email
        $user = pta_khach_hang::where('ptaEmail', $request->ptaEmail)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->ptaMatKhau, $user->ptaMatKhau)) {
            // Đăng nhập người dùng
            Auth::login($user);

            // Lưu thông tin người dùng vào session
            Session::put('username1', $user->ptaHoTenKhachHang);  // Lưu tên người dùng
            Session::put('ptaEmail', $user->ptaEmail);  // Lưu email
            Session::put('ptaDienThoai', $user->ptaDienThoai);  // Lưu số điện thoại
            Session::put('ptaDiaChi', $user->ptaDiaChi);  // Lưu địa chỉ
            Session::put('ptaMaKhachHang', $user->ptaMaKhachHang);  // Lưu mã khách hàng

            // Lưu trữ các thông tin cần thiết vào session

            // Chuyển hướng người dùng tới trang chủ sau khi đăng nhập thành công
            return redirect()->route('ptauser.home1')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Nếu thông tin không chính xác, trả về lỗi
            return redirect()->back()->withErrors(['ptaEmail' => 'Email hoặc Mật khẩu không đúng']);
        }
    }

    
    

}