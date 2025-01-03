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
        Schema::create('pta_ct_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ptaHoaDonID')->references('id')->on('pta_hoa_don');
            $table->bigInteger('ptaSanPhamID')->references('id')->on('pta_San_pham');
            $table->integer('ptaSoLuongMua');
            $table->float('ptaDonGiaMua');
            $table->double('ptaThanhTien');
            $table->tinyInteger('ptaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pta_ct_hoa_don');
    }
};