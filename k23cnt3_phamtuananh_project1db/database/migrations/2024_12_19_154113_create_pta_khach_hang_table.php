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
        Schema::create('pta_khach_hang', function (Blueprint $table) {
            $table->id();
            $table->string('ptaMaKhachHang',255)->unique();
            $table->string('ptaHoTenKhachHang',255);
            $table->string('ptaEmail',255);
            $table->string('ptaMatKhau',255);
            $table->string('ptaDienThoai',255);
            $table->string('ptaDiaChi',255);
            $table->dateTime('ptaNgayDangKy');
            $table->tinyInteger('ptaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pta_khach_hang');
    }
};
