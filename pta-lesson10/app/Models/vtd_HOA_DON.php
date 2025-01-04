<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vtd_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'vtd_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'vtdMaHoaDon',  // Thêm trường vtdMaHoaDon vào mảng fillable
        'vtdMaKhachHang',
        'vtdNgayHoaDon',
        'vtdNgayNhan',
        'vtdHoTenKhachHang',
        'vtdEmail',
        'vtdDienThoai',
        'vtdDiaChi',
        'vtdTongGiaTri',
        'vtdTrangThai',
    ];

    // Quan hệ với bảng vtd_KHACH_HANG
    public function khachHang()
    {
        return $this->belongsTo(vtd_KHACH_HANG::class, 'vtdMaKhachHang', 'id');
    }

    // Quan hệ với bảng vtd_CT_HOA_DON
    public function chiTietHoaDon()
    {
        return $this->hasMany(vtd_CT_HOA_DON::class, 'vtdHoaDonID', 'id');
    }
    
}