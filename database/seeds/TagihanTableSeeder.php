<?php

use Illuminate\Database\Seeder;
use App\Tagihan;
use App\Pembayaran;

class TagihanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Tagihan::truncate();
        Pembayaran::truncate();
        $tagihan = ['sahriyah','biaya makan','biaya pendaftaran','biaya kitab', 'infak gedung','biaya lemari','almamater'];
        $biaya = [75000,150000,200000,20000,100000,30000,100000];
        $bulanan = ['y','y','t','t','t','t','t'];
        for($i = 0 ; $i < 7; $i++){
            Tagihan::create([
                'tagihan' => $tagihan[$i],
                'biaya' => $biaya[$i],
                'toSantri' => 'P',
                'bulanan' => $bulanan[$i],
                'active' => 'y'
            ]);
        }
        for($i = 0 ; $i < 7; $i++){
            Tagihan::create([
                'tagihan' => $tagihan[$i],
                'biaya' => $biaya[$i],
                'toSantri' => 'L',
                'bulanan' => $bulanan[$i],
                'active' => 'y'
            ]);
        }
       
    }
}
