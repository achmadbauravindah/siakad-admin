<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgamaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $agamas = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kongfutsu'];
        static $count = 0;
        return [
            'kode' => $count + 1,
            'nama' => $agamas[$count++],
        ];
    }
}
