<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arsip>
 */
class ArsipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_arsip' => fake()->name(),
            'nomor_arsip' => fake()->ean8(),
            'deskripsi' => fake()->sentence(),
            'jenis_arsip' => fake()->randomElement(['dokumen', 'gambar', 'surat']),
            'tgl_arsip' => now(),
        ];
    }
}
