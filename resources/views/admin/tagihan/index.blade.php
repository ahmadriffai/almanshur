@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-8">
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data tagihan</h6>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th class="scope">#</th>
            <th class="scope">Tagihan</th>
            <th class="scope">Biaya</th>
            <th class="scope">Bulanan</th>
            <th class="scope">Santri</th>
            <th class="scope">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tagihan as $tgh)
            <tr>
                <th scope="row">{{ $tgh->id }}</th>
                <td>{{ $tgh->tagihan }}</td>
                <td>{{ $tgh->biaya }}</td>
                <td>{{ $tgh->bulana }}</td>
                <td>{{ $tgh->toSantri }}</td>
                <td>
                
                    <a href="{{ route('admin.tagihan.edit', $tgh->id) }}" class="btn btn-primary float-left btn-sm">Edit</a>
               
               
                    <form action="{{route('admin.tagihan.destroy', $tgh)}}" method="post" class="float-left ml-2">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                    </form>
              
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>


<!-- Add tagihan -->
<div class="col-4">
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data tagihan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tagihan.store') }}" method="post">

        @csrf


        <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right disabled">Tagihan</label>
                <div class="col-md-6">
                    <input id="text" type="text" name ="tagihan" class="form-control @error('tagihan') is-invalid @enderror" value="{{ old('tagihan') }}"  autofocus>
                    @error('tagihan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="bulanan" class="col-md-4 col-form-label text-md-right">Bulanan</label>
                <div class="col-md-6">
                    <select class="form-control  @error('bulanan') is-invalid @enderror" id="bulanan" name="bulanan">
                        <option value="">-- Bulanan -- </option>
                        <option value="y"> Ya  </option>
                        <option value="t"> Tidak  </option>
                    </select>
                    @error('bulanan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right disabled">biaya</label>
                <div class="col-md-6">
                    <input id="text" type="number" name ="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya') }}"  autofocus>
                    @error('biaya')
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
                        <option value="">-- Santri -- </option>
                        <option value="L"> Putra  </option>
                        <option value="P"> Putri  </option>
                </select>
                    @error('toSantri')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
         
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
           
        </form>
    </div>
</div>  
</div>
@endsection
