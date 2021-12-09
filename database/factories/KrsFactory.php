<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class KrsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nim = '1904111000';
        static $nimAfter2 = 10;
        return [
            'tahun_ajaran' => '2020/2021',
            'kode_matkul' => '1IF002',
            'nim_mahasiswa' => $nim . $nimAfter2++,
            'kode_semester' => '5',
            'nip_dosen' => 195101251682031001,
        ];
    }
}
