<?php

namespace Database\Seeders;

use App\Models\Citizen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Citizen::factory(100)->create();
    }
}
