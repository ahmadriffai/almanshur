@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-11">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div>
    <div class="card-body">
    <div class="row">
        <div class="col-md-6">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Siswa .." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th class="scope">#</th>
                <th class="scope">NIS</th>
                <th class="scope">Nama</th>
                <th class="scope">Kelas</th>
                <th class="scope">Kamar</th>
                <th class="scope">Action</th>
            </tr>
            </thead>
            <tbody>
            @can('bendahara-putra')
            @foreach($santriPutra as $str)
                <tr>
                    <th scope="row">{{ $str->id }}</th>
                    <td>{{ $str->nis }}</td>
                    <td>{{ $str->nama }}</td>
                    <td>{{ $str->kelas->nama_kelas }}</td>
                    <td>{{ $str->kamar->nama_kamar }}</td>
                    <td>
                        <a href="{{route('pengurus.pembayaran.tagihan', $str->id)}}" class="btn btn-primary btn-sm">Lihat Tagihan</a>
                        <a href="{{route('pengurus.pembayaran.bayar', [$idSahriyahL,$str->id])}}" class="btn btn-success btn-sm">Bayar 
                        Sahriyah</a>
                    
                    <td>
                </tr>
               

            @endforeach
            @endcan
            @can('bendahara-putri')
            @foreach($santriPutri as $str)
                <tr>
                    <th scope="row">{{ $str->id }}</th>
                    <td>{{ $str->nis }}</td>
                    <td>{{ $str->nama }}</td>
                    <td>{{ $str->kelas->nama_kelas }}</td>
                    <td>{{ $str->kamar->nama_kamar }}</td>
                    <td>
                        <a href="{{route('pengurus.pembayaran.tagihan', $str->id)}}" class="btn btn-primary btn-sm">Lihat Tagihan</a>
                        <a href="{{route('pengurus.pembayaran.bayar', [$idSahriyahP,$str->id])}}" class="btn btn-warning btn-sm">Bayar 
                        Sahriyah</a>
                    
                    <td>
                </tr>
            @endforeach
            @endcan
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
