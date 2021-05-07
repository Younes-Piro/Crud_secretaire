<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Services;
class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Services::factory()->times(10)->create();
    }
}