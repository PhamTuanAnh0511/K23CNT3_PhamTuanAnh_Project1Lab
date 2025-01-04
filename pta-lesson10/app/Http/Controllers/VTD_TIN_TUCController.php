<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vtd_TIN_TUC;  // Assuming you have the model for TIN_TUC
use Illuminate\Support\Facades\Storage;

class VTD_TIN_TUCController extends Controller
{
    // List all news ----------------------------------------------------------------------
    // List all news with pagination
    public function vtdList()
    {
        // Sử dụng phân trang với 10 bản tin mỗi trang
        $vtdtinTucs = vtd_TIN_TUC::paginate(10);  // Sử dụng paginate thay vì all
        
        // Trả về view với dữ liệu phân trang
        return view('vtdAdmins.vtdtintuc.vtd-list', compact('vtdtinTucs'));
    }


    

    // Show the detail of a specific news item -------------------------------------------
    public function vtdDetail($id)
    {
        $vtdtinTuc = vtd_TIN_TUC::findOrFail($id);
        return view('vtdAdmins.vtdtintuc.vtd-detail', ['vtdtinTuc' => $vtdtinTuc]);
    }

    // Show the create form for a new news item ----------------------------------------
    public function vtdCreate()
    {
        return view('vtdAdmins.vtdtintuc.vtd-create');
    }

    // Handle the form submission for creating a new news item ---------------------------
    public function vtdCreateSubmit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'vtdMaTT' => 'required|unique:vtd_TIN_TUC,vtdMaTT',
            'vtdTieuDe' => 'required|string|max:255',
            'vtdMoTa' => 'required|string',
            'vtdNoiDung' => 'required|string',
            'vtdNgayDangTin' => 'required|date',
            'vtdNgayCapNhap' => 'required|date',
            'vtdHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Optional image
            'vtdTrangThai' => 'required|in:0,1',  // 0 - inactive, 1 - active
        ]);

        // Create the new news item
        $vtdtinTuc = new vtd_TIN_TUC();
        $vtdtinTuc->vtdMaTT = $request->vtdMaTT;
        $vtdtinTuc->vtdTieuDe = $request->vtdTieuDe;
        $vtdtinTuc->vtdMoTa = $request->vtdMoTa;
        $vtdtinTuc->vtdNoiDung = $request->vtdNoiDung;
        $vtdtinTuc->vtdNgayDangTin = $request->vtdNgayDangTin;
        $vtdtinTuc->vtdNgayCapNhap = $request->vtdNgayCapNhap;

        // Check if there's an image and save it
        if ($request->hasFile('vtdHinhAnh')) {
            $imagePath = $request->file('vtdHinhAnh')->store('public/img/tin_tuc');
            $vtdtinTuc->vtdHinhAnh = 'img/tin_tuc/' . basename($imagePath);
        }

        $vtdtinTuc->vtdTrangThai = $request->vtdTrangThai;
        $vtdtinTuc->save();

        return redirect()->route('vtdadmins.vtdtintuc')->with('success', 'Tin tức đã được tạo thành công.');
    }

    // Delete a news item ----------------------------------------------------------------
    public function vtdDelete($id)
    {
        $vtdtinTuc = vtd_TIN_TUC::findOrFail($id);
        $vtdtinTuc->delete();

        return back()->with('success', 'Tin tức đã được xóa thành công.');
    }

    // Show the edit form for a specific news item --------------------------------------
    public function vtdEdit($id)
    {
        $vtdtinTuc = vtd_TIN_TUC::findOrFail($id);
        return view('vtdAdmins.vtdtintuc.vtd-edit', ['vtdtinTuc' => $vtdtinTuc]);
    }

    // Handle the form submission for updating an existing news item ---------------------
    public function vtdEditSubmit(Request $request, $id)
    {
        $validated = $request->validate([
            'vtdTieuDe' => 'required|string|max:255',
            'vtdMoTa' => 'required|string|max:500',
            'vtdNoiDung' => 'required|string',
            'vtdHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vtdNgayDangTin' => 'required|date',
            'vtdNgayCapNhap' => 'nullable|date',
            'vtdTrangThai' => 'required|in:0,1',
        ]);

        // Retrieve the news article to update
        $vtdtinTuc = vtd_TIN_TUC::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('vtdHinhAnh')) {
            // Delete old image if exists
            if ($vtdtinTuc->vtdHinhAnh) {
                Storage::delete('public/' . $vtdtinTuc->vtdHinhAnh);
            }

            $imagePath = $request->file('vtdHinhAnh')->store('vtdtinTuc', 'public');
            $vtdtinTuc->vtdHinhAnh = $imagePath;
        }

        // Update the news article
        $vtdtinTuc->vtdTieuDe = $request->vtdTieuDe;
        $vtdtinTuc->vtdMoTa = $request->vtdMoTa;
        $vtdtinTuc->vtdNoiDung = $request->vtdNoiDung;
        $vtdtinTuc->vtdNgayDangTin = $request->vtdNgayDangTin;
        $vtdtinTuc->vtdNgayCapNhap = $request->vtdNgayCapNhap ?? now();
        $vtdtinTuc->vtdTrangThai = $request->vtdTrangThai;
        $vtdtinTuc->save();

        return redirect()->route('vtdadmins.vtdtintuc')->with('success', 'Tin tức đã được cập nhật!');
    }

}