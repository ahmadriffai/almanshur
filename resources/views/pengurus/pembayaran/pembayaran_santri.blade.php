@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran Tagihan Santri</h6>
    </div>
    <div class="card-body">

        <!-- Table -->
        <table class="table table-striped mt-4">
        <thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama Santri</th>
                <th scope="col">Kelas</th>
                <th scope="col">Kamar</th>
                <th scope="col">Tagihan</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($pembayaran as $p)
            
            <tr>            
                <th scope="row">{{ $loop->iteration }}</th>
                <td> {{ $p->santri->nis }} </td>
                <td> {{ $p->santri->nama }} </td>
                <td> {{ $p->santri->kelas->nama_kelas }} </td>
                <td> {{ $p->santri->kamar->nama_kamar }} </td>
                <td> {{ $p->tagihan->tagihan }} </td>
                <td> 
                    <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#lihatmodal{{$p->id}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white"></i>
                    Bukti Pembayaran
                    </a>


                    <!-- Modal -->
                    <div class="modal fade" id="lihatmodal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body justify-content">
                                <img src="{{ asset('data_file/img_konfirm/'.$p->konfirmasi) }}" alt="">
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-success" type="button" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                        </div>
                    </div>

                 </td>
                <td> 
                    @if($p->tgl_pembayaran == null )
                    <a href="{{ route('pengurus.pembayaran.byr', [$p->id, $p->tagihan->id]) }}" class="btn btn-primary btn-sm text-white">Bayar</a>
                    @endif
                    <a class="btn btn-danger btn-sm text-white">Delete</a>
                </td>
            </tr>
        @endforeach
            
        </tbody>
        </table>
        
    </div>
</div>
</div>


@endsection
