<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Status_matkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [
            'Matakuliah Kehlian Dasar',
            'Matakuliah Kehlian Kusus',
            'Matakuliah Kehlian Wajib Universitas',
            'Matakuliah Kehlian Pilihan',
            'Matakuliah Umum',
        ];
        static $count = 0;
        return [
            'kode' => $count + 1,
            'nama' => $status[$count++],
        ];
    }
}
