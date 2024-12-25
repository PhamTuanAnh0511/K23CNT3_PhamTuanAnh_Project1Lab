<?php
use App\Http\Controllers\pta_loai_san_pham1;
use App\Http\Controllers\pta_quan_triController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admins/pta-login',[pta_quan_triController::class,'ptaLogin'])->name('admins.ptaLogin');
Route::post('/admins/pta-login',[pta_quan_triController::class,'ptaLoginSubmit'])->name('admins.ptaLoginSubmit'); 

Route::get('/admins',function(){
    return view('ptaadmins.index');
});

Route::get('/pta-admins/ptadanhmuc',function()
{
    return view('ptaadmins.ptadanhmuc');
});

Route::get('/pta-admins/pta-loai-san-pham',[pta_loai_san_pham1::class,'ptaList'])->name('ptaadmins.ptaloaisanpham');
//create
Route::get('/pta-admin/pta-loaisanpham/pta_create',[pta_loai_san_pham1::class,'ptaCreate'])->name('ptaadmins.ptaloaisanpham.Create');
Route::post('/pta-admin/pta-loaisanpham/pta_create',[pta_loai_san_pham1::class,'ptaCreateSunmit'])->name('pta_Admins.ptaloaisanpham.pta_createsubmit');
// edit
Route::get('/pta-admins/pta-loai-san-pham/pta-edit/{id}',[pta_loai_san_pham1::class,'ptaEdit'])->name('ptaadmins.ptaloaisanpham.ptaEdit');
Route::post('/pta-admins/pta-loai-san-pham/pta-edit',[pta_loai_san_pham1::class,'ptaEditSubmit'])->name('ptaadmins.ptaloaisanpham.ptaEditSubmit');
// detail
Route::get('/pta-admins/pta-loai-san-pham/pta-detail/{id}',[pta_loai_san_pham1::class,'ptaGetDetail'])->name('ptaadmins.ptaloaisanpham.ptaGetDetail');
// delete
Route::get('/pta-admins/pta-loai-san-pham/pta-delete/{id}',[pta_loai_san_pham1::class,'ptaDelete'])->name('ptaadmins.ptaloaisanpham.ptaDelete');


// san pham

// list
use App\Http\Controllers\pta_san_pham1;
Route::get('/pta-admins/pta-san-pham',[pta_san_pham1::class,'ptaList'])->name('ptaadmins.ptasanpham');
//create
Route::get('/pta-admins/pta-san-pham/pta-create',[pta_san_pham1::class,'ptaCreate'])->name('ptaadmins.ptasanpham.ptaCreate');
Route::post('/pta-admins/pta-san-pham/pta-create',[pta_san_pham1::class,'ptaCreateSubmit'])->name('ptaadmins.ptasanpham.ptaCreateSubmit');
//detail
Route::get('/pta-admins/pta-san-pham/pta-detail/{id}', [pta_san_pham1::class, 'ptaDetail'])->name('ptaadmins.ptasanpham.ptaDetail');
// Hiển thị form chỉnh sửa sản phẩm
Route::get('/pta-admins/pta-san-pham/pta-edit/{id}', [pta_san_pham1::class, 'ptaEdit'])->name('ptaadmins.ptasanpham.ptaEdit');

// Xử lý cập nhật sản phẩm
Route::post('/pta-admins/pta-san-pham/pta-edit/{id}', [pta_san_pham1::class, 'ptaEditSubmit'])->name('ptaadmins.ptasanpham.ptaEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/pta-admins/pta-san-pham/pta-delete/{id}', [pta_san_pham1::class, 'ptaDelete'])->name('ptaadmins.ptasanpham.ptaDelete');