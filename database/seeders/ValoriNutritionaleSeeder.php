<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValoriNutritionaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valori_nutritionale')->insert(['ingredient_id'=>'1','calorii'=>'62 kcal','grasimi'=>'3.5 g',
        'grasimi saturate'=>'2.4 g','glucide'=>'4.5 g','proteine'=>'3 g','sare'=>'0.1 g','calciu'=>'118 mg']);
        DB::table('valori_nutritionale')->insert(['ingredient_id'=>'2','calorii'=>'171 kcal','grasimi'=>'2 g',
        'grasimi saturate'=>'1 g','glucide'=>'0.6 g','proteine'=>'14 g','sare'=>'0 g','calciu'=>'108 mg']);
        DB::table('valori_nutritionale')->insert(['ingredient_id'=>'3','calorii'=>'5 kcal','grasimi'=>'0.3 g',
        'grasimi saturate'=>'0.2 g','glucide'=>'0.5 g','proteine'=>'1 g','sare'=>'0.2 g','calciu'=>'2 mg']);
    }
}
