@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th class="scope">#</th>
                <th class="scope">Nis</th>
                <th class="scope">Nama</th>
                <th class="scope">Alamat</th>
                <th class="scope">No Telp Santri</th>
                <th class="scope">Jenis Kelamin </th>
                <th class="scope">No Telp Wali</th>
                <th class="scope">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($santri as $str)
            <tr>
                <th scope="row">{{ $str->id }}</th>
                <td>{{ $str->nis }}</td>
                <td>{{ $str->nama }}</td>
                <td>{{ $str->alamat }}</td>
                <td>{{ $str->no_telp }}</td>
                <td>{{ $str->jk }}</td>
                <td>{{ $str->telp_wali }}</td>
                
                <td>
                @can('manage-santri')
                    <a href="{{ route('admin.santri-baru.edit', $str->id) }}" class="btn btn-primary float-left btn-sm">Acc</a>
     
                    <form action="{{route('admin.santri.destroy', $str->id)}}" method="post" class="float-left ml-2">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                    </form>
                @endcan
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>
@endsection
