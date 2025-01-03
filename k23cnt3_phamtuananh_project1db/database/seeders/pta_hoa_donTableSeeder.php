<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class pta_hoa_donTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pta_hoa_don')->insert([
            'ptaMaHoaDon'=>'HD001',
            'ptaMaKhachHang'=>1,
            'ptaNgayHoaDon'=>'2024/12/12',
            'ptaNgayNhan'=>'2024/12/12',
            'ptaHoTenKhachHang'=>'Phạm Tuấn Anh',
            'ptaEmail'=>'Phamtuan@gmail.com',
            'ptaDienThoai'=>'012550036',
            'ptaDiaChi'=>'Yên Bái-Yên Bình',
            'ptaTongGiaTri'=>'790000',
            'ptaTrangThai'=>2,
        ]);

        DB::table('pta_hoa_don')->insert([
            'ptaMaHoaDon'=>'HD002',
            'ptaMaKhachHang'=>2,
            'ptaNgayHoaDon'=>'2024/12/20',
            'ptaNgayNhan'=>'2024/12/21',
            'ptaHoTenKhachHang'=>'Trần Tuấn Hưng',
            'ptaEmail'=>'hungtran@gmail.com',
            'ptaDienThoai'=>'012588868',
            'ptaDiaChi'=>'Phú Thọ',
            'ptaTongGiaTri'=>'125000',
            'ptaTrangThai'=>0,
        ]);

        DB::table('pta_hoa_don')->insert([
            'ptaMaHoaDon'=>'HD003',
            'ptaMaKhachHang'=>3,
            'ptaNgayHoaDon'=>'2024/12/17',
            'ptaNgayNhan'=>'2024/12/17',
            'ptaHoTenKhachHang'=>'Phan Quang Minh',
            'ptaEmail'=>'pminh@gmail.com',
            'ptaDienThoai'=>'0382550508',
            'ptaDiaChi'=>'Phú Thọ',
            'ptaTongGiaTri'=>'999000',
            'ptaTrangThai'=>1,
        ]);

        DB::table('pta_hoa_don')->insert([
            'ptaMaHoaDon'=>'HD004',
            'ptaMaKhachHang'=>1,
            'ptaNgayHoaDon'=>'2024/12/12',
            'ptaNgayNhan'=>'2024/12/12',
            'ptaHoTenKhachHang'=>'Vũ Tiến Đức',
            'ptaEmail'=>'vuducc@gmail.com',
            'ptaDienThoai'=>'012550036',
            'ptaDiaChi'=>'Yên Bái-Yên Bình',
            'ptaTongGiaTri'=>'660000',
            'ptaTrangThai'=>1,
        ]);

        DB::table('pta_hoa_don')->insert([
            'ptaMaHoaDon'=>'HD005',
            'ptaMaKhachHang'=>4,
            'ptaNgayHoaDon'=>'2024/12/03',
            'ptaNgayNhan'=>'2024/12/04',
            'ptaHoTenKhachHang'=>'Phạm Tùng Quân',
            'ptaEmail'=>'quanpham@gmail.com',
            'ptaDienThoai'=>'094357152',
            'ptaDiaChi'=>'Hà Nội',
            'ptaTongGiaTri'=>'777999',
            'ptaTrangThai'=>1,
        ]);
    }
}