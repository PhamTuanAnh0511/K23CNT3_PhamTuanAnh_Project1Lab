<?php
use App\Http\Controllers\pta_loai_san_pham1;
use App\Http\Controllers\pta_quan_triController;
use App\Http\Controllers\pta_san_pham1;
use App\Http\Controllers\pta_khach_hang1;
use App\Http\Controllers\pta_danh_sach_quan_tri1;
use App\Http\Controllers\pta_hoa_don1;
use App\Http\Controllers\pta_ct_hoa_don1;
use App\Http\Controllers\pta_tin_tuc1;
use App\Http\Controllers\pta_login_user1;
use App\Http\Controllers\pta_signup1;
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
Route::get('pta-admins/admins/pta-login',[pta_quan_triController::class,'ptaLogin'])->name('admins.ptaLogin');
Route::post('pta-admins/admins/pta-login',[pta_quan_triController::class,'ptaLoginsubmit'])->name('admins.ptaLoginsubmit'); 

Route::get('pta-admins/admins',function(){
    return view('ptaadmins.index');
});
#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/pta-admins/ptadanhsachquantri/ptadanhmuc', [pta_danh_sach_quan_tri1::class, 'danhmuc'])->name('ptaadmins.ptadanhsachquantri.danhmuc');
#admins - tin tức --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/pta-admins/ptadanhsachquantri/ptatintuc', [pta_danh_sach_quan_tri1::class, 'tintuc'])->name('ptaadmins.ptadanhsachquantri.danhmuc.tintuc');
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/pta-admins/ptadanhsachquantri/ptasanpham', [pta_danh_sach_quan_tri1::class, 'sanpham'])->name('ptaadmins.ptadanhsachquantri.danhmuc.sanpham');
#admins - nguoidung--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/pta-admins/ptadanhsachquantri/ptanguoidung', [pta_danh_sach_quan_tri1::class, 'nguoidung'])->name('ptaadmins.ptadanhsachquantri.nguoidung');
Route::get('/pta-admins/ptadanhsachquantri/ptamota/{id}', [pta_danh_sach_quan_tri1::class, 'mota'])->name('ptaadmins.ptadanhsachquantri.danhmuc.mota');
// loai san pham--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/pta-admins/pta-loai-san-pham',[pta_loai_san_pham1::class,'ptaList'])->name('ptaadmins.ptaloaisanpham');
//Create
Route::get('/pta-admins/pta-loai-san-pham/pta-Create',[pta_loai_san_pham1::class,'ptaCreate'])->name('ptaadmins.ptaloaisanpham.ptaCreate');
Route::post('/pta-admins/pta-loai-san-pham/pta-Create',[pta_loai_san_pham1::class,'ptaCreatesubmit'])->name('ptaadmins.ptaloaisanpham.ptaCreatesubmit');
// Edit
Route::get('/pta-admins/pta-loai-san-pham/pta-Edit/{id}',[pta_loai_san_pham1::class,'ptaEdit'])->name('ptaadmins.ptaloaisanpham.ptaEdit');
Route::post('/pta-admins/pta-loai-san-pham/pta-Edit',[pta_loai_san_pham1::class,'ptaEditsubmit'])->name('ptaadmins.ptaloaisanpham.ptaEditsubmit');
// detail
Route::get('/pta-admins/pta-loai-san-pham/pta-Detail/{id}',[pta_loai_san_pham1::class,'ptaGetDetail'])->name('ptaadmins.ptaloaisanpham.ptaGetDetail');
// Delete
Route::get('/pta-admins/pta-loai-san-pham/pta-Delete/{id}',[pta_loai_san_pham1::class,'ptaDelete'])->name('ptaadmins.ptaloaisanpham.ptaDelete');

// san pham--------------------------------------------------------------------------------------------------------------------------------------
// search
Route::get('/pta-admins/pta-san-pham/ptaSearch', [pta_san_pham1::class, 'searchadmins'])->name('ptauser.searchadmins');
// list

Route::get('/pta-admins/pta-san-pham',[pta_san_pham1::class,'ptaList'])->name('ptaadmins.ptasanpham');
//Create
Route::get('/pta-admins/pta-san-pham/pta-Create',[pta_san_pham1::class,'ptaCreate'])->name('ptaadmins.ptasanpham.ptaCreate');
Route::post('/pta-admins/pta-san-pham/pta-Create',[pta_san_pham1::class,'ptaCreatesubmit'])->name('ptaadmins.ptasanpham.ptaCreatesubmit');
//detail
Route::get('/pta-admins/pta-san-pham/pta-detail/{id}', [pta_san_pham1::class, 'ptaDetail'])->name('ptaadmins.ptasanpham.ptaDetail');
// Edit
Route::get('/pta-admins/pta-san-pham/pta-Edit/{id}', [pta_san_pham1::class, 'ptaEdit'])->name('ptaadmins.ptasanpham.ptaEdit');

