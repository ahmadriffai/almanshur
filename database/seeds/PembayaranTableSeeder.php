<?php

use Illuminate\Database\Seeder;
use App\Pembayaran;
use App\Tagihan;

class PembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Pembayaran::truncate();
        $tagihanPutra = Tagihan::where('toSantri','L')->get();

        for($j = 0; $j < count($tagihanPutra); $j++){
            $pembayaran = new Pembayaran;
            $pembayaran->santri_id = 1;
            $pembayaran->bulan = time();
            $pembayaran->tagihan_id = $tagihanPutra[$j]->id;
            $pembayaran->ket = 'Belum Lunas';
            $jumlah_bayar = $tagihanPutra[$j]->biaya;
    
            $pembayaran->save();
        }
    }
}
