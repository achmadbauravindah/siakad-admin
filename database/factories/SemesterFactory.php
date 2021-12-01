<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $count = 0;
        return [
            'kode' => $count + 1,
            'nama' => ($count++) % 2 == 1 ? 'Genap' : 'Ganjil',
        ];
    }
}
