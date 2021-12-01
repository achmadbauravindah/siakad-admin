<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->name;
        return [
            'nip' => rand(111111111111111111, 999999999999999999),
            'nama' => $nama,
            'password' => Hash::make('123123'),
            'alamat' => 'Jl. Ini Alamatnya Dosen',
            'tanggal_lahir' => now()->format('Y-m-d'),
            'tahun_masuk' => now()->format('Y'),
            'jenis_kelamin' => rand(0, 1),
            'kode_agama' => rand(1, 6),
            'kode_prodi' => rand(10, 21),
        ];
    }
}
