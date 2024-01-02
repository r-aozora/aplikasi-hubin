<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'          => $nama = $this->faker->name,
            'slug'          => Str::slug($nama),
            'nis'           => $this->faker->randomNumber,
            'nisn'          => $this->faker->randomNumber,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'telepon'       => $this->faker->phoneNumber,
            'telepon_ortu'  => $this->faker->phoneNumber,
            'email'         => $this->faker->email,
            'alamat'        => $this->faker->address,
            'id_kelas'      => Kelas::inRandomOrder()->first()->id,
        ];
    }
}
