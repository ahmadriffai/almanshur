@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran Tagihan</h6>
    </div>
    <div class="card-body">
    <a href="{{ route('pengurus.pembayaran.tagihan', $idSantri) }}" class="btn btn-primary btn-sm mt-2">Kembali</a>

        <!-- Table -->
        <table class="table table-striped mt-4">
        <thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Bulan</th>
                <th scope="col">No Pembayaran</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($pembayaran as $p)
            @if($p->no_pembayaran == null )
                <tr style="color : salmon;">
            @else
                <tr>
            @endif
            
                <th scope="row">{{ $loop->iteration }}</th>
                @if($p->tagihan->bulanan == 'y')
                    <td> {{ date('M',$p->bulan) }} </td>
                @else
                    <td> - </td>
                @endif
                <!-- no pembayaran -->
                @if($p->no_pembayaran == null )
                    <td> - </td>
                @else
                    <td> {{ $p->no_pembayaran }} </td>
                @endif
                <!-- tgl pembayarn -->
                @if($p->tgl_pembayaran == null )
                    <td> - </td>
                @else
                    <td> {{ $p->tgl_pembayaran }} </td>
                @endif

                <!-- biaya -->
                <td> Rp. {{ number_format($p->tagihan->biaya,2,',','.') }} </td>
                
                <!-- Keterangan -->
                @if($p->tgl_pembayaran == null )
                    <td> <span class="badge badge-danger">{{ $p->ket }}</span> </td>
                @else
                    <td> <span class="badge badge-info">{{ $p->ket }}</span> </td>
                @endif
                <!-- button bayar -->
                @if($p->tgl_pembayaran == null )
                    <td> <a href="{{route('pengurus.pembayaran.byr', [$p->id, $idTagihan])}}" class="btn btn-success btn-sm"> Bayar </a> </td>
                @else
                    <td> <a href="#" class="btn btn-warning btn-sm"> Cetak </a> </td>
                @endif
                
            </tr>
        @endforeach
            
        </tbody>
        </table>
        
    </div>
</div>
</div>
@endsection
