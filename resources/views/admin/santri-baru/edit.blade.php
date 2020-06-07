@extends('layouts.app')

@section('content')
    <!-- card -->
<div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ACC Santri</h6>
        </div>
        <div class="card-body">
            <p>
            <a href="/santri" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        </p>
        <hr>
            
            <!-- link create -->
            
            <!-- form -->
            <form method="post" action="{{ route('admin.santri-baru.update', $santri) }}">

                @method('put')
                @csrf

                <input type="hidden" name="nis" value="{{ $santri->nis }}">
                <input type="hidden" name="alamat" value="{{ $santri->alamat }}">
                <input type="hidden" name="telp_wali" value="{{ $santri->telp_wali }}">
                <input type="hidden" name="status" value="{{ $santri->status }}">
                <input type="hidden" name="jns_kelamin" value="{{ $santri->jk }}">
                <input type="hidden" name="tgl_lahir" value="{{ $santri->tgl_lahir }}">
                <input type="hidden" name="no_telp" value="{{ $santri->no_telp }}">
                
                <div class="form-group">
                    <label for="nama">Nomer Induk Santri</label>
                    <input type="text" disabled class="form-control @error('nis') is-invalid @enderror" value="{{ $santri->nis }}">
                   
                </div>
                
                
                <div class="form-group">
                    <label for="nama">Nama Santri</label>
                    <input type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror" id="nama" value="{{ $santri->nama }}">
                    @error('nama')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <select class="form-control  @error('id_kelas') is-invalid @enderror" id="id_kelas" name="id_kelas">
                        <option value="">-- Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                    </select>
                    @error('id_kelas')
                        <div class="invalid-feedback" role="alert"> <strong>Kelas Wajib Diisi</strong> </div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="id_kamar">Kamar</label>
                    <select class="form-control  @error('id_kamar') is-invalid @enderror" id="id_kamar" name="id_kamar">
                        <option value="">-- Kamar --</option>
                    @foreach($kamar as $km)
                        <option value="{{ $km->id }}">{{ $km->nama_kamar }}</option>
                    @endforeach
                    </select>
                    @error('id_kamar')
                        <div class="invalid-feedback" role="alert">  <strong>Kamar Wajib Diisi</strong> </div>
                    @enderror
                </div>
            
                
                <button type="submit" class="btn btn-info">Konfirmasi</button>
                </form>  



        </div>
    </div>
</div>

@endsection