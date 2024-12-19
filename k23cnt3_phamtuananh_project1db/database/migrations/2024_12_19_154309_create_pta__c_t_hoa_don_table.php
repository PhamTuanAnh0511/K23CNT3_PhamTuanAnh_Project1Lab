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
       
        Schema::create('pta__c_t_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ptaHoaDonID')->references('id')->on('pta_hoa_don');
            $table->bigInteger('ptaSanPhamID')->references('id')->on('pta_san_pham');
            $table->integer('ptaSoLuongMua');
            $table->float('ptaDonGiaMua');
            $table->float('ptaThanhTien');
            $table->tinyInteger('ptaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pta__c_t_hoa_don');
    }
};
