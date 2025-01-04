<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VTD_LOAI_SAN_PHAMController;
use App\Http\Controllers\VTD_SAN_PHAMController;
use App\Http\Controllers\VTD_KHACH_HANGcontroller;
use App\Http\Controllers\VTD_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\VTD_HOA_DONController;
use App\Http\Controllers\VTD_CT_HOA_DONController;
use App\Http\Controllers\VTD_TIN_TUCController;
use App\Http\Controllers\VTD_LOGIN_USERController;
use App\Http\Controllers\VTD_SIGNUPController;

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


// admins login --------------------------------------------------------------------------------------------------------------------------------------
use App\Http\Controllers\VTD_QUAN_TRIController;
Route::get('/', [VTD_QUAN_TRIController::class, 'vtdLogin'])->name('admins.vtdLogin');
Route::post('/', [VTD_QUAN_TRIController::class, 'vtdLoginSubmit'])->name('admins.vtdLoginSubmit');


#admins - route--------------------------------------------------------------------------------------------------------------------------------------
route::get('/vtd-admins',function(){
    return view('vtdAdmins.index');
});
#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/vtd-admins/vtddanhsachquantri/vtddanhmuc', [VTD_DANH_SACH_QUAN_TRIController::class, 'danhmuc'])->name('vtdAdmins.vtddanhsachquantri.danhmuc');
#admins - tin tức --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/vtd-admins/vtddanhsachquantri/vtdtintuc', [VTD_DANH_SACH_QUAN_TRIController::class, 'tintuc'])->name('vtdAdmins.vtddanhsachquantri..danhmuc.tintuc');
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/vtd-admins/vtddanhsachquantri/vtdsanpham', [VTD_DANH_SACH_QUAN_TRIController::class, 'sanpham'])->name('vtdAdmins.vtddanhsachquantri.danhmuc.sanpham');
// Mô tả sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/vtd-admins/vtddanhsachquantri/vtdmota/{id}', [VTD_DANH_SACH_QUAN_TRIController::class, 'mota'])->name('vtdAdmins.vtddanhsachquantri.danhmuc.mota');
#admins - nguoidung--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/vtd-admins/vtddanhsachquantri/vtdnguoidung', [VTD_DANH_SACH_QUAN_TRIController::class, 'nguoidung'])->name('vtdAdmins.vtddanhsachquantri.nguoidung');

// loai san pham--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/vtd-admins/vtd-loai-san-pham',[VTD_LOAI_SAN_PHAMController::class,'vtdList'])->name('vtdadmins.vtdloaisanpham');
//create
Route::get('/vtd-admins/vtd-loai-san-pham/vtd-create',[VTD_LOAI_SAN_PHAMController::class,'vtdCreate'])->name('vtdadmin.vtdloaisanpham.vtdcreate');
Route::post('/vtd-admins/vtd-loai-san-pham/vtd-create',[VTD_LOAI_SAN_PHAMController::class,'vtdCreateSunmit'])->name('vtdadmin.vtdloaisanpham.vtdCreateSunmit');
// edit
Route::get('/vtd-admins/vtd-loai-san-pham/vtd-edit/{id}',[VTD_LOAI_SAN_PHAMController::class,'vtdEdit'])->name('vtdadmin.vtdloaisanpham.vtdEdit');
Route::post('/vtd-admins/vtd-loai-san-pham/vtd-edit',[VTD_LOAI_SAN_PHAMController::class,'vtdEditSubmit'])->name('vtdadmin.vtdloaisanpham.vtdEditSubmit');
// detail
Route::get('/vtd-admins/vtd-loai-san-pham/vtd-detail/{id}',[VTD_LOAI_SAN_PHAMController::class,'vtdGetDetail'])->name('vtdadmin.vtdloaisanpham.vtdGetDetail');
// delete
Route::get('/vtd-admins/vtd-loai-san-pham/vtd-delete/{id}',[VTD_LOAI_SAN_PHAMController::class,'vtdDelete'])->name('vtdadmin.vtdloaisanpham.vtdDelete');

// san pham--------------------------------------------------------------------------------------------------------------------------------------
// search
Route::get('/vtd-admins/vtd-san-pham/search', [VTD_SAN_PHAMController::class, 'searchAdmins'])->name('vtduser.searchAdmins');
// list

Route::get('/vtd-admins/vtd-san-pham',[VTD_SAN_PHAMController::class,'vtdList'])->name('vtdadims.vtdsanpham');
//create
Route::get('/vtd-admins/vtd-san-pham/vtd-create',[VTD_SAN_PHAMController::class,'vtdCreate'])->name('vtdadmin.vtdsanpham.vtdcreate');
Route::post('/vtd-admins/vtd-san-pham/vtd-create',[VTD_SAN_PHAMController::class,'vtdCreateSubmit'])->name('vtdadmin.vtdsanpham.vtdCreateSubmit');
//detail
Route::get('/vtd-admins/vtd-san-pham/vtd-detail/{id}', [VTD_SAN_PHAMController::class, 'vtdDetail'])->name('vtdadmin.vtdsanpham.vtdDetail');
// edit
Route::get('/vtd-admins/vtd-san-pham/vtd-edit/{id}', [VTD_SAN_PHAMController::class, 'vtdEdit'])->name('vtdadmin.vtdsanpham.vtdedit');

