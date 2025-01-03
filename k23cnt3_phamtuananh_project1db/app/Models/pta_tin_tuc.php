<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pta_tin_tuc extends Model
{
    use HasFactory;
    
    protected $table = 'pta_tin_tuc';
    protected $primaryKey = 'id';
    public $incrementing = false; // Nếu ptanhacc không phải là auto-increment
    public $timestamps = true; // Đảm bảo là 'true' nếu bạn sử dụng timestamps
}