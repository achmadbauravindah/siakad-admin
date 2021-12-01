<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jurusans = [
            '11', "Informatika", '04',
            '21', "Industri", '04',
            '31', "Elektro", '04',
            '12', "Hukum", '02',
            '13', "Pendidikan", '01',
            '14', "Ekonomi", '03',
        ];
        static $count = 0;
        return [
            'kode' => $jurusans[$count++],
            'nama_jur' => $jurusans[$count++],
            'kode_fak' => $jurusans[$count++],
        ];
    }
}
