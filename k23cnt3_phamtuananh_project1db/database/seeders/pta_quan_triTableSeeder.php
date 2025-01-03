<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 
class pta_quan_triTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ptaMatkhau = md5("123456a@");
        DB::table('pta_quan_tri')->insert([
            'ptaTaiKhoan'=>"sktkgame69@gmail.com",
            'ptaMatKhau'=> $ptaMatkhau,
            'ptaTrangThai'=>0
        ]);
        DB::table('pta_quan_tri')->insert([
            'ptaTaiKhoan'=>"0984551682",
            'ptaMatKhau'=> $ptaMatkhau,
            'ptaTrangThai'=>0
        ]);
    }
}

