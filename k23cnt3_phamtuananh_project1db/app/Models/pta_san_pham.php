<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pta_san_pham extends Model
{
    use HasFactory;

    protected $table = 'pta_san_pham';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu ptanhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}