<?php

namespace Database\Seeders;

use App\Models\Arsip;
use App\Models\Agenda;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        Agenda::factory(10)->create();
        Arsip::factory(10)->create();
        SuratMasuk::factory(10)->create();
        SuratKeluar::factory(10)->create();
    }
}
