<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_khach_hang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class pta_signup1 extends Controller
{
    // Show the form to create a new customer
    public function ptasignup()
    {
        return view('ptauser.signup');
    }

    // Handle the form submission and store customer data
    public function ptasignupsubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'ptaHoTenKhachHang' => 'required|string|max:255',
            'ptaEmail' => 'required|email|unique:pta_khach_hang,ptaEmail',
            'ptaMatKhau' => 'required|min:6',
            'ptaDienThoai' => 'required|numeric|unique:pta_khach_hang,ptaDienThoai',
            'ptaDiaChi' => 'required|string|max:255',
        ]);

        // Generate a new customer ID (ptaMaKhachHang)
        $lastCustomer = pta_khach_hang::latest('ptaMaKhachHang')->first(); // Get the latest customer to determine the next ID
    
        // If no customers exist, start with KH001
        if ($lastCustomer) {
            $newCustomerID = 'KH' . str_pad((substr($lastCustomer->ptaMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT);  // e.g., KH001, KH002, etc.
        } else {
            $newCustomerID = 'KH001'; // First customer will be KH001
        }
    
        // Create a new customer record
        $ptakhachhang = new pta_khach_hang;
        $ptakhachhang->ptaMaKhachHang = $newCustomerID; // Automatically generated ID
        $ptakhachhang->ptaHoTenKhachHang = $request->ptaHoTenKhachHang;
        $ptakhachhang->ptaEmail = $request->ptaEmail;
        $ptakhachhang->ptaMatKhau = $request->ptaMatKhau; // Encrypt the password
        $ptakhachhang->ptaDienThoai = $request->ptaDienThoai;
        $ptakhachhang->ptaDiaChi = $request->ptaDiaChi;
        $ptakhachhang->ptaNgayDangKy = now(); // Set the current timestamp for registration date
        $ptakhachhang->ptaTrangThai = 0; // Set the default value for ptaTrangThai to 0 (inactive or unverified)
    
        // Save the new customer data
        try {
            $ptakhachhang->save();
            // Redirect to login page on success with a success message
            return redirect()->route('ptauser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            // In case of error, return to the previous page with an error message
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}