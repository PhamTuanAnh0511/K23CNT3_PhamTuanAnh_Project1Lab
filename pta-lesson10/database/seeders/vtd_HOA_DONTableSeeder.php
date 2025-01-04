<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class vtd_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('vtd_HOA_DON')->insert([
            'vtdMaHoaDon'=>'HD001',
            'vtdMaKhachHang'=>1,
            'vtdNgayHoaDon'=>'2024/12/12',
            'vtdNgayNhan'=>'2024/12/12',
            'vtdHoTenKhachHang'=>'Vũ Tiến Đức',
            'vtdEmail'=>'vuducc@gmail.com',
            'vtdDienThoai'=>'012550036',
            'vtdDiaChi'=>'Yên Bái-Yên Bình',
            'vtdTongGiaTri'=>'790000',
            'vtdTrangThai'=>2,
        ]);

        DB::table('vtd_HOA_DON')->insert([
            'vtdMaHoaDon'=>'HD002',
            'vtdMaKhachHang'=>2,
            'vtdNgayHoaDon'=>'2024/12/20',
            'vtdNgayNhan'=>'2024/12/21',
            'vtdHoTenKhachHang'=>'Trần Tuấn Hưng',
            'vtdEmail'=>'hungtran@gmail.com',
            'vtdDienThoai'=>'012588868',
            'vtdDiaChi'=>'Phú Thọ',
            'vtdTongGiaTri'=>'125000',
            'vtdTrangThai'=>0,
        ]);

        DB::table('vtd_HOA_DON')->insert([
            'vtdMaHoaDon'=>'HD003',
            'vtdMaKhachHang'=>3,
            'vtdNgayHoaDon'=>'2024/12/17',
            'vtdNgayNhan'=>'2024/12/17',
            'vtdHoTenKhachHang'=>'Phan Quang Minh',
            'vtdEmail'=>'pminh@gmail.com',
            'vtdDienThoai'=>'0382550508',
            'vtdDiaChi'=>'Phú Thọ',
            'vtdTongGiaTri'=>'999000',
            'vtdTrangThai'=>1,
        ]);

        DB::table('vtd_HOA_DON')->insert([
            'vtdMaHoaDon'=>'HD004',
            'vtdMaKhachHang'=>1,
            'vtdNgayHoaDon'=>'2024/12/12',
            'vtdNgayNhan'=>'2024/12/12',
            'vtdHoTenKhachHang'=>'Vũ Tiến Đức',
            'vtdEmail'=>'vuducc@gmail.com',
            'vtdDienThoai'=>'012550036',
            'vtdDiaChi'=>'Yên Bái-Yên Bình',
            'vtdTongGiaTri'=>'660000',
            'vtdTrangThai'=>1,
        ]);

        DB::table('vtd_HOA_DON')->insert([
            'vtdMaHoaDon'=>'HD005',
            'vtdMaKhachHang'=>4,
            'vtdNgayHoaDon'=>'2024/12/03',
            'vtdNgayNhan'=>'2024/12/04',
            'vtdHoTenKhachHang'=>'Phạm Tùng Quân',
            'vtdEmail'=>'quanpham@gmail.com',
            'vtdDienThoai'=>'094357152',
            'vtdDiaChi'=>'Hà Nội',
            'vtdTongGiaTri'=>'777999',
            'vtdTrangThai'=>1,
        ]);
    }
}