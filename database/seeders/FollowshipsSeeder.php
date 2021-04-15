<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Followship;

class FollowshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'2'
            ]);
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'3'
            ]);
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'4'
            ]);
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'5'
            ]);
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'6'
            ]);
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'7'
            ]);
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'8'
            ]);
        Followship::create([
            'user1_id'=>'1',
            'user2_id'=>'9'
            ]);
        Followship::create([
            'user1_id'=>'5',
            'user2_id'=>'1'
            ]);
        Followship::create([
            'user1_id'=>'6',
            'user2_id'=>'1'
            ]);
        Followship::create([
            'user1_id'=>'3',
            'user2_id'=>'1'
            ]);
        Followship::create([
            'user1_id'=>'7',
            'user2_id'=>'1'
            ]);
        Followship::create([
            'user1_id'=>'8',
            'user2_id'=>'1'
            ]);
        Followship::create([
            'user1_id'=>'10',
            'user2_id'=>'1'
            ]);
    }
}
