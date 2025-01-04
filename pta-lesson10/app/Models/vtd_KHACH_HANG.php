<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class vtd_KHACH_HANG extends Authenticatable // Kế thừa từ Authenticatable
{
    use HasFactory;


    protected $table = 'vtd_KHACH_HANG';
    protected $primaryKey = 'vtdMaKhachHang'; // Đảm bảo rằng vtdMaKhachHang là khóa chính

    protected $fillable = [
        'vtdMaKhachHang', 'vtdHoTenKhachHang', 'vtdEmail', 'vtdMatKhau', 
        'vtdDienThoai', 'vtdDiaChi', 'vtdNgayDangKy', 'vtdTrangThai'
    ];

    public $incrementing = false; // Nếu vtdMaKhachHang không tự tăng thì bạn cần đặt false
    public $timestamps = true;

    protected $dates = ['vtdNgayDangKy'];

    public function setVtdMatKhauAttribute($value)
{
    if (!empty($value)) {
        $this->attributes['vtdMatKhau'] = Hash::make($value);
    }
}

    
}