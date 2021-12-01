<?php

namespace Database\Seeders;

use App\Models\Status_matkul;
use Illuminate\Database\Seeder;

class Status_matkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status_matkul::factory()
            ->count(5)
            ->create();
    }
}
