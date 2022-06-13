<?php

namespace Database\Seeders;

use App\Models\Motor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motor::create(['name' => 'Somfy']);
        Motor::create(['name' => 'Becker']);
        Motor::create(['name' => 'Mosel']);
    }
}
