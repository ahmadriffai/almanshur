<?php

use Illuminate\Database\Seeder;
use App\Kamar;

class KamarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kamar::truncate();
        Kamar::create([
            'nama_kamar' => '(Kamar Putra)',
            'bapak_kamar' => '(Nama Sanri Putra)',
            'toSantri' => 'L',
            'kuota' => 10
        ]);
        Kamar::create([
            'nama_kamar' => '(Kamar Putri)',
            'bapak_kamar' => '(Nama Sanri Putri)',
            'toSantri' => 'P',
            'kuota' => 10
        ]);
    }
}
