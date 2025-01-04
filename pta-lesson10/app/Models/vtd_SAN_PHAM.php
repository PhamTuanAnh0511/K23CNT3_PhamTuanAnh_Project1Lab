<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vtd_SAN_PHAM extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
   
    protected $table = 'vtd_SAN_PHAM';
    protected $primaryKey = 'id';
    public $timestamps = true;

    
    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'vtdMaSanPham',
        'vtdTenSanPham',
        'vtdHinhAnh',
        'vtdSoLuong',
        'vtdDonGia',
        'vtdMaLoai',
        'vtdMoTa',
        'vtdTrangThai',
    ];
    public function chiTietHoaDon()
    {
        return $this->hasMany(vtd_CT_HOA_DON::class, 'vtdSanPhamID','id');
    }
   

}
