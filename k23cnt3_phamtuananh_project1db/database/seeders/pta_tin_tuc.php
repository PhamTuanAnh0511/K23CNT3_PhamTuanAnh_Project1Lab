<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class pta_tin_tuc extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 10 rows of fake data into the 'pta_tin_tuc' table
        for ($i = 0; $i < 10; $i++) {
            DB::table('pta_tin_tuc')->insert([
                'ptaMaTT' => $faker->unique()->word, // Unique identifier for the news article
                'ptaTieuDe' => $faker->sentence, // Title of the news article
                'ptaMoTa' => $faker->text(200), // Description (shorter text)
                'ptaNoiDung' => $faker->paragraph(5), // Content (longer text)
                'ptaNgayDangTin' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'ptaNgayCapNhap' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'ptaHinhAnh' => $faker->imageUrl(), // Random image URL
                'ptaTrangThai' => $faker->numberBetween(0, 1), // Status (0 or 1, assuming binary status)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}