<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Judet;
use App\Models\Localitate;

class LocalitateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//pt toate localitatile din RO
        // $judete=Judet::get();
        // foreach ($judete as $judet) {
        //     $presc=$judet->prescurtare;
        //     $localitati=Http::get("https://roloca.coldfuse.io/orase/".$presc);
        //     $data=json_decode($localitati);
        //     foreach ($data as $obj) {
        //         Localitate::create(array(
        //             'denumire'=>$obj->nume,
        //             'judet_id'=>$judet->id
        //         ));
        //     }
        // }
    }
}
