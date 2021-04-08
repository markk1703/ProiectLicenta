<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reteta;

class RetetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Reteta 1',
            'ingrediente'=>'100 ml lapte, 2 oua',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            ]);
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Reteta 2',
            'ingrediente'=>'2 catei usturoi, sare',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'cat1, cat2, cat3',
            ]);
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Reteta 3',
            'ingrediente'=>'500 g piept pui, 2 buc morcovi, piper',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'c1, c2, c3',
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Reteta 4',
            'ingrediente'=>'200 g faina, 2 buc ceapa, 2 oua',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Reteta 5',
            'ingrediente'=>'2 morcovi',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'ca1, ca2, ca3',
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Reteta 6',
            'ingrediente'=>'sare, 300 ml lapte, 3 oua',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Reteta 7',
            'ingrediente'=>'2 catei usturoi, 700 g piept pui',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            ]);
        Reteta::create([
            'utilizator_id'=>'5',
            'denumire'=>'Reteta 8',
            'ingrediente'=>'2 buc ceapa, 150 g faina',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            ]);
    }
}
