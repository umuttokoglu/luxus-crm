<?php

namespace Database\Seeders;

use App\Models\Fabric;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fabric::create(['name' => 'Copaco Serge 600']);
        Fabric::create(['name' => 'Soltis 86']);
        Fabric::create(['name' => 'Soltis 92']);
        Fabric::create(['name' => 'Soltis 96']);
        Fabric::create(['name' => 'Şeffaf PVC']);
    }
}
