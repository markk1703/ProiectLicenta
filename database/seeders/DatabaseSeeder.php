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
         $this->call(IngredienteSeeder::class);//Ingrediente in BD pt testare
         $this->call(ValoriNutritionaleSeeder::class);//Valori nutritionale de test
         $this->call(FollowshipsSeeder::class);//Followers
         $this->call(RetetaSeeder::class);//Retete
    }
}
