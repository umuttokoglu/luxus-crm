<?php

namespace Database\Seeders;

use App\Models\MotorDirection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorDirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotorDirection::create(['name' => 'Sağ Üst']);
        MotorDirection::create(['name' => 'Sağ Arka']);
        MotorDirection::create(['name' => 'Sağ Yan']);
        MotorDirection::create(['name' => 'Sol Üst']);
        MotorDirection::create(['name' => 'Sol Arka']);
        MotorDirection::create(['name' => 'Sol Yan']);
    }
}
