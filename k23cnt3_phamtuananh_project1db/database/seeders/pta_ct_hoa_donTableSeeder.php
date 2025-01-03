<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class pta_ct_hoa_donTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pta_ct_hoa_don')->insert([
            'ptaHoaDonID'=>1,
            'ptaSanPhamID'=>1,
            'ptaSoLuongMua'=>12,
            'ptaDonGiaMua'=>699000,
            'ptaThanhTien'=>699000 * 12,
            'ptaTrangThai'=>0,
        ]);

        DB::table('pta_ct_hoa_don')->insert([
            'ptaHoaDonID'=>2,
            'ptaSanPhamID'=>2,
            'ptaSoLuongMua'=>20,
            'ptaDonGiaMua'=>550000,
            'ptaThanhTien'=>550000 * 20,
            'ptaTrangThai'=>0,
        ]);

        DB::table('pta_ct_hoa_don')->insert([
            'ptaHoaDonID'=>3,
            'ptaSanPhamID'=>5,
            'ptaSoLuongMua'=>5,
            'ptaDonGiaMua'=>590000,
            'ptaThanhTien'=>590000 *  5,
            'ptaTrangThai'=>0,
        ]);

        DB::table('pta_ct_hoa_don')->insert([
            'ptaHoaDonID'=>4,
            'ptaSanPhamID'=>8,
            'ptaSoLuongMua'=>3,
            'ptaDonGiaMua'=>199000,
            'ptaThanhTien'=>199000 * 3,
            'ptaTrangThai'=>0,
        ]);
    }
}