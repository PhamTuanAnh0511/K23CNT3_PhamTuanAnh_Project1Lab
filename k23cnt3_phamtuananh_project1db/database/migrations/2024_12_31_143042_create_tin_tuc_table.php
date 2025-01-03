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
        Schema::create('pta_tin_tuc', function (Blueprint $table) {
            $table->id();
            $table->string('ptaMaTT')->unique(); // Assuming 'ptaMaTT' is unique, add unique constraint if needed
            $table->string('ptaTieuDe');
            $table->text('ptaMoTa'); // 'text' type is better for longer descriptions
            $table->longText('ptaNoiDung'); // 'longText' for potentially larger content
            $table->dateTime('ptaNgayDangTin'); // Store as datetime
            $table->dateTime('ptaNgayCapNhap'); // Store as datetime
            $table->string('ptaHinhAnh');
            $table->tinyInteger('ptaTrangThai'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pta_tin_tuc');
    }
};