<?php

namespace Database\Seeders;

use App\Models\MotorRemote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorRemoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotorRemote::create(['motor_id' => 1, 'remote_id' => 2]);
        MotorRemote::create(['motor_id' => 1, 'remote_id' => 3]);
        MotorRemote::create(['motor_id' => 1, 'remote_id' => 6]);
        MotorRemote::create(['motor_id' => 1, 'remote_id' => 7]);

        MotorRemote::create(['motor_id' => 2, 'remote_id' => 2]);
        MotorRemote::create(['motor_id' => 2, 'remote_id' => 4]);
        MotorRemote::create(['motor_id' => 2, 'remote_id' => 5]);

        MotorRemote::create(['motor_id' => 3, 'remote_id' => 1]);
        MotorRemote::create(['motor_id' => 3, 'remote_id' => 2]);
        MotorRemote::create(['motor_id' => 3, 'remote_id' => 4]);
    }
}
