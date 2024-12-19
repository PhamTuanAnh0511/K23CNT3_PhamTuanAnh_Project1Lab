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
        Schema::create('pta_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ptaMaSanPham',255)->unique();
            $table->string('ptaTenSanPham',255);
            $table->string('ptaHinhAnh',255);
            $table->integer('ptaSoLuong');
            $table->float('ptaDonGia');
            $table->bigInteger('ptaMaLoai')->references('id')->on('pta_loai_san_pham');
            $table->tinyInteger('ptaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pta_san_pham');
    }
};
