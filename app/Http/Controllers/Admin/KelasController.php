<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use Alert;
use Gate;

class KelasController extends Controller
{

    public function _construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelas'] = Kelas::all();

        return view('admin.kelas.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nama_kelas' => 'required','toSantri' => 'required']);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'toSantri' => $request->toSantri
        ]);
        
        Alert::toast('Data Berhasil Ditambah','success');
        return redirect(route('admin.kelas.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        //
        $data['kelas'] = $kela;
        return view('admin.kelas.edit', $data);

        
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
            'nama_kelas' => 'required',
            'toSantri' => 'required',
        ]);

        Kelas::where('id', $id)->update([
            'nama_kelas' => $request->nama_kelas,
            'toSantri' => $request->toSantri,
        ]);

        alert()->toast('Kelas Berhasil Edit','success');
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
        Kelas::destroy($id);
        Alert::toast('Data Berhasil Dihapus','success');
        return redirect()->route('admin.kelas.index');
    }
}
