<?php

use Illuminate\Database\Seeder;
use App\Santri;

class SantriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Santri::truncate();
        Santri::create([
            'nis' => 10001,
            'nama' => 'admin',
            'telp_wali' => '08xxxxxxxx',
            'alamat' => 'Jl. Dieng km.3',
            'kamar_id' => 1,
            'kelas_id' => 1,
            'status' => 'pelajar',
            'jk' => 'L',
            'tgl_lahir' => '2001-01-01',
            'pendidikan_terakhir' => 'SD',
            'nama_ayah' => 'Ayah',
            'pekerjaan_ayah' => 'Ayah',
            'nama_ibu' => 'Ibu',
            'pekerjaan_ibu' => 'Pekerjaan',
            'no_telp' => '085xxxxxxx',
            'foto' => 'profile.png',
            'kk' => null,
            
        ]);


        
    }
}
