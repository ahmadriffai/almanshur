<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Santri;
use App\Kelas;
use App\Kamar;
use App\Tagihan;
use App\User;
use App\Role;
use App\Pembayaran;
use Alert;

class SantriBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['santri'] = Santri::where('foto', null)->get();
        return view('admin.santri-baru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri_baru)
    {
        $kelas = Kelas::where('toSantri', $santri_baru->jk)->get();
        $kamar = Kamar::where('toSantri', $santri_baru->jk)->get();
        
        return view('admin.santri-baru.edit')->with([
            'kamar' => $kamar,
            'santri' => $santri_baru,
            'kelas' => $kelas
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri_baru)
    {
        //
       
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'alamat' => 'required',
            'jns_kelamin' => 'required',
            'id_kelas' => 'required',
            'id_kamar' => 'required',
            'telp_wali' => 'required',
            'status' => 'required',
            'no_telp' => 'required'
        ]);
        
        

        Santri::where('id', $santri_baru->id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'jk' => $request->jns_kelamin,
            'kelas_id' => $request->id_kelas,
            'kamar_id' => $request->id_kamar,
            'telp_wali' => $request->telp_wali,
            'no_telp' => $request->no_telp,
            'status' => $request->status,
            'foto' => 'profile.png'
        ]);

        $tagihan = [];
        if($request->jns_kelamin == 'L'){
           $tagihan = Tagihan::where('toSantri','L')->get();
        }else{

            $tagihan = Tagihan::where('toSantri','P')->get();
        }
           

        for($j = 0; $j <count($tagihan); $j++){
                $pembayaran = new Pembayaran;
                $pembayaran->santri_id = $santri_baru->id;
                $pembayaran->bulan = time();
                $pembayaran->tagihan_id = $tagihan[$j]->id;
                $pembayaran->ket = 'Belum Lunas';
        
                $pembayaran->save();
            
        }

        $user = User::where('email', $request->nis)->first();

        $user->roles()->sync([5]);

        $user->save();
        

        alert()->toast('Santri Berhasil Dikonfirmasi','success');
        return redirect()->route('admin.santri-baru.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