// Xử lý cập nhật sản phẩm
Route::post('/vtd-admins/vtd-san-pham/vtd-edit/{id}', [VTD_SAN_PHAMController::class, 'vtdEditSubmit'])->name('vtdadmin.vtdsanpham.vtdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/vtd-admins/vtd-san-pham/vtd-delete/{id}', [VTD_SAN_PHAMController::class, 'vtddelete'])->name('vtdadmin.vtdsanpham.vtddelete');


// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/vtd-admins/vtd-khach-hang',[VTD_KHACH_HANGcontroller::class,'vtdList'])->name('vtdadmins.vtdkhachhang');
//detail
Route::get('/vtd-admins/vtd-khach-hang/vtd-detail/{id}', [VTD_KHACH_HANGcontroller::class, 'vtdDetail'])->name('vtdadmin.vtdkhachhang.vtdDetail');
//create
Route::get('/vtd-admins/vtd-khach-hang/vtd-create',[VTD_KHACH_HANGcontroller::class,'vtdCreate'])->name('vtdadmin.vtdkhachhang.vtdcreate');
Route::post('/vtd-admins/vtd-khach-hang/vtd-create',[VTD_KHACH_HANGcontroller::class,'vtdCreateSubmit'])->name('vtdadmin.vtdkhachhang.vtdCreateSubmit');
//edit
Route::get('/vtd-admins/vtd-khach-hang/vtd-edit/{id}', [VTD_KHACH_HANGcontroller::class, 'vtdEdit'])->name('vtdadmin.vtdkhachhang.vtdedit');
Route::post('/vtd-admins/vtd-khach-hang/vtd-edit/{id}', [VTD_KHACH_HANGcontroller::class, 'vtdEditSubmit'])->name('vtdadmin.vtdkhachhang.vtdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/vtd-admins/vtd-khach-hang/vtd-delete/{id}', [VTD_KHACH_HANGcontroller::class, 'vtdDelete'])->name('vtdadmin.vtdkhachhang.vtddelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/vtd-admins/vtd-hoa-don',[VTD_HOA_DONController::class,'vtdList'])->name('vtdadmins.vtdhoadon');
//detail
Route::get('/vtd-admins/vtd-hoa-don/vtd-detail/{id}', [VTD_HOA_DONController::class, 'vtdDetail'])->name('vtdadmin.vtdhoadon.vtdDetail');
//create
Route::get('/vtd-admins/vtd-hoa-don/vtd-create',[VTD_HOA_DONController::class,'vtdCreate'])->name('vtdadmin.vtdhoadon.vtdcreate');
Route::post('/vtd-admins/vtd-hoa-don/vtd-create',[VTD_HOA_DONController::class,'vtdCreateSubmit'])->name('vtdadmin.vtdhoadon.vtdCreateSubmit');
//edit
Route::get('/vtd-admins/vtd-hoa-don/vtd-edit/{id}', [VTD_HOA_DONController::class, 'vtdEdit'])->name('vtdadmin.vtdhoadon.vtdedit');
Route::post('/vtd-admins/vtd-hoa-don/vtd-edit/{id}', [VTD_HOA_DONController::class, 'vtdEditSubmit'])->name('vtdadmin.vtdhoadon.vtdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/vtd-admins/vtd-hoa-don/vtd-delete/{id}', [VTD_HOA_DONController::class, 'vtdDelete'])->name('vtdadmin.vtdhoadon.vtddelete');


// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/vtd-admins/vtd-ct-hoa-don',[VTD_CT_HOA_DONController::class,'vtdList'])->name('vtdadmins.vtdcthoadon');
//detail
Route::get('/vtd-admins/vtd-ct-hoa-don/vtd-detail/{id}', [VTD_CT_HOA_DONController::class, 'vtdDetail'])->name('vtdadmin.vtdcthoadon.vtdDetail');
//create
Route::get('/vtd-admins/vtd-ct-hoa-don/vtd-create',[VTD_CT_HOA_DONController::class,'vtdCreate'])->name('vtdadmin.vtdcthoadon.vtdcreate');
Route::post('/vtd-admins/vtd-ct-hoa-don/vtd-create',[VTD_CT_HOA_DONController::class,'vtdCreateSubmit'])->name('vtdadmin.vtdcthoadon.vtdCreateSubmit');
//edit
Route::get('/vtd-admins/vtd-ct-hoa-don/vtd-edit/{id}', [VTD_CT_HOA_DONController::class, 'vtdEdit'])->name('vtdadmin.vtdcthoadon.vtdedit');
Route::post('/vtd-admins/vtd-ct-hoa-don/vtd-edit/{id}', [VTD_CT_HOA_DONController::class, 'vtdEditSubmit'])->name('vtdadmin.vtdcthoadon.vtdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/vtd-admins/vtd-ct-hoa-don/vtd-delete/{id}', [VTD_CT_HOA_DONController::class, 'vtdDelete'])->name('vtdadmin.vtdcthoadon.vtddelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/vtd-admins/vtd-quan-tri',[VTD_QUAN_TRIController::class,'vtdList'])->name('vtdadmins.vtdquantri');
//detail
Route::get('/vtd-admins/vtd-quan-tri/vtd-detail/{id}', [VTD_QUAN_TRIController::class, 'vtdDetail'])->name('vtdadmin.vtdquantri.vtdDetail');
//create
Route::get('/vtd-admins/vtd-quan-tri/vtd-create',[VTD_QUAN_TRIController::class,'vtdCreate'])->name('vtdadmin.vtdquantri.vtdcreate');
Route::post('/vtd-admins/vtd-quan-tri/vtd-create',[VTD_QUAN_TRIController::class,'vtdCreateSubmit'])->name('vtdadmin.vtdquantri.vtdCreateSubmit');
//edit
Route::get('/vtd-admins/vtd-quan-tri/vtd-edit/{id}', [VTD_QUAN_TRIController::class, 'vtdEdit'])->name('vtdadmin.vtdquantri.vtdedit');
Route::post('/vtd-admins/vtd-quan-tri/vtd-edit/{id}', [VTD_QUAN_TRIController::class, 'vtdEditSubmit'])->name('vtdadmin.vtdquantri.vtdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/vtd-admins/vtd-quan-tri/vtd-delete/{id}', [VTD_QUAN_TRIController::class, 'vtdDelete'])->name('vtdadmin.vtdquantri.vtddelete');

// Tin Tức--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/vtd-admins/vtd-tin-tuc',[VTD_TIN_TUCController::class,'vtdList'])->name('vtdadmins.vtdtintuc');
//detail
Route::get('/vtd-admins/vtd-tin-tuc/vtd-detail/{id}', [VTD_TIN_TUCController::class, 'vtdDetail'])->name('vtdadmin.vtdtintuc.vtdDetail');
//create
Route::get('/vtd-admins/vtd-tin-tuc/vtd-create',[VTD_TIN_TUCController::class,'vtdCreate'])->name('vtdadmin.vtdtintuc.vtdcreate');
Route::post('/vtd-admins/vtd-tin-tuc/vtd-create',[VTD_TIN_TUCController::class,'vtdCreateSubmit'])->name('vtdadmin.vtdtintuc.vtdCreateSubmit');
//edit
Route::get('/vtd-admins/vtd-tin-tuc/vtd-edit/{id}', [VTD_TIN_TUCController::class, 'vtdEdit'])->name('vtdadmin.vtdtintuc.vtdedit');
Route::post('/vtd-admins/vtd-tin-tuc/vtd-edit/{id}', [VTD_TIN_TUCController::class, 'vtdEditSubmit'])->name('vtdadmin.vtdtintuc.vtdEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/vtd-admins/vtd-tin-tuc/vtd-delete/{id}', [VTD_TIN_TUCController::class, 'vtdDelete'])->name('vtdadmin.vtdtintuc.vtddelete');














use App\Http\Controllers\HomeController;

// User - Routes
Route::get('/vtd-user', [HomeController::class, 'index'])->name('vtduser.home');
Route::get('/vtd-user1', [HomeController::class, 'index1'])->name('vtduser.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/vtd-user/show/{id}', [HomeController::class, 'show'])->name('vtduser.show');
// search
Route::get('/search', [VTD_SAN_PHAMController::class, 'search'])->name('vtduser.search');
Route::get('/search1', [VTD_SAN_PHAMController::class, 'search1'])->name('vtduser.search1');

Route::get('/vtduser/login', [VTD_LOGIN_USERController::class, 'vtdLogin'])->name('vtduser.login');
Route::post('/vtduser/login', [VTD_LOGIN_USERController::class, 'vtdLoginSubmit'])->name('vtduser.vtdLoginSubmit');
Route::get('/vtduser/logout', [VTD_LOGIN_USERController::class, 'vtdLogout'])->name('vtduser.logout');


// hỗ trợ 
route::get('/vtd-user/support',function()
{
    return view('vtduser.support');
});

// signup
Route::get('/vtd-user/signup', [VTD_SIGNUPController::class, 'vtdsignup'])->name('vtduser.vtdsignup');
Route::post('/vtd-user/signup', [VTD_SIGNUPController::class, 'vtdsignupSubmit'])->name('vtduser.vtdsignupSubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/vtd-user/thanhtoan/{product_id}', [VTD_CT_HOA_DONController::class, 'vtdthanhtoan'])->name('vtduser.vtdthanhtoan');

// Route để xử lý thanh toán
Route::post('/vtd-user/thanhtoan', [VTD_CT_HOA_DONController::class, 'storeThanhtoan'])->name('vtduser.storeThanhtoan');
// create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [VTD_CT_HOA_DONController::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [VTD_CT_HOA_DONController::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [VTD_HOA_DONController::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [VTD_CT_HOA_DONController::class, 'create'])->name('cthoadon.create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [VTD_CT_HOA_DONController::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [VTD_CT_HOA_DONController::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng

