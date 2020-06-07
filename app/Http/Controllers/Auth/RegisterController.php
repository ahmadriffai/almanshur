<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Santri;
use App\Kamar;
use App\Kelas;
use Alert;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){

        $nis = 10001;
        $santri = Santri::all();

        $nis = $nis + count($santri);
        $kamar = Kamar::first();    
        $kelas = Kelas::first();
     
        $pass = '';
        for($i=0 ; $i<=4 ;$i++){
            $pos = rand(0,10);
            $pass .= $pos;
        }

        $santri = Santri::create([
            'nama' => $data['name'],
            'nis' => $nis,
            'kamar_id' => $kamar->id,
            'kelas_id' => $kelas->id,
            'alamat' => $data['alamat'],
            'jk' => $data['jk'],
            'telp_wali' => $data['telp_wali'],
            'tgl_lahir' => $data['tgl_lahir'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'nama_ayah' => $data['nama_ayah'],
            'pekerjaan_ayah' => $data['pekerjaan_ayah'],
            'nama_ibu' => $data['nama_ibu'],
            'pekerjaan_ibu' => $data['pekerjaan_ibu'],
            'no_telp' => $data['no_telp'],
            'status' => $data['status'],
            'foto' => null
        ]);
        $santri_id = Santri::select('id')->where('nis', $nis)->first();
        // echo $santri_id;die;
        // dd($santri_id);
        
        $user = new User([
            'name' => $data['name'],
            'email' => $nis,
            'password' => Hash::make($nis),
    
        ]);              
        
        
        $role = Role::select('id')->where('name','user')->first();
        $santri_id->users()->save($user)->roles()->attach($role);
        


        alert()->html('Berhasil Daftar','success');


        return $user;
    }
}
