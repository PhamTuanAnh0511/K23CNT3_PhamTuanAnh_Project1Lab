<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_loai_san_pham; // Sử dụng Model User để thao tác với cơ sở dữ liệu
class pta_loai_san_pham1 extends Controller
{
    //admin CRUD
    // list
    public function ptaList()
    {
        $ptaloaisanphams = pta_loai_san_pham::all();
        return view('ptaadmins.ptaloaisanpham.ptaList',['ptaloaisanphams'=>$ptaloaisanphams]);
    }

    //create
    public function ptaCreate()
    {
        return view('ptaadmins.ptaloaisanpham.ptaCreate');
    }

    public function ptaCreatesubmit(Request $request)
    {
        $validatedData = $request->validate([
            'ptaMaLoai' => 'required|unique:pta_loai_san_pham,ptaMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'ptaTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'ptaTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        //ghi dữ liệu xuống db
        $ptaloaisanpham = new pta_loai_san_pham;
        $ptaloaisanpham->ptaMaLoai = $request->ptaMaLoai;
        $ptaloaisanpham->ptaTenLoai = $request->ptaTenLoai;
        $ptaloaisanpham->ptaTrangThai = $request->ptaTrangThai;

        $ptaloaisanpham->save();
       return redirect()->route('ptaadmins.ptaloaisanpham');
    }

    public function ptaEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $ptaloaisanpham = pta_loai_san_pham::find($id);
    
        // If the product does not exist, redirect with an error message
        if (!$ptaloaisanpham) {
            return redirect()->route('ptaadmins.ptaloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Pass the product data to the edit view
        return view('ptaadmins.ptaloaisanpham.ptaEdit', ['ptaloaisanpham' => $ptaloaisanpham]);
    }
    
    public function ptaEditsubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'ptaMaLoai' => 'required|string|max:255|unique:pta_loai_san_pham,ptaMaLoai,' . $request->id,  // Bỏ qua ptaMaLoai của bản ghi hiện tại
            'ptaTenLoai' => 'required|string|max:255',   
            'ptaTrangThai' => 'required|in:0,1',  // Validation for ptaTrangThai (0 or 1)
        ]);
    
        // Find the product by id
        $ptaloaisanpham = pta_loai_san_pham::find($request->id);
    
        // Check if the product exists
        if (!$ptaloaisanpham) {
            return redirect()->route('ptaadmins.ptaloaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $ptaloaisanpham->ptaMaLoai = $request->ptaMaLoai;
        $ptaloaisanpham->ptaTenLoai = $request->ptaTenLoai;
        $ptaloaisanpham->ptaTrangThai = $request->ptaTrangThai;
    
        // Save the updated product
        $ptaloaisanpham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('ptaadmins.ptaloaisanpham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }
    
    

    public function ptaGetDetail($id)
    {
        $ptaloaisanpham = pta_loai_san_pham::where('id', $id)->first();
        return view('ptaadmins.ptaloaisanpham.ptaDetail',['ptaloaisanpham'=>$ptaloaisanpham]);

    }

    public function ptaDelete($id)
    {
        pta_loai_san_pham::where('id',$id)->delete();
        return back()->with('loaisanpham_deleted','Đã xóa Loại Sản Phẩm thành công!');
    }

}