<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class vtd_CT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('vtd_CT_HOA_DON')->insert([
            'vtdHoaDonID'=>1,
            'vtdSanPhamID'=>1,
            'vtdSoLuongMua'=>12,
            'vtdDonGiaMua'=>699000,
            'vtdThanhTien'=>699000 * 12,
            'vtdTrangThai'=>0,
        ]);

        DB::table('vtd_CT_HOA_DON')->insert([
            'vtdHoaDonID'=>2,
            'vtdSanPhamID'=>2,
            'vtdSoLuongMua'=>20,
            'vtdDonGiaMua'=>550000,
            'vtdThanhTien'=>550000 * 20,
            'vtdTrangThai'=>0,
        ]);

        DB::table('vtd_CT_HOA_DON')->insert([
            'vtdHoaDonID'=>3,
            'vtdSanPhamID'=>5,
            'vtdSoLuongMua'=>5,
            'vtdDonGiaMua'=>590000,
            'vtdThanhTien'=>590000 *  5,
            'vtdTrangThai'=>0,
        ]);

        DB::table('vtd_CT_HOA_DON')->insert([
            'vtdHoaDonID'=>4,
            'vtdSanPhamID'=>8,
            'vtdSoLuongMua'=>3,
            'vtdDonGiaMua'=>199000,
            'vtdThanhTien'=>199000 * 3,
            'vtdTrangThai'=>0,
        ]);
    }
}