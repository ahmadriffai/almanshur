@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-11">
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
                <th class="scope">No Telp Wali</th>
                <th class="scope">Kartu Keluarga</th>
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
                <td>{{ $str->telp_wali }}</td>
                <td>
                <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#lihatModal{{$str->id}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white"></i>
                    Scan KK
                    </a>


                    <!-- Modal -->
                    <div class="modal fade" id="lihatModal{{$str->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Scan KK</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body justify-content">
                                <img src="{{ asset('data_file/img_santri/'.$str->kk) }}" alt="" width="400px">
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-success" type="button" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>

                
                <td>
                @can('manage-pengurus')
                    <a href="{{ route('admin.santri-baru.edit', $str->id) }}" class="btn btn-primary float-left btn-sm">Konfirmasi</a>
     
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
