<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        DB::table('users')->insert(['username'=>'mark1234','nume'=>'Konyicska','prenume'=>'Mark','email'=>'konyicska_mark98@yahoo.com','password'=>Hash::make('12341234'),'rol_id'=>'2','email_verified_at'=>'2021-03-25 20:59:13']);
        
    }
}
