<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vtd_KHACH_HANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VTD_SIGNUPController extends Controller
{
    // Show the form to create a new customer
    public function vtdsignup()
    {
        return view('vtduser.signup');
    }

    // Handle the form submission and store customer data
    public function vtdsignupSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'vtdHoTenKhachHang' => 'required|string|max:255',
            'vtdEmail' => 'required|email|unique:vtd_khach_hang,vtdEmail',
            'vtdMatKhau' => 'required|min:6',
            'vtdDienThoai' => 'required|numeric|unique:vtd_khach_hang,vtdDienThoai',
            'vtdDiaChi' => 'required|string|max:255',
        ]);

        // Generate a new customer ID (vtdMaKhachHang)
        $lastCustomer = vtd_KHACH_HANG::latest('vtdMaKhachHang')->first(); // Get the latest customer to determine the next ID
    
        // If no customers exist, start with KH001
        if ($lastCustomer) {
            $newCustomerID = 'KH' . str_pad((substr($lastCustomer->vtdMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT);  // e.g., KH001, KH002, etc.
        } else {
            $newCustomerID = 'KH001'; // First customer will be KH001
        }
    
        // Create a new customer record
        $vtdkhachhang = new vtd_KHACH_HANG;
        $vtdkhachhang->vtdMaKhachHang = $newCustomerID; // Automatically generated ID
        $vtdkhachhang->vtdHoTenKhachHang = $request->vtdHoTenKhachHang;
        $vtdkhachhang->vtdEmail = $request->vtdEmail;
        $vtdkhachhang->vtdMatKhau = $request->vtdMatKhau; // Encrypt the password
        $vtdkhachhang->vtdDienThoai = $request->vtdDienThoai;
        $vtdkhachhang->vtdDiaChi = $request->vtdDiaChi;
        $vtdkhachhang->vtdNgayDangKy = now(); // Set the current timestamp for registration date
        $vtdkhachhang->vtdTrangThai = 0; // Set the default value for vtdTrangThai to 0 (inactive or unverified)
    
        // Save the new customer data
        try {
            $vtdkhachhang->save();
            // Redirect to login page on success with a success message
            return redirect()->route('vtduser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            // In case of error, return to the previous page with an error message
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}