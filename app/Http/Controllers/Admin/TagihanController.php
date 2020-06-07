<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tagihan;
use App\Santri;
use App\Pembayaran;
use Alert;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['tagihan'] = Tagihan::all();
        return view('admin.tagihan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'tagihan' => 'required',
            'bulanan' => 'required',
            'biaya' => 'required|numeric',
            'toSantri' => 'required'
        ]);

        Tagihan::create([
            'tagihan' => $request->tagihan,
            'bulanan' => $request->bulanan,
            'biaya' => $request->biaya,
            'active' => 'y',
            'angsur' => 't',
            'toSantri' => $request->toSantri,
        ]);

        $tagihan_id = Tagihan::select('id')
                    ->where('tagihan', $request->tagihan)
                    ->where('toSantri', $request->toSantri)
                    ->where('biaya', $request->biaya)->first()->id;

        if($request->toSantri == 'L'){
            $santri = Santri::where('jk','L')->get();
        }else{
            $santri = Santri::where('jk','P')->get();
        }


        for($i = 0; $i < count($santri); $i++){
                $pembayaran = new Pembayaran;
                $pembayaran->santri_id = $santri[$i]->id;
                $pembayaran->bulan = time();
                $pembayaran->tagihan_id = $tagihan_id;
                $pembayaran->ket = 'Belum Lunas';
                $jumlah_bayar = $request->biaya;
        
                $pembayaran->save();
        }
        
        Alert::toast('Data Berhasil Ditambah','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagihan $tagihan)
    {
        //
        $data['tagihan'] = $tagihan;
        return view('admin.tagihan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'tagihan' => 'required',
            'bulanan' => 'required',
            'biaya' => 'required|numeric',
            'toSantri' => 'required',
            'active' => 'required'
        ]);

        Tagihan::where('id', $id)->update([
            'tagihan' => $request->tagihan,
            'bulanan' => $request->bulanan,
            'biaya' => $request->biaya,
            'active' => $request->active,
            'angsur' => 't',
            'toSantri' => $request->toSantri,
        ]);

        alert()->toast('Tagihan Berhasil Edit','success');
        return redirect()->route('admin.tagihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagihan $tagihan)
    {
        //
    }
}
