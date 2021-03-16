<?php

namespace Database\Seeders;

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
         //\App\Models\User::factory(10)->create();
         $this->call(UserSeeder::class); //Useri random
         $this->call(JudetSeeder::class); //pt toate judetele din RO
         //$this->call(LocalitateSeeder::class); //pt toate localitatile din RO
         $this->call(AdreseSeeder::class); //Adrese random + populare 'localitati'
    }
}
