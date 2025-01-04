<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Thêm dòng này

class vtd_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mã hóa mật khẩu bằng Hash::make()
        $vtdMatKhau = Hash::make('ducyb12398'); // Mã hóa mật khẩu

        DB::table('vtd_QUAN_TRI')->insert([
            'vtdTaiKhoan' => 'vuduc@gmail.com',
            'vtdMatKhau' => $vtdMatKhau,
            'vtdTrangThai' => 0
        ]);

        DB::table('vtd_QUAN_TRI')->insert([
            'vtdTaiKhoan' => '0943572199',
            'vtdMatKhau' => $vtdMatKhau,
            'vtdTrangThai' => 0
        ]);
    }
}