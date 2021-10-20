<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,3) as $num){
            DB::table('posts')->insert([
            'company' => "株式会社 {$num} ",
            'pref_id' => 44,
            'city' => "大分市 {$num} 番地",
            'stage_id' => $num,
            'job' => "エンジニア",
            'limit' => Carbon::now()->addDay($num),
            'officer' => "那賀",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        }
    }
}
