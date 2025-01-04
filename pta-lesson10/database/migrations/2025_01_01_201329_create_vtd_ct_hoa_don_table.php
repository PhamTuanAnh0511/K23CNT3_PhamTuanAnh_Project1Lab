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
        Schema::create('vtd_CT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vtdHoaDonID')->references('id')->on('vtd_HOA_DON');
            $table->bigInteger('vtdSanPhamID')->references('id')->on('vtd_SAN_PHAM');
            $table->integer('vtdSoLuongMua');
            $table->float('vtdDonGiaMua');
            $table->double('vtdThanhTien');
            $table->tinyInteger('vtdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtd_CT_HOA_DON');
    }
};