<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vtd_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table->string('vtdMaKhachHang',255)->unique();
            $table->string('vtdHoTenKhachHang',255);
            $table->string('vtdEmail',255)->unique();
            $table->string('vtdMatKhau',255);
            $table->string('vtdDienThoai',255)->unique();
            $table->string('vtdDiaChi',255);
            $table->date('vtdNgayDangKy');
            $table->tinyInteger('vtdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtd_KHACH_HANG');
    }
};