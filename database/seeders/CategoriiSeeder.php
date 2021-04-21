<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$categorii=['salate','bauturi','garnituri','mancaruri cu carne','supe si ciorbe','vegan',
    'aperitive','desert'
    ];
        foreach ($categorii as $categorie) {
            Categorie::create(array(
                'denumire'=>$categorie
            ));
        }
    }
}
