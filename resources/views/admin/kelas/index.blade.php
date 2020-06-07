@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-6">
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
            <th class="scope">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kelas as $kls)
            <tr>
                <th scope="row">{{ $kls->id }}</th>
                <td>{{ $kls->nama_kelas }}</td>
                <td>
                
                    <a href="{{ route('admin.kelas.edit', $kls->id) }}" class="btn btn-primary float-left btn-sm">Edit</a>
               
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>


<!-- Add Kelas -->
<div class="col-6">
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kelas</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.kelas.store') }}" method="post">

        @csrf


            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label text-md-right disabled">Nama Kelas</label>
                <div class="col-md-6">
                    <input id="text" type="text" name ="nama_kelas" class="form-control @error('toSantri') is-invalid @enderror" value="{{ old('nama_kelas') }}"  autofocus>
                    @error('nama_kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>
            <div class="form-group row">
                <label for="toSantri" class="col-md-3 col-form-label text-md-right">Kelas</label>
                <div class="col-md-6">
                    <select class="form-control  @error('toSantri') is-invalid @enderror" id="toSantri" name="toSantri">
                        <option value="">-- kelas --</option>
                        <option value="L">Putra</option>
                        <option value="P">Putri</option>
                    </select>
                </div>
            </div>
         
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
           
        </form>
    </div>
</div>  
</div>
@endsection
