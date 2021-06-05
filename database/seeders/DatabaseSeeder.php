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
         $this->call(FollowshipsSeeder::class);//Followers
         $this->call(RetetaSeeder::class);//Retete
         $this->call(CategoriiSeeder::class);//Categorii
         $this->call(RatingSeeder::class);//Rating
    }
}
