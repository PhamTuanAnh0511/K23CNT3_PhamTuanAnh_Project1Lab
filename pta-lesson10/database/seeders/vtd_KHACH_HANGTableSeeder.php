<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Đảm bảo Hash được sử dụng

class vtd_KHACH_HANGTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('vtd_KHACH_HANG')->insert([
            'vtdMaKhachHang'=>'KH001',
            'vtdHoTenKhachHang'=>'Vũ Tiến Đức',
            'vtdEmail'=>'vuducc@gmail.com',
            'vtdMatKhau'=>Hash::make('123456a@'), // Mã hóa mật khẩu
            'vtdDienThoai'=>'012550036',
            'vtdDiaChi'=>'Yên Bái-Yên Bình',
            'vtdNgayDangKy'=>'2024/12/12',
            'vtdTrangThai'=>0,
        ]);

        DB::table('vtd_KHACH_HANG')->insert([
            'vtdMaKhachHang'=>'KH002',
            'vtdHoTenKhachHang'=>'Trần Tuấn Hưng',
            'vtdEmail'=>'hungtran@gmail.com',
            'vtdMatKhau'=>Hash::make('hungyb123'), // Mã hóa mật khẩu
            'vtdDienThoai'=>'012588868',
            'vtdDiaChi'=>'Phú Thọ',
            'vtdNgayDangKy'=>'2024/12/20',
            'vtdTrangThai'=>0,
        ]);

        DB::table('vtd_KHACH_HANG')->insert([
            'vtdMaKhachHang'=>'KH003',
            'vtdHoTenKhachHang'=>'Phan Quang Minh',
            'vtdEmail'=>'pminh@gmail.com',
            'vtdMatKhau'=>Hash::make('pminh3366'), // Mã hóa mật khẩu
            'vtdDienThoai'=>'0382550508',
            'vtdDiaChi'=>'Phú Thọ',
            'vtdNgayDangKy'=>'2024/12/17',
            'vtdTrangThai'=>2,
        ]);

        DB::table('vtd_KHACH_HANG')->insert([
            'vtdMaKhachHang'=>'KH004',
            'vtdHoTenKhachHang'=>'Phạm Tùng Quân',
            'vtdEmail'=>'quanpham@gmail.com',
            'vtdMatKhau'=>Hash::make('quanpham98'), // Mã hóa mật khẩu
            'vtdDienThoai'=>'094357152',
            'vtdDiaChi'=>'Hà Nội',
            'vtdNgayDangKy'=>'2024/12/03',
            'vtdTrangThai'=>0,
        ]);
    }
}