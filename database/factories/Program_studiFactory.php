<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Program_studiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prodi = [
            '10', 'Teknik Informatika', '11',
            '11', 'Sistem Informasi', '11',
            '12', 'Teknik Industri', '21',
            '13', 'Teknik Elektro', '31',
            '14', 'Teknik Mekatronika', '31',
            '15', 'Ilmu Hukum', '12',
            '16', 'PGSD', '13',
            '17', 'Pendidikan Informatika', '13',
            '18', 'Pendidikan IPA', '13',
            '19', 'Akuntansi', '14',
            '20', 'Ekonomi Pembangunan', '14',
            '21', 'Manajemen', '14',
        ];
        static $count = 0;
        return [
            'kode' => $prodi[$count++],
            'nama_prod' => $prodi[$count++],
            'kode_jur' => $prodi[$count++],
        ];
    }
}
