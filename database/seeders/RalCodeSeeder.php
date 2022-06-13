<?php

namespace Database\Seeders;

use App\Models\RalCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RalCode::create(['name' => 'DummyCode1']);
        RalCode::create(['name' => 'DummyCode2']);
        RalCode::create(['name' => 'DummyCode3']);
        RalCode::create(['name' => 'DummyCode4']);
        RalCode::create(['name' => 'DummyCode5']);
        RalCode::create(['name' => 'DummyCode6']);
    }
}
