<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            pta_quan_triTableSeeder::class,
            pta_loai_san_pham_TableSeeder::class,
            pta_san_pham_TableSeeder::class,
            pta_ct_hoa_donTableSeeder::class,
            pta_hoa_donTableSeeder::class,
            pta_tin_tuc::class,
            pta_khach_hangTableSeeder::class,
        ]);
    }
}
