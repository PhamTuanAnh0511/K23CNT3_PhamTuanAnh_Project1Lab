<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pta_loai_san_pham_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L001",
            'ptaTenLoai'=>"Sơ Mi",
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L002",
            'ptaTenLoai'=>"Măng Tô",
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L003",
            'ptaTenLoai'=>"Vest",
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L004",
            'ptaTenLoai'=>"Quần Âu",
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L005",
            'ptaTenLoai'=>"Giày Da",
            'ptaTrangThai'=>0
        ]);
    }
}
