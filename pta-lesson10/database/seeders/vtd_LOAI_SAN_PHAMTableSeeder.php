<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class vtd_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('vtd_LOAI_SAN_PHAM')->insert([
            'vtdMaLoai'=>'IP',
            'vtdTenLoai'=>'IPHONE',
            'vtdTrangThai'=>0
        ]);
        DB::table('vtd_LOAI_SAN_PHAM')->insert([
            'vtdMaLoai'=>'SS',
            'vtdTenLoai'=>'SAMSUNG',
            'vtdTrangThai'=>0
        ]);
        DB::table('vtd_LOAI_SAN_PHAM')->insert([
            'vtdMaLoai'=>'HW',
            'vtdTenLoai'=>'HUAWAI',
            'vtdTrangThai'=>0
        ]);
       
    }
}