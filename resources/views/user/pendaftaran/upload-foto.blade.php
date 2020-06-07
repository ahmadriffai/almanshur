@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @can('manage-user')
            <div class="card">
                <div class="card-header">Upload Foto 3x4</div>
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
        </div>
    </div>
</div>
@endsection
