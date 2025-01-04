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
        Schema::create('vtd_TIN_TUC', function (Blueprint $table) {
            $table->id();
            $table->string('vtdMaTT')->unique(); // Assuming 'vtdMaTT' is unique, add unique constraint if needed
            $table->string('vtdTieuDe');
            $table->text('vtdMoTa'); // 'text' type is better for longer descriptions
            $table->longText('vtdNoiDung'); // 'longText' for potentially larger content
            $table->dateTime('vtdNgayDangTin'); // Store as datetime
            $table->dateTime('vtdNgayCapNhap'); // Store as datetime
            $table->string('vtdHinhAnh');
            $table->tinyInteger('vtdTrangThai'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtd_TIN_TUC');
    }
};