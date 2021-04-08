<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Ingrediente;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingrediente::create([
            'denumire'=>'lapte',
            'categorie'=>'lactate',
            'unitateDeMasura'=>'ml'
            ]);
        Ingrediente::create([
            'denumire'=>'oua',
            'categorie'=>'altele',
            'unitateDeMasura'=>'buc'
            ]);
        Ingrediente::create([
            'denumire'=>'usturoi',
            'categorie'=>'legume',
            'unitateDeMasura'=>'catei'
            ]);
        Ingrediente::create([
            'denumire'=>'ceapa',
            'categorie'=>'legume',
            'unitateDeMasura'=>'buc'
            ]);
        Ingrediente::create([
            'denumire'=>'faina',
            'categorie'=>'altele',
            'unitateDeMasura'=>'g'
            ]);
        Ingrediente::create([
            'denumire'=>'piper',
            'categorie'=>'condimente'
            ]);
        Ingrediente::create([
            'denumire'=>'sare',
            'categorie'=>'condimente'
            ]);
        Ingrediente::create([
            'denumire'=>'piept pui',
            'categorie'=>'carne',
            'unitateDeMasura'=>'g'
            ]);
        Ingrediente::create([
            'denumire'=>'morcovi',
            'categorie'=>'legume',
            'unitateDeMasura'=>'buc'
            ]);
        // DB::table('ingrediente')->insert(['denumire'=>'lapte','categorie'=>'lactate','unitateDeMasura'=>'ml']);
        // DB::table('ingrediente')->insert(['denumire'=>'oua','categorie'=>'altele','unitateDeMasura'=>'buc']);
        // DB::table('ingrediente')->insert(['denumire'=>'usturoi','categorie'=>'legume','unitateDeMasura'=>'catei']);
        // DB::table('ingrediente')->insert(['denumire'=>'ceapa','categorie'=>'legume','unitateDeMasura'=>'buc']);
        // DB::table('ingrediente')->insert(['denumire'=>'faina','categorie'=>'altele','unitateDeMasura'=>'g']);
        // DB::table('ingrediente')->insert(['denumire'=>'piper','categorie'=>'condimente']);
        // DB::table('ingrediente')->insert(['denumire'=>'sare','categorie'=>'condimente']);
        // DB::table('ingrediente')->insert(['denumire'=>'piept pui','categorie'=>'carne','unitateDeMasura'=>'g']);
        // DB::table('ingrediente')->insert(['denumire'=>'morcovi','categorie'=>'legume','unitateDeMasura'=>'buc']);

    }
}
