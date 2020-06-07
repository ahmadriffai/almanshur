<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tagihan;
use App\Santri;
use App\Pembayaran;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $timeTagihan = DB::table('time_now')->select('time_now')->first()->time_now;
        $timeNow = $timeTagihan+60*60*24*30;
        $time = time();
        if($time > $timeNow){
            $tagihanPutra = Tagihan::where('bulanan','y')->where('toSantri','L')->get();
            $tagihanPutri = Tagihan::where('bulanan','y')->where('toSantri','P')->get();
            $santriPutra = Santri::where('jk','L')->get();
            $santriPutri = Santri::where('jk','P')->get();
            
            for($i = 0; $i < count($santriPutra); $i++){
                for($j = 0; $j < count($tagihanPutra); $j++){
                    $pembayaran = new Pembayaran;
                    $pembayaran->santri_id = $santriPutra[$i]->id;
                    $pembayaran->bulan = time();
                    $pembayaran->tagihan_id = $tagihanPutra[$j]->id;
                    $pembayaran->ket = 'Belum Lunas';
                    $jumlah_bayar = $tagihanPutra[$j]->biaya;
            
                    $pembayaran->save();
                }
            }
            for($i = 0; $i < count($santriPutri); $i++){
                for($j = 0; $j < count($tagihanPutri); $j++){
                    $pembayaran = new Pembayaran;
                    $pembayaran->santri_id = $santriPutri[$i]->id;
                    $pembayaran->bulan = time();
                    $pembayaran->tagihan_id = $tagihanPutri[$j]->id;
                    $pembayaran->ket = 'Belum Lunas';
            
                    $pembayaran->save();
                }
            }
            DB::table('time_now')->where('id',1)->update(['time_now' => time()]);
            alert()->html('Tagihan Bulanan Santri Sudah Diperbarui','success');
            
        }

        $santri = Santri::where('foto', null)->get();
        $data['santriBaru'] = count($santri);
        $bayar = Pembayaran::where('konfirmasi','!=',null)->get();
        $data['bayarSantri'] = count($bayar);
        
        return view('home', $data);
    }
}
