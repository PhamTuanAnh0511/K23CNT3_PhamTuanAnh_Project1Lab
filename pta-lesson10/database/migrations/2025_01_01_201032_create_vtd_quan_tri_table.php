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
        Schema::create('vtd_QUAN_TRI', function (Blueprint $table) {
            $table->id();
            $table->string('vtdTaiKhoan',255)->unique();
            $table->string('vtdMatKhau',255);
            $table->tinyInteger('vtdTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtd_QUAN_TRI');
    }
};