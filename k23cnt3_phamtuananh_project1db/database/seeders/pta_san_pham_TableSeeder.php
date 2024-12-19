<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pta_san_pham_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "VP001",
            'ptaTenSanPham'=> "Cây phú quý",
            'ptaHinhAnh'=>"images/san-pham/VP001.jpg",
            'ptaSoLuong'=>100,
            'ptaDonGia'=>699000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "VP002",
            'ptaTenSanPham'=> "Cây đại phú gia",
            'ptaHinhAnh'=>"images/san-pham/VP002.jpg",
            'ptaSoLuong'=>200,
            'ptaDonGia'=>550000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "VP003",
            'ptaTenSanPham'=> "Cây hạnh phúc",
            'ptaHinhAnh'=>"images/san-pham/VP003.jpg",
            'ptaSoLuong'=>150,
            'ptaDonGia'=>250000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "VP004",
            'ptaTenSanPham'=> "Cây vạn lộc",
            'ptaHinhAnh'=>"images/san-pham/VP004.jpg",
            'ptaSoLuong'=>300,
            'ptaDonGia'=>799000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT001",
            'ptaTenSanPham'=> "Cây thiết mộc lan",
            'ptaHinhAnh'=>"images/san-pham/PT001.jpg",
            'ptaSoLuong'=>150,
            'ptaDonGia'=>590000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT002",
            'ptaTenSanPham'=> "Cây trường sinh",
            'ptaHinhAnh'=>"images/san-pham/PT002.jpg",
            'ptaSoLuong'=>100,
            'ptaDonGia'=>150000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT003",
            'ptaTenSanPham'=> "Cây hạnh phúc",
            'ptaHinhAnh'=>"images/san-pham/PT003.jpg",
            'ptaSoLuong'=>200,
            'ptaDonGia'=>299000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT004",
            'ptaTenSanPham'=> "Cây hoa nhài(Lài ta)",
            'ptaHinhAnh'=>"images/san-pham/PT004.jpg",
            'ptaSoLuong'=>300,
            'ptaDonGia'=>199000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
    }
}
