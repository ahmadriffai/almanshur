@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
<div class="col-5">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Boidata {{ $santri->nama }}</h6>
    </div>
    <div class="card-body">
    
    <div class="row">
        <div class="col-4">
            <img src="{{ asset('data_file/img_santri/'.$santri->foto) }}" alt="" width="100pxx" height="140px">
        </div>
        <div class="col-7">
            <table width="100%">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> {{ $santri->nama }}</td>
                </tr>
                <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td>Batang, {{ $santri->tgl_lahir }}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td> {{ $santri->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td>Kamar</td>
                    <td>:</td>
                    <td> {{ $santri->kamar->nama_kamar }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td> {{ $santri->alamat }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>:</td>
                    <td> {{ $santri->pendidikan_terakhir }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td> {{ $santri->status }}</td>
                </tr>
            </table>
        </div>
    </div>
    <a href="{{ route('pengurus.pembayaran.index') }}" class="btn btn-primary btn-sm mt-5">Kembali</a>
    </div>
</div>
</div>
<div class="col-7">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tagihan {{ $santri->nama }}</h6>
    </div>
    <div class="card-body">
    <h3>Tagihan Bulanan</h3>
    <table class="table">
        <thead>
            <tr>
                <th class="scope">#</th>
                <th class="scope">Tagihan</th>
                <th class="scope">Biaya</th>
                <th class="scope">Keterangan</th>
                <th class="scope">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tagihanBulanan as $tgh)
                <tr>
                    <th scope="row">{{ $tgh->id }}</th>
                    <td>{{ $tgh->tagihan }}</td>
                    @if($tgh->bulanan == 'y' )
                    <td>{{ $tgh->biaya }} / bulan</td>
                    @else
                    <td>Rp. {{ number_format($tgh->biaya,0,".",".")  }} </td>
                    @endif
                    <td>-</td>
                   
                    <td>
                    <a href="{{ url('pengurus/pembayaran/'. $tgh->id.'/'.$santri->id  ) }}" class="btn btn-primary float-left btn-sm">Lihat Tagihan</a>
                    

                    
                    <td>
                </tr>
            @endforeach
            
            </tbody>
        </table>

        <hr>    

        <h3>Tagihan Lainya</h3>

        <table class="table">
        <thead>
            <tr>
                <th class="scope">#</th>
                <th class="scope">Tagihan</th>
                <th class="scope">Biaya</th>
                <th class="scope">Keterangan</th>
                <th class="scope">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($santriTagihan as $p)
            @if($p->no_pembayaran == null )
                <tr style="color : salmon;">
            @else
                <tr>
            @endif
            
                <th scope="row">{{ $loop->iteration }}</th>
                <td> {{ $p->tagihan->tagihan }} </td>
                
                <!-- no pembayaran -->
                <td> {{ $p->tagihan->biaya }} </td>
                
                <!-- Keterangan -->
                @if($p->tgl_pembayaran == null )
                    <td> <span class="badge badge-danger">{{ $p->ket }}</span> </td>
                @else
                    <td> <span class="badge badge-info">{{ $p->ket }}</span> </td>
                @endif
                <!-- button bayar -->
                @if($p->tgl_pembayaran == null )
                    <td> <a href="{{route('pengurus.pembayaran.byr', [$p->id, $p->tagihan->id])}}" class="btn btn-success btn-sm"> Bayar </a> </td>
                @else
                    <td> 
                        <a href="#" class="btn btn-warning btn-sm"> Cetak </a> 

                        <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#lihatModal{{$p->id}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white"></i>
                    Detail
                    </a>


                    <!-- Modal -->
                    <div class="modal fade" id="lihatModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body justify-content">
                                <table width="100%">
                                    <tr>
                                        <td>Nama Santri</td>
                                        <td>:</td>
                                        <td><strong>{{ $p->santri->nama }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Pembayaran</td>
                                        <td>:</td>
                                        <td>{{ $p->tagihan->tagihan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pembayaran</td>
                                        <td>:</td>
                                        <td>{{ $p->tgl_pembayaran }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomer Pembayaran</td>
                                        <td>:</td>
                                        <td>{{ $p->jumlah_bayar }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-success" type="button" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                        </div>
                    </div>

                    </td>
                @endif
                
            </tr>
        @endforeach
                <tr>
                    <td colspan="2"><strong>Total Tagihan</strong> </td>
                    <td> <strong>Rp. {{ number_format($total,0,".",".")  ?? '' }} </strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
