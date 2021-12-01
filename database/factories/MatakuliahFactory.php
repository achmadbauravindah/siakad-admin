<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
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
        static $count = 0;
        return [
            'kode' => $matkuls[$count++],
            'nama' => $matkuls[$count++],
            'sks' => $matkuls[$count++],
            'kode_status_matkul' => $matkuls[$count++],
        ];
    }
}
