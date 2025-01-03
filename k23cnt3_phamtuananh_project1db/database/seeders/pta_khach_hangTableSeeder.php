<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Đảm bảo Hash được sử dụng

class pta_khach_hangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pta_khach_hang')->insert([
            'ptaMaKhachHang'=>'KH001',
            'ptaHoTenKhachHang'=>'Phạm Tuấn Anh',
            'ptaEmail'=>'Phamtuan@gmail.com',
            'ptaMatKhau'=>Hash::make('123456a@'), // Mã hóa mật khẩu
            'ptaDienThoai'=>'012550036',
            'ptaDiaChi'=>'Yên Bái-Yên Bình',
            'ptaNgayDangKy'=>'2024/12/12',
            'ptaTrangThai'=>0,
        ]);

        DB::table('pta_khach_hang')->insert([
            'ptaMaKhachHang'=>'KH002',
            'ptaHoTenKhachHang'=>'Trần Tuấn Hưng',
            'ptaEmail'=>'hungtran@gmail.com',
            'ptaMatKhau'=>Hash::make('hungyb123'), // Mã hóa mật khẩu
            'ptaDienThoai'=>'012588868',
            'ptaDiaChi'=>'Phú Thọ',
            'ptaNgayDangKy'=>'2024/12/20',
            'ptaTrangThai'=>0,
        ]);

        DB::table('pta_khach_hang')->insert([
            'ptaMaKhachHang'=>'KH003',
            'ptaHoTenKhachHang'=>'Phan Quang Minh',
            'ptaEmail'=>'pminh@gmail.com',
            'ptaMatKhau'=>Hash::make('pminh3366'), // Mã hóa mật khẩu
            'ptaDienThoai'=>'0382550508',
            'ptaDiaChi'=>'Phú Thọ',
            'ptaNgayDangKy'=>'2024/12/17',
            'ptaTrangThai'=>2,
        ]);

        DB::table('pta_khach_hang')->insert([
            'ptaMaKhachHang'=>'KH004',
            'ptaHoTenKhachHang'=>'Phạm Tùng Quân',
            'ptaEmail'=>'quanpham@gmail.com',
            'ptaMatKhau'=>Hash::make('quanpham98'), // Mã hóa mật khẩu
            'ptaDienThoai'=>'094357152',
            'ptaDiaChi'=>'Hà Nội',
            'ptaNgayDangKy'=>'2024/12/03',
            'ptaTrangThai'=>0,
        ]);
    }
}