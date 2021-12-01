<?php

namespace Database\Seeders;

use App\Models\Program_studi;
use Illuminate\Database\Seeder;

class Program_studiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program_studi::factory()
            ->count(12)
            ->create();
    }
}
