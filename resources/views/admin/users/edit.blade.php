@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User {{ $user->name }}</div>

                <div class="card-body">
                    <form action=" {{route('admin.users.update', $user)}} " method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <fieldset disabled>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right disabled">NIS</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" value="{{ $user->email }}"  autofocus>
                            </div>
                        </div>
                    </fieldset>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Akses</label>

                            <div class="col-md-6">
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}" 
                                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label for="{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
