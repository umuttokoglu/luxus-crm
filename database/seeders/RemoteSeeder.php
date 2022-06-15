<?php

namespace Database\Seeders;

use App\Models\Remote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Remote::create(['name' => 'Ücretsiz Kumanda', 'price' => 0]);
        Remote::create(['name' => '1 Kanallı Kumanda', 'price' => 46]);
        Remote::create(['name' => '4 Kanallı Kumanda', 'price' => 78]);
        Remote::create(['name' => '5 Kanallı Kumanda', 'price' => 73]);
        Remote::create(['name' => '10 Kanallı Kumanda', 'price' => 130]);
        Remote::create(['name' => '16 Kanallı Kumanda', 'price' => 216]);
        Remote::create(['name' => '60 Kanallı Kumanda', 'price' => 240]);
    }
}
