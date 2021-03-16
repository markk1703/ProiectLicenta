<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdreseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Adrese::factory(20)->create();
    }
}
