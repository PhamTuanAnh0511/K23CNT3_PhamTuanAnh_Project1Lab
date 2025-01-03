<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pta_ct_hoa_don extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'pta_ct_hoa_don';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
       'ptaHoaDonID',   // Đảm bảo có trường ptaHoaDonID ở đây
        'ptaSanPhamID',
        'ptaSoLuongMua',
        'ptaDonGiaMua',
        'ptaThanhTien',
        'ptaTrangThai',
    ];

    // Quan hệ giữa bảng pta_ct_hoa_don và bảng pta_SAN_PHAM
 // Quan hệ với bảng pta_HOA_DON
public function hoaDon()
{
    return $this->belongsTo(pta_hoa_don::class, 'ptaHoaDonID', 'id');
}

// Quan hệ với bảng pta_SAN_PHAM
public function sanPham()
{
    return $this->belongsTo(pta_san_pham::class, 'ptaSanPhamID', 'id');
}

}