<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Models\Judet;

class JudetOrasController extends Controller
{
    public function getLocalitati(Request $request)
    {
        $judet_id=$request['judet_id'];
        $judete=Judet::get();
        foreach ($judete as $judet) {
            if($judet['id']==$judet_id)
            {$presc=$judet->prescurtare;
                break;
            }
        }
            $localitati=Http::get("https://roloca.coldfuse.io/orase/".$presc);
            $data=json_decode($localitati);
                return response($data);
    }
}
