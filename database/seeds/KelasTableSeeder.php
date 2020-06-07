<?php

use Illuminate\Database\Seeder;
use App\Kelas;
use App\Santri;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        Kelas::truncate();

        Kelas::create([
            'nama_kelas' => '(Kelas Putra)',
            'toSantri' => 'L'
        ]);
        Kelas::create([
            'nama_kelas' => '(Kelas Putri)',
            'toSantri' => 'P'
        ]);
    }
}
