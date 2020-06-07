@extends('layouts.app')

@section('santriBaru',$santriBaru)
@section('bayarSantri',$bayarSantri)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->santri->kk == null)
            @can('manage-user')
            <div class="card">
                <div class="card-header">Upload Scan Kartu Keluarga</div>
                <div class="card-body">
                    <form action="{{ route('user.pendaftaran.upload_kk') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nis" value="{{ Auth::user()->santri->nis }}">
                        <input type="file" name="file" id="file"><br>
                        <button type="submit" class="btn btn-primary mt-5">Upload</button>
                    </form>    
                </div>
            </div>
            @endcan
            @else
            @can('manage-user')
            <div class="card">
                <div class="card-header">Dahsboard</div>
                <div class="card-body">
                    <h4>Selamat datang kembali.</h4><br>
                    <p>Siahan melakukan konfirmasi pembayarab</p><br>
                    <a href="{{ route('user.pendaftaran.tagihan') }}" class="btn btn-primary">Konfirmasi</a>
                </div>
            </div>
            @endcan
            @endif
        </div>
    </div>
</div>
@endsection
