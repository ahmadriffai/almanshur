<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kamar;
use App\Santri;
use Alert;


class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['santri'] = Santri::all();

        $data['kamar'] = Kamar::all();

        return view('admin.kamar.index', $data);
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
        $request->validate([
            'nama_kamar' => 'required',
            'kuota' => 'required|numeric',
            'toSantri' => 'required',
            'bapak_kamar' => 'required'
        ]);

        Kamar::create([
            'nama_kamar' => $request->nama_kamar,
            'bapak_kamar' => $request->bapak_kamar,
            'toSantri' => $request->toSantri,
            'kuota' => $request->kuota
        ]);
        
        Alert::toast('Data Berhasil Ditambah','success');
        return redirect(route('admin.kamar.index'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        //
        $data['kamar'] = $kamar;
        return view('admin.kamar.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_kamar' => 'required',
            'bapak_kamar' => 'required',
            'kuota' => 'required',
            'toSantri' => 'required',
        ]);

        Kamar::where('id', $id)->update([
            'nama_kamar' => $request->nama_kamar,
            'bapak_kamar' => $request->bapak_kamar,
            'kuota' => $request->kuota,
            'toSantri' => $request->toSantri,
        ]);

        alert()->toast('Kamar Berhasil Edit','success');
        return redirect()->route('admin.kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kamar::destroy($id);
        Alert::toast('Data Berhasil Dihapus','success');
        return redirect()->route('admin.kamar.index');
    }
}
