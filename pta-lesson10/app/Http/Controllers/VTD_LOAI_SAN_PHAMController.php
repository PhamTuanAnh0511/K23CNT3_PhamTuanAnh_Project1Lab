<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vtd_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
class VTD_LOAI_SAN_PHAMController extends Controller
{
    //admin CRUD
    // list
    public function vtdList()
    {
        $vtdloaisanphams = vtd_LOAI_SAN_PHAM::all();
        return view('vtdAdmins.vtdloaisanpham.vtd-list',['vtdloaisanphams'=>$vtdloaisanphams]);
    }

    //create
    public function vtdCreate()
    {
        return view('vtdAdmins.vtdloaisanpham.vtd-create');
    }

    public function vtdCreateSunmit(Request $request)
    {
        $validatedData = $request->validate([
            'vtdMaLoai' => 'required|unique:vtd_LOAI_SAN_PHAM,vtdMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'vtdTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'vtdTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        //ghi dữ liệu xuống db
        $vtdloaisanpham = new vtd_LOAI_SAN_PHAM;
        $vtdloaisanpham->vtdMaLoai = $request->vtdMaLoai;
        $vtdloaisanpham->vtdTenLoai = $request->vtdTenLoai;
        $vtdloaisanpham->vtdTrangThai = $request->vtdTrangThai;

        $vtdloaisanpham->save();
       return redirect()->route('vtdadmins.vtdloaisanpham');
    }

    public function vtdEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $vtdloaisanpham = vtd_LOAI_SAN_PHAM::find($id);
    
        // If the product does not exist, redirect with an error message
        if (!$vtdloaisanpham) {
            return redirect()->route('vtdadmins.vtdloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Pass the product data to the edit view
        return view('vtdAdmins.vtdloaisanpham.vtd-edit', ['vtdloaisanpham' => $vtdloaisanpham]);
    }
    
    public function vtdEditSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'vtdMaLoai' => 'required|string|max:255|unique:vtd_LOAI_SAN_PHAM,vtdMaLoai,' . $request->id,  // Bỏ qua vtdMaLoai của bản ghi hiện tại
            'vtdTenLoai' => 'required|string|max:255',   
            'vtdTrangThai' => 'required|in:0,1',  // Validation for vtdTrangThai (0 or 1)
        ]);
    
        // Find the product by id
        $vtdloaisanpham = vtd_LOAI_SAN_PHAM::find($request->id);
    
        // Check if the product exists
        if (!$vtdloaisanpham) {
            return redirect()->route('vtdadmins.vtdloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $vtdloaisanpham->vtdMaLoai = $request->vtdMaLoai;
        $vtdloaisanpham->vtdTenLoai = $request->vtdTenLoai;
        $vtdloaisanpham->vtdTrangThai = $request->vtdTrangThai;
    
        // Save the updated product
        $vtdloaisanpham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('vtdadmins.vtdloaisanpham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }
    
    

    public function vtdGetDetail($id)
    {
        $vtdloaisanpham = vtd_LOAI_SAN_PHAM::where('id', $id)->first();
        return view('vtdAdmins.vtdloaisanpham.vtd-detail',['vtdloaisanpham'=>$vtdloaisanpham]);

    }

    public function vtdDelete($id)
    {
        vtd_LOAI_SAN_PHAM::where('id',$id)->delete();
    return back()->with('loaisanpham_deleted','Đã xóa Loại Sản Phẩm thành công!');
    }

}