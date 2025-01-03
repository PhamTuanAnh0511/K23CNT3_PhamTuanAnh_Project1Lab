<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pta_san_pham extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
   
    protected $table = 'pta_san_pham';
    protected $primaryKey = 'id';
    public $timestamps = true;

    
    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'ptaMaSanPham',
        'ptaTenSanPham',
        'ptaHinhAnh',
        'ptaSoLuong',
        'ptaDonGia',
        'ptaMaLoai',
        'ptaMoTa',
        'ptaTrangThai',
    ];
    public function chiTietHoaDon()
    {
        return $this->hasMany(pta_ct_hoa_don::class, 'ptaSanPhamID','id');
    }
   

}
