<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_acara' => fake()->word,
            'tempat' => fake()->word,
            'tgl_mulai' => now(),
            'tgl_selesai' => now(),
            'waktu' => now(),
            'deskripsi' => fake()->sentence(),
            'status' => fake()->randomElement(['pending', 'completed']),
        ];
    }
}
