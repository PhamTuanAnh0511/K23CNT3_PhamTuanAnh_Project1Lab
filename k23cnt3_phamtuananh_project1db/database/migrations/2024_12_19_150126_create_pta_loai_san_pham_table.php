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
        Schema::create('pta_loai_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ptaMaLoai',255)->unique();
            $table->string('ptaTenLoai',255);
            $table->tinyInteger('ptaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pta_loai_san_pham');
    }
};
