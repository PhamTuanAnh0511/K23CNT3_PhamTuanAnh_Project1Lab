<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class pta_khach_hang extends Authenticatable // Kế thừa từ Authenticatable
{
    use HasFactory;

   use HasFactory;

    protected $table = 'pta_khach_hang';
    protected $primaryKey = 'ptaMaKhachHang'; // Đảm bảo rằng ptaMaKhachHang là khóa chính

    protected $fillable = [
        'ptaMaKhachHang', 'ptaHoTenKhachHang', 'ptaEmail', 'ptaMatKhau', 
        'ptaDienThoai', 'ptaDiaChi', 'ptaNgayDangKy', 'ptaTrangThai'
    ];

    public $incrementing = false; // Nếu ptaMaKhachHang không tự tăng thì bạn cần đặt false
    public $timestamps = true;

    protected $dates = ['ptaNgayDangKy'];

    public function setptaMatKhauAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['ptaMatKhau'] = Hash::make($value);
        }
    }
    
}