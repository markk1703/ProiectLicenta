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
    {   $backwardDays = 1;
        DB::table('users')->insert(['username'=>'mark1234','nume'=>'Konyicska','prenume'=>'Mark','email'=>'markk485@gmail.com','password'=>Hash::make('password'),'rol_id'=>'2',
        'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
        'email_verified_at'=>\Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
        'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
        ]);
        DB::table('users')->insert(['username'=>'user','nume'=>'Doe','prenume'=>'John','email'=>'john.doe@example.net','password'=>Hash::make('password'),'rol_id'=>'2',
        'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
        'email_verified_at'=>\Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
        'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
        ]);
        DB::table('users')->insert(['username'=>'admin','nume'=>'Admin','prenume'=>'Administrator','email'=>'john.admin@example.net','password'=>Hash::make('admin1234'),'rol_id'=>'1',
        'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
        'email_verified_at'=>\Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
        'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
        ]);
        \App\Models\User::factory(20)->create();        
    }
}
