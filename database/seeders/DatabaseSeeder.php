<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FabricSeeder::class);
        $this->command->info('Fabric table seeded!');

        $this->call(RemoteSeeder::class);
        $this->command->info('Remote table seeded!');

        $this->call(MotorSeeder::class);
        $this->command->info('Motor table seeded!');

        $this->call(FabricTypeSeeder::class);
        $this->command->info('Fabric Type table seeded!');

        $this->call(MotorDirectionSeeder::class);
        $this->command->info('Motor Direction table seeded!');

        $this->call(MotorRemoteSeeder::class);
        $this->command->info('Motor Remote table seeded!');

        $this->call(RalCodeSeeder::class);
        $this->command->info('RAL Code table seeded!');

        $this->call(ProductPriceSeeder::class);
        $this->command->info('Product Price table seeded!');
    }
}
