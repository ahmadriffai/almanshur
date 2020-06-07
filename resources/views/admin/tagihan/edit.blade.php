@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tagihan</div>

                <div class="card-body">
                    <form action="{{ route('admin.tagihan.update', $tagihan) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="tagihan" class="col-md-4 col-form-label text-md-right">Nama tagihan</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $tagihan->tagihan }}" name="tagihan" id="tagihan" class="form-control @error('tagihan') is-invalid @enderror"><br>
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
                                    <option @if($tagihan->bulanan == 'y') checked @endif value="L">Ya</option> 
                                    <option @if($tagihan->bulanan == 't') checked @endif value="P">Tidak</option> 
                                </select>
                                @error('bulanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">Active</label>
                            <div class="col-md-6">
                                <select class="form-control  @error('active') is-invalid @enderror" id="active" name="active">
                                    <option @if($tagihan->active == 'y') checked @endif value="L">Ya</option> 
                                    <option @if($tagihan->active == 't') checked @endif value="P">Tidak</option> 
                                </select>
                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="biaya" class="col-md-4 col-form-label text-md-right">biaya</label>
                            <div class="col-md-6">
                                <input type="number" value="{{ $tagihan->biaya }}" name="biaya" id="biaya" class="form-control @error('biaya') is-invalid @enderror"><br>
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
                                    <option @if($tagihan->toSantri == 'L') checked @endif value="L">Putra</option> 
                                    <option @if($tagihan->toSantri == 'P') checked @endif value="P">Putri</option> 
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
