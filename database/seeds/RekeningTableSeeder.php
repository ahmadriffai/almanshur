<?php

use Illuminate\Database\Seeder;
use App\Rekening;

class RekeningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Rekening::truncate();
        Rekening::create([
            'nama_bank' => 'mandiri',
            'no_rekening' => '130001223454',
            'penerima' => 'Zaki Mubarok',
            'active' => 'y'
        ]);
    }
}
