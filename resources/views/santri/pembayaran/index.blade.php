@extends('layouts.app')

@section('content')
<!-- Basic Card Example -->
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
                    <a href="{{ url('santri/pembayaran/'. $tgh->id.'/'.$santri->id  ) }}" class="btn btn-primary float-left btn-sm">Lihat Tagihan</a>
                    

                    
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
                    <td> 

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
                                        <td>{{ $p->no_pembayaran }}</td>
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
<div class="col-5">
<div class="card shadow">
         
         <div class="card-body">
             <div class="row">
                 <div class="col-12">
                     <label for="">Pilih Metode pembayaran :</label>
                         <!-- Collapsable Card Example -->
                         <div class="card mb-8 mt-2">
                             <!-- Card Header - Accordion -->
                             <a href="#collapseCardExa" class="d-block card-header py-3 bg-primary" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                             <h6 class="m-0 font-weight-bold text-white">Bayar Cash</h6>
                             </a>
                             <!-- Card Content - Collapse -->
                             <div class="collapse show" id="collapseCardExample">
                             <div class="card-body">
                                 Santri baru membawa uang sebesar jumlah uang tagihan yang akan dibayar 
                                 ke kantor pondok pesantren al manshur untuk melakukan pembayaran.
                             </div>
                             </div>
                         </div>
                         <!-- Collapsable Card Example -->
                         <div class="card mb-8 mt-4">
                             <!-- Card Header - Accordion -->
                             <a href="#collapseCard" class="d-block card-header py-3 bg-success" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                             <h6 class="m-0 font-weight-bold text-white">Transfer</h6>
                             </a>
                             <!-- Card Content - Collapse -->
                             <div class="collapse show" id="collapseCard">
                             <div class="card-body">
                             Pembayaran dilakukan melalui transfer ke salah satu nomer rekening di bawah sebesar
                             jumlah uang tagihan yang akan dibayar
                                 
                             <br><br> 
                                 <label for="" class="mb-3">Transfer Bank :</label>
                                 @foreach($rekening as $rkn)
                                     <div class="row">
                                         <table width="100%" class="ml-3">
                                             <tr>
                                                 <td>
                                                     @if($rkn->nama_bank == 'bri')
                                                         <img width="100px" src="{{ asset('img/bri.png') }}">
                                                     @elseif($rkn->nama_bank == 'bca')
                                                         <img width="80px" src="{{ asset('img/bca.png') }}">
                                                     @elseif($rkn->nama_bank == 'bni')
                                                         <img width="80px" src="{{ asset('img/bni.png') }}">
                                                     @elseif($rkn->nama_bank == 'mandiri')
                                                         <img width="80px" src="{{ asset('img/mandiri.png') }}">
                                                     @elseif($rkn->nama_bank == 'jateng')
                                                         <img width="80px" src="{{ asset('img/jateng.png') }}">
                                                     @endif
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td> Bank</td>
                                                 <td> <strong>{{strtoupper($rkn->nama_bank)}}</strong> </td>
                                             </tr>
                                             <tr>
                                                 <td> No Rekening</td>
                                                 <td> <strong>{{$rkn->no_rekening}}</strong> </td>
                                             </tr>
                                             <tr>
                                                 <td> Penerima</td>
                                                 <td> <strong>{{$rkn->penerima}}</strong> </td>
                                             </tr>
                                             
                                         </table>

                                     </div>
                                     <hr class="sidebar-divider">

                                 @endforeach
                             </div>
                             
                             </div>
                         </div>

                         <p class="mt-3 ml-2"><strong>Konfirmasi Pembayaran :</strong></p>
                         <p class="ml-2">jika sudah melakukan pembayaran transfer , silahkan lakukan konfirmasi pembayaran </p>
                         
                         
                         <a class="btn btn-primary" href="{{ route('santri.pembayaran.konfirmasi', Auth::user()->santri->id) }}">
                             Konfirmasi Pembayaran
                         </a>
                    
                 </div>
             </div>
         </div>
     </div>  

</div>
@endsection
