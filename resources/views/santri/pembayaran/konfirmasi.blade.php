@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Konfirmasi</div>

                <div class="card-body">
                    <form action="{{ route('santri.pembayaran.konfirm_pembayaran', $santri) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        
                        <div class="form-group row">
                            <label for="tagihan" class="col-md-4 col-form-label text-md-right">Tagihan</label>
                            <div class="col-md-6">
                                <select class="form-control  @error('tagihan') is-invalid @enderror" id="tagihan" name="tagihan">
                                    <option value="">-- Tagihan -- </option>
                                    @foreach($tagihan as $tgh)
                                    <option value="{{ $tgh->tagihan->id }}"> {{ $tgh->tagihan->tagihan }}  </option>
                                    @endforeach
                                </select>
                                @error('tagihan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tagihan" class="col-md-4 col-form-label text-md-right">Bukti Pembayaran</label>
                            <div class="col-md-6">
                                <input type="file" name="file" id="file" class="@error('file') is-invalid @enderror"><br>
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
