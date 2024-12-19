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
        Schema::create('pta_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->string('ptaMaHoaDon',255)->unique();
            $table->bigInteger('ptaMaKhachHang')->references('id')->on('pta_khach_hang');
            $table->dateTime('ptaNgayHoaDon');
            $table->dateTime('ptaNgayNhan');
            $table->string('ptaHoTenKhachHang',255);
            $table->string('ptaEmail',255);
            $table->string('ptaDienThoai',255);
            $table->string('ptaDiaChi',255);
            $table->float('ptaTongTriGia');
            $table->tinyInteger('ptaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pta_hoa_don');
    }
};
