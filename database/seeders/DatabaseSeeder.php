<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AgamaSeeder::class,
            FakultasSeeder::class,
            JurusanSeeder::class,
            Program_studiSeeder::class,
            Status_matkulSeeder::class,
            SemesterSeeder::class,
            MatakuliahSeeder::class,
            MahasiswaSeeder::class,
            DosenSeeder::class,
            KrsSeeder::class,
            KhsSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