// Xử lý cập nhật sản phẩm
Route::post('/pta-admins/pta-san-pham/pta-Edit/{id}', [pta_san_pham1::class, 'ptaEditsubmit'])->name('ptaadmins.ptasanpham.ptaEditsubmit');
//Delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/pta-admins/pta-san-pham/pta-Delete/{id}', [pta_san_pham1::class, 'ptaDelete'])->name('ptaadmins.ptasanpham.ptaDelete');


// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/pta-admins/pta-khach-hang',[pta_khach_hang1::class,'ptaList'])->name('ptaadmins.ptakhachhang');
//detail
Route::get('/pta-admins/pta-khach-hang/pta-Detail/{id}', [pta_khach_hang1::class, 'ptaDetail'])->name('ptaadmins.ptakhachhang.ptaDetail');
//Create
Route::get('/pta-admins/pta-khach-hang/pta-Create',[pta_khach_hang1::class,'ptaCreate'])->name('ptaadmins.ptakhachhang.ptaCreate');
Route::post('/pta-admins/pta-khach-hang/pta-Create',[pta_khach_hang1::class,'ptaCreatesubmit'])->name('ptaadmins.ptakhachhang.ptaCreatesubmit');
//Edit
Route::get('/pta-admins/pta-khach-hang/pta-Edit/{id}', [pta_khach_hang1::class, 'ptaEdit'])->name('ptaadmins.ptakhachhang.ptaEdit');
Route::post('/pta-admins/pta-khach-hang/pta-Edit/{id}', [pta_khach_hang1::class, 'ptaEditsubmit'])->name('ptaadmins.ptakhachhang.ptaEditsubmit');
//Delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/pta-admins/pta-khach-hang/pta-Delete/{id}', [pta_khach_hang1::class, 'ptaDelete'])->name('ptaadmins.ptakhachhang.ptaDelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/pta-admins/pta-hoa-don',[pta_hoa_don1::class,'ptaList'])->name('ptaadmins.ptahoadon');
//detail
Route::get('/pta-admins/pta-hoa-don/pta-Detail/{id}', [pta_hoa_don1::class, 'ptaDetail'])->name('ptaadmins.ptahoadon.ptaDetail');
//Create
Route::get('/pta-admins/pta-hoa-don/pta-Create',[pta_hoa_don1::class,'ptaCreate'])->name('ptaadmins.ptahoadon.ptaCreate');
Route::post('/pta-admins/pta-hoa-don/pta-Create',[pta_hoa_don1::class,'ptaCreatesubmit'])->name('ptaadmins.ptahoadon.ptaCreatesubmit');
//Edit
Route::get('/pta-admins/pta-hoa-don/pta-Edit/{id}', [pta_hoa_don1::class, 'ptaEdit'])->name('ptaadmins.ptahoadon.ptaEdit');
Route::post('/pta-admins/pta-hoa-don/pta-Edit/{id}', [pta_hoa_don1::class, 'ptaEditsubmit'])->name('ptaadmins.ptahoadon.ptaEditsubmit');
//Delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/pta-admins/pta-hoa-don/pta-Delete/{id}', [pta_hoa_don1::class, 'ptaDelete'])->name('ptaadmins.ptahoadon.ptaDelete');


// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/pta-admins/pta-ct-hoa-don',[pta_ct_hoa_don1::class,'ptaList'])->name('ptaadmins.ptacthoadon');
//detail
Route::get('/pta-admins/pta-ct-hoa-don/pta-Detail/{id}', [pta_ct_hoa_don1::class, 'ptaDetail'])->name('ptaadmins.ptacthoadon.ptaDetail');
//Create
Route::get('/pta-admins/pta-ct-hoa-don/pta-Create',[pta_ct_hoa_don1::class,'ptaCreate'])->name('ptaadmins.ptacthoadon.ptaCreate');
Route::post('/pta-admins/pta-ct-hoa-don/pta-Create',[pta_ct_hoa_don1::class,'ptaCreatesubmit'])->name('ptaadmins.ptacthoadon.ptaCreatesubmit');
//Edit
Route::get('/pta-admins/pta-ct-hoa-don/pta-Edit/{id}', [pta_ct_hoa_don1::class, 'ptaEdit'])->name('ptaadmins.ptacthoadon.ptaEdit');
Route::post('/pta-admins/pta-ct-hoa-don/pta-Edit/{id}', [pta_ct_hoa_don1::class, 'ptaEditsubmit'])->name('ptaadmins.ptacthoadon.ptaEditsubmit');
//Delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/pta-admins/pta-ct-hoa-don/pta-Delete/{id}', [pta_ct_hoa_don1::class, 'ptaDelete'])->name('ptaadmins.ptacthoadon.ptaDelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/pta-admins/pta-quan-tri',[pta_quan_triController::class,'ptaList'])->name('ptaadmins.ptaquantri');
//detail
Route::get('/pta-admins/pta-quan-tri/pta-Detail/{id}', [pta_quan_triController::class, 'ptaDetail'])->name('ptaadmins.ptaquantri.ptaDetail');
//Create
Route::get('/pta-admins/pta-quan-tri/pta-Create',[pta_quan_triController::class,'ptaCreate'])->name('ptaadmins.ptaquantri.ptaCreate');
Route::post('/pta-admins/pta-quan-tri/pta-Create',[pta_quan_triController::class,'ptaCreatesubmit'])->name('ptaadmins.ptaquantri.ptaCreatesubmit');
//Edit
Route::get('/pta-admins/pta-quan-tri/pta-Edit/{id}', [pta_quan_triController::class, 'ptaEdit'])->name('ptaadmins.ptaquantri.ptaEdit');
Route::post('/pta-admins/pta-quan-tri/pta-Edit/{id}', [pta_quan_triController::class, 'ptaEditsubmit'])->name('ptaadmins.ptaquantri.ptaEditsubmit');
//Delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/pta-admins/pta-quan-tri/pta-Delete/{id}', [pta_quan_triController::class, 'ptaDelete'])->name('ptaadmins.ptaquantri.ptaDelete');

// Tin Tức--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/pta-admins/pta-tin-tuc',[pta_tin_tuc1::class,'ptaList'])->name('ptaadmins.ptatintuc');
//detail
Route::get('/pta-admins/pta-tin-tuc/pta-detail/{id}', [pta_tin_tuc1::class, 'ptaDetail'])->name('ptaadmins.ptatintuc.ptaDetail');
//Create
Route::get('/pta-admins/pta-tin-tuc/pta-Create',[pta_tin_tuc1::class,'ptaCreate'])->name('ptaadmins.ptatintuc.ptaCreate');
Route::post('/pta-admins/pta-tin-tuc/pta-Create',[pta_tin_tuc1::class,'ptaCreatesubmit'])->name('ptaadmins.ptatintuc.ptaCreatesubmit');
//Edit
Route::get('/pta-admins/pta-tin-tuc/pta-Edit/{id}', [pta_tin_tuc1::class, 'ptaEdit'])->name('ptaadmins.ptatintuc.ptaEdit');
Route::post('/pta-admins/pta-tin-tuc/pta-Edit/{id}', [pta_tin_tuc1::class, 'ptaEditsubmit'])->name('ptaadmins.ptatintuc.ptaEditsubmit');
//Delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/pta-admins/pta-tin-tuc/pta-Delete/{id}', [pta_tin_tuc1::class, 'ptaDelete'])->name('ptaadmins.ptatintuc.ptaDelete');














use App\Http\Controllers\HomeController;

// User - Routes
Route::get('/pta-user', [HomeController::class, 'index'])->name('ptauser.home');
Route::get('/pta-user1', [HomeController::class, 'index1'])->name('ptauser.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/pta-user/show/{id}', [HomeController::class, 'show'])->name('ptauser.show');
// search
Route::get('/search', [pta_san_pham1::class, 'search'])->name('ptauser.search');
Route::get('/search1', [pta_san_pham1::class, 'search1'])->name('ptauser.search1');

Route::get('/ptauser/login', [pta_login_user1::class, 'ptaLogin'])->name('ptauser.login');
Route::post('/ptauser/login', [pta_login_user1::class, 'ptaLoginsubmit'])->name('ptauser.ptaLoginsubmit');
Route::get('/ptauser/logout', [pta_login_user1::class, 'ptaLogout'])->name('ptauser.logout');


// hỗ trợ 
route::get('/pta-user/support',function()
{
    return view('ptauser.support');
});

// signup
Route::get('/pta-user/signup', [pta_signup1::class, 'ptasignup'])->name('ptauser.ptasignup');
Route::post('/pta-user/signup', [pta_signup1::class, 'ptasignupsubmit'])->name('ptauser.ptasignupsubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/pta-user/thanhtoan/{product_id}', [pta_ct_hoa_don1::class, 'ptathanhtoan'])->name('ptauser.ptathanhtoan');

// Route để xử lý thanh toán
Route::post('/pta-user/thanhtoan', [pta_ct_hoa_don1::class, 'storeThanhtoan'])->name('ptauser.storeThanhtoan');
// Create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [pta_ct_hoa_don1::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [pta_ct_hoa_don1::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [pta_hoa_don1::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [pta_ct_hoa_don1::class, 'Create'])->name('cthoadon.Create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [pta_ct_hoa_don1::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [pta_ct_hoa_don1::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng