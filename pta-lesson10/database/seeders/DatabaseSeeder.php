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
            vtd_QUAN_TRITableSeeder::class,
            vtd_LOAI_SAN_PHAMTableSeeder::class,
            vtd_SAN_PHAMTableSeeder::class,
            vtd_KHACH_HANGTableSeeder::class,
            vtd_HOA_DONTableSeeder::class,
            vtd_CT_HOA_DONTableSeeder::class,
            vtd_TIN_TUC::class

        ]);
        
    }
}