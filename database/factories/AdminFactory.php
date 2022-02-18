<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'username' => 'adminadmin',
            'password' => '$2y$10$XOlYimovWeCTdm6wZjr28O19pI7dykZuq2Thmd9WNegRAD6N65sFa'
        ];
    }
}
