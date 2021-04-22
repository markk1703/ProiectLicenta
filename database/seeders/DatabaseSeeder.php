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
         $this->call(RoluriSeeder::class);//Roluri
         $this->call(UserSeeder::class); //Useri random
         $this->call(JudetSeeder::class); //pt toate judetele din RO
         ///$this->call(LocalitateSeeder::class); //pt toate localitatile din RO //NU il folosesc
         $this->call(AdreseSeeder::class); //Adrese random + populare 'localitati'
         $this->call(FollowshipsSeeder::class);//Followers
         $this->call(RetetaSeeder::class);//Retete
         $this->call(CategoriiSeeder::class);//Categorii
         $this->call(RatingSeeder::class);//Rating
    }
}
