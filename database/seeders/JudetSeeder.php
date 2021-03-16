<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Judet;

class JudetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $judete=Http::get('https://roloca.coldfuse.io/judete');
        $data=json_decode($judete);
        foreach ($data as $obj) {
            Judet::create(array(
                'denumire'=>$obj->nume,
                'prescurtare'=>$obj->auto
            ));
        }
    }
}
