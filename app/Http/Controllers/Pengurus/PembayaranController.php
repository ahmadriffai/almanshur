<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Pembayaran;
use App\Tagihan;
use App\Santri;
use Illuminate\Http\Request;
use Alert;

class PembayaranController extends Controller
{
    
    public function index()
    {
        //
        $data['santriPutri'] = Santri::where('foto','!=', null)->where('jk','P')->get();

        $data['santriPutra'] = Santri::where('foto','!=', null)->where('jk','L')->get();
        // dd($data['santriPutri']);
        $data['idSahriyahL'] = Tagihan::where('tagihan','sahriyah')->where('toSantri','L')->first();
        $data['idSahriyahP'] = Tagihan::where('tagihan','sahriyah')->where('toSantri','P')->first();

        return view('pengurus.pembayaran.index',$data);
    }

    /**
     * Tagihan page
     */
    public function tagihan(Santri $pembayaran)
    {
        //
        // dd($pembayaran->id);
        $data['santri'] = $pembayaran;
        $tagihan = Tagihan::where('toSantri',$pembayaran->jk)->sum('biaya');

        $tot= Pembayaran::where('santri_id',$pembayaran->id)->where('no_pembayaran','!=',null)->sum('jumlah_bayar');
        // dd();

        $data['total'] = $tagihan-$tot;
        
        $data['tagihanBulanan'] = Tagihan::where('toSantri',$pembayaran->jk)->where('bulanan','y')->get();
        $data['santriTagihan'] = Pembayaran::where('santri_id',$pembayaran->id)->whereHas('tagihan',function($q){
            $q->where('bulanan','t');
        })->get();

        return view('pengurus.pembayaran.tagihan', $data);
    }

    public function bayar($idTagihan, $idSantri)
    {
        // dd($idSantri);
       
        $data['idSantri']= $idSantri;
        $data['idTagihan'] = $idTagihan;
        $data['pembayaran'] = Pembayaran::where('tagihan_id',$idTagihan)->where('santri_id', $idSantri)->get();
        // dd($data['pembayaran']);
        return view('pengurus.pembayaran.bayar', $data);
    }

    public function bayarTagihan($pembayaran, Tagihan $tagihan)
    {
        // no pembayaran
        $tgl = date("Y-m-d");

        $random = strval(rand('100','199'));

        $no_pembayaran = time().$random;

        Pembayaran::where('id', $pembayaran)->update([
            'no_pembayaran' => $no_pembayaran,
            'tgl_pembayaran' => $tgl,
            'jumlah_bayar' => $tagihan->biaya,
            'ket' => 'lunas'
        ]);

        alert()->html('Berhasil Melakukan Pembayaran','success');
        return redirect()->back();
    }

    public function pembayaranSantri()
    {
        $data['pembayaran']= Pembayaran::where('konfirmasi','!=',null)->get();
        return view('pengurus.pembayaran.pembayaran_santri', $data);
    }
}
