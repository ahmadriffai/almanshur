<?php

namespace App\Http\Controllers\santri;

use App\Http\Controllers\Controller;
use App\Pembayaran;
use App\Tagihan;
use App\Santri;
use App\Rekening;
use Illuminate\Http\Request;
use Alert;

class PembayaranController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Santri $santri)
    {
        //
        $data['santri'] = $santri;
        $tagihan = Tagihan::where('toSantri',$santri->jk)->sum('biaya');

        $tot= Pembayaran::where('santri_id',$santri->id)->where('no_pembayaran','!=',null)->sum('jumlah_bayar');
        // dd();
        $data['rekening'] = Rekening::all();

        $data['total'] = $tagihan-$tot;
        
        $data['tagihanBulanan'] = Tagihan::where('toSantri',$santri->jk)->where('bulanan','y')->get();
        $data['santriTagihan'] = Pembayaran::where('santri_id',$santri->id)->whereHas('tagihan',function($q){
            $q->where('bulanan','t');
        })->get();

        return view('santri.pembayaran.index', $data);
    }

    
    public function bayar($idTagihan, $idSantri)
    {
        // dd($idSantri);
       
        $data['idSantri']= $idSantri;
        $data['idTagihan'] = $idTagihan;
        $data['pembayaran'] = Pembayaran::where('tagihan_id',$idTagihan)->where('santri_id', $idSantri)->get();
        // dd($data['pembayaran']);
        return view('santri.pembayaran.bayar', $data);
    }

    public function konfirmasi(Santri $santri)
    {
        // dd($santri);
        $data['santri'] = $santri;
        $data['tagihan'] = Pembayaran::where('santri_id',$santri->id)->where('tgl_pembayaran',null)->get();
        return view('santri.pembayaran.konfirmasi',$data);
    }

    public function konfirmPembayaran(Request $request, $santri)
    {
        // dd($request);
        $this->validate($request, [
            'tagihan' => 'required',
            'file' => 'required|file|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $file = $request->file('file');

        $nama_file = time()."-".$file->getClientOriginalName();

        $tujuan_upload = 'data_file/img_konfirm';

        $file->move($tujuan_upload, $nama_file);

        Pembayaran::where('santri_id', $santri)->where('ket','Belum Lunas')->where('tagihan_id',$request->tagihan)->update([
            'konfirmasi' => $nama_file
        ]);

        alert()->html('Berhasil Melakukan Konfirmasi Pembayaran','success');

        return redirect()->back();
    }
}
