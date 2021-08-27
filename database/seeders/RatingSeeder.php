<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$backwardDays = 10;
        DB::table('ratings')->insert([
            'rating'=>'5',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'1',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'3',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'4',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'1',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'5',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'3',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'2',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'4',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'6',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'4',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'7',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'3',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'8',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'3',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'9',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'2',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'10',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'5',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'15',
            'user_id'=>'11',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'5',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'14',
            'user_id'=>'11',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'3',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'14',
            'user_id'=>'12',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'1',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'14',
            'user_id'=>'10',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'5',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'14',
            'user_id'=>'8',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'3',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'14',
            'user_id'=>'7',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
        DB::table('ratings')->insert([
            'rating'=>'2',
            'rateable_type'=>'App\Models\Reteta',
            'rateable_id'=>'14',
            'user_id'=>'6',
            'created_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60)),
			'updated_at' => \Carbon\Carbon::today()->subDays(rand($backwardDays+1, 0))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60))
            ]);
    }
}
