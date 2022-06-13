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
        Remote::create(['name' => 'Ücretsiz Kumanda']);
        Remote::create(['name' => '1 Kanallı Kumanda']);
        Remote::create(['name' => '4 Kanallı Kumanda']);
        Remote::create(['name' => '5 Kanallı Kumanda']);
        Remote::create(['name' => '10 Kanallı Kumanda']);
        Remote::create(['name' => '16 Kanallı Kumanda']);
        Remote::create(['name' => '60 Kanallı Kumanda']);
    }
}
