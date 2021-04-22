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
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Reteta 2',
            'ingrediente'=>'2 catei usturoi, sare',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'cat1, cat2, cat3',
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Reteta 3',
            'ingrediente'=>'500 g piept pui, 2 buc morcovi, piper',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'c1, c2, c3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Reteta 4',
            'ingrediente'=>'200 g faina, 2 buc ceapa, 2 oua',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Reteta 5',
            'ingrediente'=>'2 morcovi',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'ca1, ca2, ca3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Reteta 6',
            'ingrediente'=>'sare, 300 ml lapte, 3 oua',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Reteta 7',
            'ingrediente'=>'2 catei usturoi, 700 g piept pui',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'5',
            'denumire'=>'Reteta 8',
            'ingrediente'=>'2 buc ceapa, 150 g faina',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Reteta 1',
            'ingrediente'=>'2 buc ceapa, 150 g faina',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Reteta 2',
            'ingrediente'=>'2 buc ceapa, 150 g faina',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Reteta 3',
            'ingrediente'=>'sare, 300 ml lapte, 3 oua',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'5',
            'denumire'=>'Reteta 4',
            'ingrediente'=>'500 g piept pui, 2 buc morcovi, piper',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'c1, c2, c3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'4',
            'denumire'=>'Reteta 5',
            'ingrediente'=>'2 catei usturoi, sare',
            'mod_de_preparare'=>'Descriere mod de preparare',
            'categorii'=>'cat1, cat2, cat3',
            'imagine_principala'=>'avatar.jfif'
            ]);
        Reteta::create([
            'utilizator_id'=>'4',
            'denumire'=>'Supă cremă de usturoi cu năut',
            'ingrediente'=>"8 căpățâni usturoi, 250 grame năut fiert, 1 tijă țelină apio (sau 1 bucată mică de țelină – rădăcină), 1/4 linguriță pudră cimbrișor, 1 lingură ulei măsline extravirgin, 150 grame iaurt grecesc (optional), 50 grame cheddar ras, 1,5 l apă sau supă de legume, sare și piper – după gust",
            'mod_de_preparare'=>'Se curăță cățeii de usturoi și se lasă deoparte. Se înfierbântă apa/supa de legume și se fierbe țelina, împreună cu cimbrișorul și puțină sare. Se adaugă năutul și usturoiul și se mai lasă pe foc încă 5  min. Se stinge focul, se lasă 5-10 min să se răcească, după care se mixează totul cu blenderul vertical, ori în blender, până se obține o cremă fină.Se adaugă uleiul de măsline și iaurtul grecesc și se mixează din nou câteva secunde, pentru omogenizare. Supa cremă de usturoi cu năut se poate servi imediat, decorată cu puțin ulei de măsline, cheddar ras și cimbrișor.',
            'categorii'=>'supă, supă cremă',
            'imagine_principala'=>'avatar.jpg'
            ]);

        Reteta::create([
            'utilizator_id'=>'6',
            'denumire'=>'Hummus cremos cu avocado',
            'ingrediente'=>"2 conserve Năut, 1 linguriță bicarbonat de sodiu, 60 g tahini, 60 ml ulei de măsline, 2 linguri Zeamă de lămâie, 1 bucată Avocado, sare, piper, 2 căței usturoi, 1 linguriță chimen",
            'mod_de_preparare'=>'Scurgem năutul din conservă și păstrăm lichidul.Îl putem folosi mai târziu pentru a ajuta consistența hummus-ului. Curățăm boabele de năut de pielițe, îndepărtând cât mai multe. Spălăm apoi bine năutul și îl punem la fiert în apă cu bicarbonat. Lăsăm să fiarbă 5 minute la foc mare, apoi scurgem din nou năutul. Punem în blender năutul, avocado curățat de coajă, uleiul de măsline, tahini, usturoiul trecut prin presă, sare și piper, zeamă de lămâie. Amestecăm foarte bine, la viteză mare.Din când în când oprim blenderul și amestecăm cu spatula, astfel încât să nu rămână bucăți de năut pe pereții vasului. În funcție de consistența pe care o dorim, putem adăuga apă din conserva de năut sau ulei de măsline.',
            'categorii'=>'hummus, vegan',
            'imagine_principala'=>'avatar.jpeg'
            ]);
    }
}
