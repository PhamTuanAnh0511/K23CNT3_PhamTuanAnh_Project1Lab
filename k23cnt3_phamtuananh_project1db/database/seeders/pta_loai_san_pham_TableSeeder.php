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
            'ptaTenLoai'=>"Cây cảnh văn phòng",
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L002",
            'ptaTenLoai'=>"Cây để bàn",
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L003",
            'ptaTenLoai'=>"Cây cảnh phong thủy",
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_loai_san_pham')->insert([
            'ptaMaLoai'=> "L004",
            'ptaTenLoai'=>"Cây thủy canh",
            'ptaTrangThai'=>0
        ]);
    }
}
