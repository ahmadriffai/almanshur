@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kelas</div>

                <div class="card-body">
                    <form action="{{ route('admin.kelas.update', $kelas) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="nama_kelas" class="col-md-4 col-form-label text-md-right">Bukti Pembayaran</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $kelas->nama_kelas }}" name="nama_kelas" id="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror"><br>
                                @error('nama_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="toSantri" class="col-md-4 col-form-label text-md-right">Santri</label>
                            <div class="col-md-6">
                                <select class="form-control  @error('toSantri') is-invalid @enderror" id="toSantri" name="toSantri">
                                    <option @if($kelas->toSantri == 'L') checked @endif value="L">Putra</option> 
                                    <option @if($kelas->toSantri == 'P') checked @endif value="P">Putri</option> 
                                </select>
                                @error('toSantri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
