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
        Schema::create('vtd_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('vtdMaSanPham',255)->unique();
            $table->string('vtdTenSanPham',255);
            $table->string('vtdHinhAnh',255);
            $table->Integer('vtdSoLuong');
            $table->float('vtdDonGia');
            $table->bigInteger('vtdMaLoai')->references('id')->on('vtd_LOAI_SAN_PHAM');
            $table->string('vtdMoTa',10000);
            $table->tinyInteger('vtdTrangThai');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtd_SAN_PHAM');
    }
};