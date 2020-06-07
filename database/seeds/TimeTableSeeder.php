<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('time_now')->truncate();
        DB::table('time_now')->insert(['time_now' => time()]);
       

    }
}
