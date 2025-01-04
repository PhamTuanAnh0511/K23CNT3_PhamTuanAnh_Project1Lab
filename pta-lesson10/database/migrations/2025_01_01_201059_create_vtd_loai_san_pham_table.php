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
        Schema::create('vtd_LOAI_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('vtdMaLoai',255)->unique();
            $table->string('vtdTenLoai',255);
            $table->tinyInteger('vtdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtd_LOAI_SAN_PHAM');
    }
};