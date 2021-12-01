<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FakultasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakultases = ['Ilmu Pendidikan', 'Hukum', 'Ekonomi dan Bisnis',  'Teknik', 'Ilmu Sosial dan Budaya', 'Keislaman'];
        static $count = 0;
        return [
            'kode' => '0' . $count + 1,
            'nama_fak' => $fakultases[$count++],
        ];
    }
}
