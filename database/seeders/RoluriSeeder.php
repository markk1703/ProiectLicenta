<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class RoluriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roluri')->insert(['denumire'=>'administrator']);
        DB::table('roluri')->insert(['denumire'=>'user']);
    }
}
