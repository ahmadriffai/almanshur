@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-7">
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th class="scope">#</th>
            <th class="scope">Nama Kelas</th>
            <th class="scope">Bapak Kamar</th>
            <th class="scope">Kuota</th>
            <th class="scope">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kamar as $kmr)
            <tr>
                <th scope="row">{{ $kmr->id }}</th>
                <td>{{ $kmr->nama_kamar }}</td>
                <td>{{ $kmr->bapak_kamar }}</td>
                <td>{{ $kmr->kuota }}</td>
                <td>
                
                    <a href="{{ route('admin.kamar.edit', $kmr->id) }}" class="btn btn-primary float-left btn-sm">Edit</a>
               
               
              
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>


<!-- Add Kelas -->
<div class="col-5">
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kelas</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.kamar.store') }}" method="post">

        @csrf


            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right disabled">Nama Kamar</label>
                <div class="col-md-6">
                    <input id="text" type="text" name ="nama_kamar" class="form-control @error('nama_kamar') is-invalid @enderror" value="{{ old('nama_kamar') }}"  autofocus>
                    @error('nama_kamar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="toSantri" class="col-md-4 col-form-label text-md-right">Kamar</label>
                <div class="col-md-6">
                    <select class="form-control  @error('toSantri') is-invalid @enderror" id="toSantri" name="toSantri">
                        <option value="">-- kamar --</option>
                        <option value="L">Putra</option>
                        <option value="P">Putri</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right disabled">Kuota</label>
                <div class="col-md-6">
                    <input id="text" type="number" name ="kuota" class="form-control @error('kuota') is-invalid @enderror" value="{{ old('kuota') }}"  autofocus>
                    @error('kuota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="bapak_kamar" class="col-md-4 col-form-label text-md-right">Bapak/Ibu Kamar</label>
                <div class="col-md-6">
                    <select class="form-control  @error('bapak_kamar') is-invalid @enderror" id="bapak_kamar" name="bapak_kamar">
                        <option value="">-- Bapak/Ibu Kamar -- </option>
                    @foreach($santri as $str)
                        <option value="{{ $str->nama }}">{{ $str->nis}} - {{ $str->nama }} </option>
                    @endforeach
                    </select>
                </div>
            </div>
         
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
           
        </form>
    </div>
</div>  
</div>
@endsection
