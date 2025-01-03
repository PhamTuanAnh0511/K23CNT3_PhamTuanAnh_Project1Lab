<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pta_hoa_don extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'pta_hoa_don';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'ptaMaHoaDon',  // Thêm trường ptaMaHoaDon vào mảng fillable
        'ptaMaKhachHang',
        'ptaNgayHoaDon',
        'ptaNgayNhan',
        'ptaHoTenKhachHang',
        'ptaEmail',
        'ptaDienThoai',
        'ptaDiaChi',
        'ptaTongGiaTri',
        'ptaTrangThai',
    ];

    // Quan hệ với bảng pta_KHACH_HANG
    public function khachHang()
    {
        return $this->belongsTo(pta_khach_hang::class, 'ptaMaKhachHang', 'id');
    }

    // Quan hệ với bảng pta_CT_HOA_DON
    public function chiTietHoaDon()
    {
        return $this->hasMany(pta_ct_hoa_don::class, 'ptaHoaDonID', 'id');
    }
    
}