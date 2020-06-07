<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Santri;
use App\User;
use App\Role;
use Auth;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     *Upload Foto Santri
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadFotoSantri(Request $request)
    {
        //
        // dd($request);
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $file = $request->file('file');

        $nama_file = time()."-".$file->getClientOriginalName();

        $tujuan_upload = 'data_file/img_santri';
        $file->move($tujuan_upload, $nama_file);

        Santri::where('nis', $request->nis)->update([
            'foto' => $nama_file
        ]);
        // $user = User::where('email', $request->nis)->first();

        // $user->roles()->sync([5]);
        // alert()->html('Berhasil Upload File','success');

        return redirect('user.pendaftaran.tagihan');

    }

}
