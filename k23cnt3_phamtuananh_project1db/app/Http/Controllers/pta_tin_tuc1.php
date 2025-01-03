<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pta_tin_tuc;  // Assuming you have the model for tIN_tUC
use Illuminate\Support\Facades\Storage;

class pta_tin_tuc1 extends Controller
{
    // List all news ----------------------------------------------------------------------
 // List all news with pagination
public function ptaList()
{
    $ptatintucs = pta_tin_tuc::all();
        
    // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
    $ptatintucs = pta_tin_tuc::paginate(10);
    
    
    // Return the view with the paginated data
    return view('ptaadmins\ptatintuc\ptaList', ['ptatintucs' => $ptatintucs]);
}

    

    // Show the detail of a specific news item -------------------------------------------
    public function ptaDetail($id)
    {
        $ptatintuc = pta_tin_tuc::findOrFail($id);
        return view('ptaadmins.ptatintuc.ptaDetail', ['ptatintuc' => $ptatintuc]);
    }

    // Show the create form for a new news item ----------------------------------------
    public function ptaCreate()
    {
        return view('ptaadmins.ptatintuc.ptaCreate');
    }

    // Handle the form submission for creating a new news item ---------------------------
    public function ptaCreateSubmit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'ptaMatt' => 'required|unique:pta_tin_tuc,ptaMatt',
            'ptatieuDe' => 'required|string|max:255',
            'ptaMota' => 'required|string',
            'ptaNoiDung' => 'required|string',
            'ptaNgayDangtin' => 'required|date',
            'ptaNgayCapNhap' => 'required|date',
            'ptaHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Optional image
            'ptatrangthai' => 'required|in:0,1',  // 0 - inactive, 1 - active
        ]);

        // Create the new news item
        $ptatintuc = new pta_tin_tuc();
        $ptatintuc->ptaMatt = $request->ptaMatt;
        $ptatintuc->ptatieuDe = $request->ptatieuDe;
        $ptatintuc->ptaMota = $request->ptaMota;
        $ptatintuc->ptaNoiDung = $request->ptaNoiDung;
        $ptatintuc->ptaNgayDangtin = $request->ptaNgayDangtin;
        $ptatintuc->ptaNgayCapNhap = $request->ptaNgayCapNhap;

        // Check if there's an image and save it
        if ($request->hasFile('ptaHinhAnh')) {
            $imagePath = $request->file('ptaHinhAnh')->store('public/img/tin_tuc');
            $ptatintuc->ptaHinhAnh = 'img/tin_tuc/' . basename($imagePath);
        }

        $ptatintuc->ptatrangthai = $request->ptatrangthai;
        $ptatintuc->save();

        return redirect()->route('ptaadmins.ptatintuc')->with('success', 'tin tức đã được tạo thành công.');
    }

    // Delete a news item ----------------------------------------------------------------
    public function ptaDelete($id)
    {
        $ptatintuc = pta_tin_tuc::findOrFail($id);
        $ptatintuc->delete();

        return back()->with('success', 'tin tức đã được xóa thành công.');
    }

    // Show the edit form for a specific news item --------------------------------------
    public function ptaEdit($id)
    {
        $ptatintuc = pta_tin_tuc::findOrFail($id);
        return view('ptaadmins.ptatintuc.ptaEdit', ['ptatintuc' => $ptatintuc]);
    }

    // Handle the form submission for updating an existing news item ---------------------
    public function ptaEditSubmit(Request $request, $id)
{
    $validated = $request->validate([
        'ptatieuDe' => 'required|string|max:255',
        'ptaMota' => 'required|string|max:500',
        'ptaNoiDung' => 'required|string',
        'ptaHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'ptaNgayDangtin' => 'required|date',
        'ptaNgayCapNhap' => 'nullable|date',
        'ptatrangthai' => 'required|in:0,1',
    ]);

    // Retrieve the news article to update
    $ptatintuc = pta_tin_tuc::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('ptaHinhAnh')) {
        // Delete old image if exists
        if ($ptatintuc->ptaHinhAnh) {
            Storage::delete('public/' . $ptatintuc->ptaHinhAnh);
        }

        $imagePath = $request->file('ptaHinhAnh')->store('ptatintuc', 'public');
        $ptatintuc->ptaHinhAnh = $imagePath;
    }

    // Update the news article
    $ptatintuc->ptatieuDe = $request->ptatieuDe;
    $ptatintuc->ptaMota = $request->ptaMota;
    $ptatintuc->ptaNoiDung = $request->ptaNoiDung;
    $ptatintuc->ptaNgayDangtin = $request->ptaNgayDangtin;
    $ptatintuc->ptaNgayCapNhap = $request->ptaNgayCapNhap ?? now();
    $ptatintuc->ptatrangthai = $request->ptatrangthai;
    $ptatintuc->save();

    return redirect()->route('ptaadmins.ptatintuc')->with('success', 'tin tức đã được cập nhật!');
}

}