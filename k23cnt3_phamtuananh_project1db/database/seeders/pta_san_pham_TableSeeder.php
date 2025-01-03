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
            'ptaTenSanPham'=> "Sơ Mi Đen Trơn",
            'ptaHinhAnh'=>"img/san_pham/sp01.webp",
            'ptaSoLuong'=>100,
            'ptaDonGia'=>699000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "VP002",
            'ptaTenSanPham'=> "Măng Tô Đen Dáng Dài",
            'ptaHinhAnh'=>"img/san_pham/sp02.jpg",
            'ptaSoLuong'=>200,
            'ptaDonGia'=>550000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "VP003",
            'ptaTenSanPham'=> "Áo Vest Ghi Đen Trơn",
            'ptaHinhAnh'=>"img/san_pham/sp03.jpg",
            'ptaSoLuong'=>150,
            'ptaDonGia'=>250000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "VP004",
            'ptaTenSanPham'=> "Quần Âu Nâu Trơn",
            'ptaHinhAnh'=>"img/san_pham/sp04.jpg",
            'ptaSoLuong'=>300,
            'ptaDonGia'=>799000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT001",
            'ptaTenSanPham'=> "Giày dada nam buộc dây đen trơn",
            'ptaHinhAnh'=>"img/san_pham/sp05.jpg",
            'ptaSoLuong'=>150,
            'ptaDonGia'=>590000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT002",
            'ptaTenSanPham'=> "Giày da loafer trắng họa tiết khoét mắt",
            'ptaHinhAnh'=>"img/san_pham/sp06.jpg",
            'ptaSoLuong'=>100,
            'ptaDonGia'=>150000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT003",
            'ptaTenSanPham'=> "Vest nhung xanh tt",
            'ptaHinhAnh'=>"img/san_pham/sp07.jpg",
            'ptaSoLuong'=>200,
            'ptaDonGia'=>299000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
        DB::table("pta_san_pham")->insert([
            'ptaMaSanPham'=> "PT004",
            'ptaTenSanPham'=> "Măng tô ghi kẻ",
            'ptaHinhAnh'=>"img/san_pham/sp08.jpg",
            'ptaSoLuong'=>300,
            'ptaDonGia'=>199000,
            'ptaMaLoai'=>1,
            'ptaTrangThai'=>0
        ]);
    }
}
