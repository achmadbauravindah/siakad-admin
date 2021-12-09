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
        $matkuls = [
            '1IF002', 'Komputasi Numerik', '3', '1',
            '1IF003', 'Organisasi Komputer', '3', '1',
            '1IF004', 'Algoritma Pemrograman', '4', '1',
            '1IF005', 'Struktur Data', '4', '1',
            '1IF006', 'PPKn', '3', '1',
            '2IF001', 'Sistem Informasi Manajemen', '3', '2',
            '2IF002', 'Pengolah Citra Digital', '3', '2',
            '2IF003', 'Sistem Basisdata', '3', '2',
            '2IF004', 'Pemrograman Game', '3', '2',
            '2IF005', 'Komputational Intelligence', '3', '2',
            '2IF006', 'Multimedia', '3', '2',
            '3IF001', 'Metodologi Penelitian', '3', '2',
            '3IF002', 'Bahasa Inggris', '3', '3',
            '4IF001', 'Mobile Programming', '3', '4',
            '4IF002', 'Biomedical Imaging', '3', '4',

        ];
        $nama = $this->faker->name;
        static $nip = 195101251682031001;
        static $countt = -4;
        if ($countt > 50) {
            $countt = -4;
        }
        return [
            'nip' => $nip++,
            'nama' => $nama,
            'password' => Hash::make('123123'),
            'alamat' => 'Jl. Ini Alamatnya Dosen',
            'tanggal_lahir' => now()->format('Y-m-d'),
            'tahun_masuk' => now()->format('Y'),
            'jenis_kelamin' => rand(0, 1),
            'kode_agama' => rand(1, 6),
            'kode_prodi' => rand(10, 21),
            'kode_matkul' => $matkuls[$countt = $countt + 4],
        ];
    }
}
