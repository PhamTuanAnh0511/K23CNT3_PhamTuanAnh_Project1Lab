<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pta_quan_tri extends Model
{
    use HasFactory;

    // Chỉ định bảng của model nếu tên bảng khác tên mặc định
    protected $table = 'pta_quan_tri';

    // Chỉ định các cột có thể gán (mass assignable)
    protected $fillable = ['ptaTaiKhoan', 'ptaMatKhau', 'ptaTrangThai'];

    // Tắt timestamp nếu không cần
    public $timestamps = false;
}
