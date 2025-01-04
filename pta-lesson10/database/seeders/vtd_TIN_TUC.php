<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class vtd_TIN_TUC extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 10 rows of fake data into the 'vtd_TIN_TUC' table
        for ($i = 0; $i < 10; $i++) {
            DB::table('vtd_TIN_TUC')->insert([
                'vtdMaTT' => $faker->unique()->word, // Unique identifier for the news article
                'vtdTieuDe' => $faker->sentence, // Title of the news article
                'vtdMoTa' => $faker->text(200), // Description (shorter text)
                'vtdNoiDung' => $faker->paragraph(5), // Content (longer text)
                'vtdNgayDangTin' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'vtdNgayCapNhap' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'vtdHinhAnh' => $faker->imageUrl(), // Random image URL
                'vtdTrangThai' => $faker->numberBetween(0, 1), // Status (0 or 1, assuming binary status)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}