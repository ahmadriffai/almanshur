@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <?php    
        if(Auth::user()->santri->kk != null) {
        ?>
        <div class="col-md-7 mt-3">
            @can('manage-user')
            <div class="card shadow">
                
                <div class="card-header bg-primary text-white">Biaya </div>
                <div class="card-body">

                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->santri->jk == 'L')
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="scope">#</th>
                            <th class="scope">Biaya</th>
                            <th class="scope">Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tagihanPutra as $tghputra)
                            <tr>
                                <th scope="row">{{ $tghputra->id }}</th>
                                <td>{{ $tghputra->tagihan }}</td>
                                <td>Rp. {{ number_format($tghputra->biaya,0,".",".") }}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="2"> <strong>Total</strong> </td>
                                <td colspan="2"> 
                                   <strong> Rp. {{ number_format($totalPutra,0,".",".") }} </strong>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="scope">#</th>
                            <th class="scope">Biaya</th>
                            <th class="scope">Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tagihanPutri as $tghputri)
                            <tr>
                                <th scope="row">{{ $tghputri->id }}</th>
                                <td>{{ $tghputri->tagihan }}</td>
                                <td>Rp. {{ number_format($tghputri->biaya,0,".",".") }}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="2"> <strong>Total</strong> </td>
                                <td colspan="2"> 
                                   <strong> Rp. {{ number_format($totalPutra,0,".",".") }} </strong>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                        
                        
                </div>
            </div>
            @endcan
        </div>
        <div class="col-md-5 mt-3">
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
                                        Santri baru membawa uang sebesar 
                                        @if(Auth::user()->santri->jk == 'L')
                                        <strong>Rp. {{ number_format($totalPutra,0,".",".") }}</strong> 
                                        @else
                                        <strong>Rp. {{ number_format($totalPutri,0,".",".") }}</strong> 
                                        @endif
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
                                    Pembayaran dilakukan melalui transfer ke salah satu nomer rekening di bawah  sebesar
                                        @if(Auth::user()->santri->jk == 'L')
                                        <strong>Rp. {{ number_format($totalPutra,0,".",".") }}</strong> 
                                        @else
                                        <strong>Rp. {{ number_format($totalPutri,0,".",".") }}</strong> 
                                        @endif
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

                                <p class="mt-5 ml-2"><strong>Konfirmasi Pembayaran :</strong></p>
                                <p class="ml-2">jika sudah melakukan pembayaran transfer , lakukan konfirmasi pembayaran , dengan menyerahkan foto bukti pembayaran</p>
                                
                                <table width="100%" >
                                    <tr>
                                        <td style="padding:5px;">
                                        <img width="100px" src="{{ asset('img/wa.png') }}">
                                        </td>
                                    </tr>
                                    @if(Auth::user()->santri->jk == 'L')
                                    <tr>
                                        <td style="padding:10px;">Zaki Mubarok</td>
                                        <td>625540558948</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td style="padding:10px;">Bendahara Putri</td>
                                        <td>625540558948</td>
                                    </tr>
                                    @endif
                                </table>
                                <p></p>
                                <a class="btn btn-primary" href="#bitly">
                                    Konfirmasi Pembayaran
                                </a>
                           
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <?php } ?>
    </div>
</div>
@endsection
