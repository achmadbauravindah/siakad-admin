<?php

namespace Database\Seeders;

use App\Models\Khs;
use Illuminate\Database\Seeder;

class KhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Khs::factory()
            ->count(10)
            ->create();
    }
}
