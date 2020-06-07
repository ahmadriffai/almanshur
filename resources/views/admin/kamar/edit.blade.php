@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit kamar</div>

                <div class="card-body">
                    <form action="{{ route('admin.kamar.update', $kamar) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="nama_kamar" class="col-md-4 col-form-label text-md-right">Nams Kamar</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $kamar->nama_kamar }}" name="nama_kamar" id="nama_kamar" class="form-control @error('nama_kamar') is-invalid @enderror"><br>
                                @error('nama_kamar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bapak_kamar" class="col-md-4 col-form-label text-md-right">Bapak Kamar</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $kamar->bapak_kamar }}" name="bapak_kamar" id="bapak_kamar" class="form-control @error('bapak_kamar') is-invalid @enderror"><br>
                                @error('bapak_kamar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kuota" class="col-md-4 col-form-label text-md-right">Kuota</label>
                            <div class="col-md-6">
                                <input type="number" value="{{ $kamar->kuota }}" name="kuota" id="kuota" class="form-control @error('kuota') is-invalid @enderror"><br>
                                @error('kuota')
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
                                    <option @if($kamar->toSantri == 'L') checked @endif value="L">Putra</option> 
                                    <option @if($kamar->toSantri == 'P') checked @endif value="P">Putri</option> 
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
