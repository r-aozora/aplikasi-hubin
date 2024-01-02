<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $nama = $this->faker->name,
            'slug' => Str::slug($nama),
            'nip' => $this->faker->randomNumber,
            'sebagai' => $this->faker->randomElement(['Walikelas',  'Pendamping']),
            'telepon' => $this->faker->phoneNumber,
        ];
    }
}
