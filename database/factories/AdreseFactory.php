<?php

namespace Database\Factories;

use App\Models\Adrese;
use App\Models\User;
use App\Models\Judet;
use App\Models\Localitate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class AdreseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adrese::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {$judet=Judet::all()->random(); //judet random
    $presc=$judet->prescurtare;
    $judet_id=$judet['id'];
    $localitati=Http::get("https://roloca.coldfuse.io/orase/".$presc);
    $data=json_decode($localitati);
    $localitateRandom=Arr::random($data, 1);//alege o localitate random din judetul ales
            $localitateAdaugata=Localitate::create(array( //adauga localitatea random in BD
                'denumire'=>$localitateRandom[0]->nume,
                'judet_id'=>$judet['id']
            ));
    
    $user_id=User::all()->random()['id']; //alege un user random

        return [
            //
            'user_id'=> $user_id,
            'judet_id' => $localitateAdaugata['judet_id'],
            'localitate_id' => $localitateAdaugata['id']
        ];
    }
}
