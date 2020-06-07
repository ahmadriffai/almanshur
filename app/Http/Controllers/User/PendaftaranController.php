<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Santri;
use App\User;
use App\Role;
use App\Tagihan;
use App\Rekening;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    //
    /**
     * upload kk
     */
    public function uploadKartuKeluarga(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $file = $request->file('file');

        $nama_file = time()."-".$file->getClientOriginalName();

        $tujuan_upload = 'data_file/img_santri';
        $file->move($tujuan_upload, $nama_file);

        $idSantri =Santri::select('id')->where('nis', $request->nis)->first();
        Santri::where('nis', $request->nis)->update([
            'kk' => $nama_file
        ]);
        
        alert()->html('Berhasil Upload File','success');

        return redirect()->route('user.upload.upload_santri',$idSantri);
    }

    /**
     * tagihan user
     */
    public function tagihan()
    {

        $data['rekening'] = Rekening::all();
        $data['tagihanPutra'] = Tagihan::where('toSantri', 'L')->get();
        $data['totalPutra'] = Tagihan::where('toSantri', 'L')->sum('biaya');
        $data['totalPutri'] = Tagihan::where('toSantri', 'P')->sum('biaya');
        $data['tagihanPutri'] = Tagihan::where('toSantri', 'P')->get();

        return view('user.pendaftaran.tagihan', $data);
    }
}
