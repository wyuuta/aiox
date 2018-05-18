@extends('layouts.app')
@section('navbarlink')
<ul class="navbar-nav mr-auto">
    <li class="nav-item active"><a class="nav-link" href="{{route('instant')}}">Tukar Instan</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{url('/market/IDR/BTC')}}">Market</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('balance')}}">Balance</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('profil')}}">Profil</a></li>
</ul>
@endsection
@section('content')
<div class ="container-fluid no-padding" style="margin-top: 50px">
    <!-- list crypto -->
    <section class="row">
        <div class="container-fluid">
        <table class="table-bordered table-light table-hover table-responsive-lg table-bordered" style="min-width: 500px; width: 100%; min-height: 300px;">
            <thead>
                <tr>
                    <th>Crypto currency</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wallet as $w)
                    <tr>
                        <td>
                            <img width="16" height="16" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/'.$w->currency.'.png')}}"/>
                            <span>{{$w->currency_name}}</span>
                        </td>
                        <td>
                            @if($w->currency_name=="IDR")
                                {{$w->balance}}
                            @else
                                {{
                                  number_format($w->balance,6,".","")
                                }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </section>

    <!-- saldo -->
    <section class="row justify-content-center">
        <div class="col-6">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class ="row" >
                        <div class="col-7">
                        </div>
                        <div class="col-5">
                            Saldo Bitcoin
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-7 bg-warning">
                            <div class="row">
                            <div class="col-1">
                                <img width="30" height="30" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/BTC.png')}}"/>
                            </div>
                                
                            <div class="col-6">
                                <h5>Bitcoin</h5> 
                            </div>
                            </div>
                        </div>
                        <div class="col-5" >
                            <h4 >@foreach($btc as $b) {{$b->balance}} @endforeach BTC</h4>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-6">
            <div class="card bg-success">
                <div class="card-body">
                    <div class ="row" >
                        <div class="col-7">
                        </div>
                        <div class="col-5">
                            Saldo Rupiah
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-7 bg-success">
                            <div class="row">
                            <div class="col-1">
                                <img width="30" height="30" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/Rupiah.png')}}"/>
                            </div>
                            <div class="col-6">
                                <h5>Rupiah</h5> 
                            </div>
                            </div>
                        </div>
                        <div class="col-5" >
                            <h4 >RP @foreach($rupiah as $r) {{$r->balance}} @endforeach</h4>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>

    <!-- instant trade -->
    <section class="row justify-content-center">
        <div class="col-5">
            <form id="regFormBuy" method="POST" action="{{url('/instant/buy')}}" style="width: auto">
              {{ csrf_field() }}
              <h1>Beli Bitcoin:</h1>
              <div class="tabBuy">Input:
                <div class="row " style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Saldo Rupiah:</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="saldorupiah">Rp @foreach($rupiah as $r) {{$r->balance}} @endforeach</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah rupiah</h5>
                    </div>
                    <div class="col-5">
                        <input id="buyamount" style="float: right; max-width: 250px" placeholder="Jumlah Rupiah..." oninput="this.className = ''" name="value">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Harga 1 Bitcoin:</h5>
                    </div>
                    <div class="col-5">
                        <h5> Harga mengikuti harga pasar saat ini.</h5>
                    </div>
                </div>
              </div>
              <div class="tabBuy">Konfirmasi:
                <div class="row" style="margin-bottom: 25px;">
                    <h5> Tinjau kembali data transaksi sebelum melanjutkan. Transaksi tidak bisa dibatalkan setelah langkah selanjutnya. </h5>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah rupiah :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="jumlahbeli"> </h5>
                    </div>
                </div>
                <!-- <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi harga :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="estimasihargabeli"> </h5>
                    </div>
                </div> -->
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Biaya :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="biayabeli"> </h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Total biaya :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="totalbeli"> </h5>
                    </div>
                </div>
              </div>
              <div style="overflow:auto;">
                <div style="float:right;">
                  <button type="button" id="prevBtnBuy" onclick="nextPrevBuy(-1)">Previous</button>
                  <button type="button" id="nextBtnBuy" onclick="nextPrevBuy(1)">Next</button>
                </div>
              </div>
              <div style="text-align:center;margin-top:40px;">
                <span class="stepBuy"></span>
                <span class="stepBuy"></span>
              </div>
              <input type="hidden" name="curr" value="BTC">
            </form>
        </div>
        <div class="col-5">
            <form id="regFormSell" method="POST" action="{{'/instant/sell'}}" style="width: auto">
              {{ csrf_field() }}
              <h1>Jual Bitcoin:</h1>
              <!-- One "tab" for each step in the form: -->
              <div class="tabSell">Input:
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Saldo Bitcoin:</h5>
                    </div>
                    <div class="col-5">
                        <h5> @foreach($btc as $b) {{$b->balance}} @endforeach BTC </h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah Bitcoin:</h5>
                    </div>
                    <div class="col-5">
                        <input id="sellamount" style="float: right; max-width: 250px" placeholder="Jumlah Bitcoin..." oninput="this.className = ''" name="value">

                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Harga 1 Bitcoin:</h5>
                    </div>
                    <div class="col-5">
                        <h5> Harga mengikuti harga pasar saat ini.</h5>
                    </div>
                </div>
              </div>
              <div class="tabSell">Konfirmasi:
                <div class="row" style="margin-bottom: 25px;">
                    <h5> Tinjau kembali data transaksi sebelum melanjutkan. Transaksi tidak bisa dibatalkan setelah langkah selanjutnya. </h5>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah bitcoin :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="jumlahjual"> </h5>
                    </div>
                </div>
                <!-- <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi harga :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="estimasihargajual"> RP </h5>
                    </div>
                </div> -->
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Biaya :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="biayajual"></h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Total biaya :</h5>
                    </div>
                    <div class="col-5">
                        <h5 id="totaljual"> </h5>
                    </div>
                </div>
              </div>
              <div style="overflow:auto;">
                <div style="float:right;">
                  <button type="button" id="prevBtnSell" onclick="nextPrevSell(-1)">Previous</button>
                  <button type="button" id="nextBtnSell" onclick="nextPrevSell(1)">Next</button>
                </div>
              </div>
              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="stepSell"></span>
                <span class="stepSell"></span>
              </div>
              <input type="hidden" name="curr" value="BTC">
            </form>
        </div>
    </section>
</div>

<script src="{{ asset('js/instantBuy.js') }}"></script>
<script src="{{ asset('js/instantSell.js') }}"></script>

@endsection
