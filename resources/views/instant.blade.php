@extends('layouts.app')
@section('navbarlink')
<ul class="navbar-nav mr-auto">
    <li class="nav-item active"><a class="nav-link" href="{{route('instant')}}">Tukar Instan</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('market')}}">Market</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('balance')}}">Balance</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('profil')}}">Profil</a></li>
</ul>
@endsection
@section('content')
<div class ="container-fluid no-padding" style="margin-top: 40px">
    <!-- list crypto -->
    <section class="row">
        <div class="container-fluid">
        <table class="table table-light table-hover table-responsive-lg table-bordered" style="padding: 50px;">
            <thead>
                <tr>
                    <th>Crypto currency</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img width="16" height="16" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/Ripple.png')}}"/>
                        <span>Ripple</span>
                    </td>
                    <td>5146</td>
                </tr>
                <tr>
                    <td>
                        <img width="16" height="16" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/ETC.png')}}"/>
                        <span>ETC</span>
                    </td>
                    <td>14.2</td>
                </tr>
                <tr>
                    <td>
                        <img width="16" height="16" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/BCH.png')}}"/>
                        <span>BCH</span>
                    </td>
                    <td>1.23</td>
                </tr>
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
                            Saldo Ripple
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-7 bg-warning">
                            <div class="row">
                            <div class="col-1">
                                <img width="30" height="30" class="logo-sprite" alt="Bitcoin" src="{{URL::asset('/image/icons/Ripple.png')}}"/>
                            </div>
                                
                            <div class="col-6">
                                <h5>Ripple</h5> 
                            </div>
                            </div>
                        </div>
                        <div class="col-5" >
                            <h4 >5146 XRP</h4>
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
                            <h4 >RP 0</h4>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>

    <!-- instant trade -->
    <section class="row justify-content-center">
        <div class="col-5">
            <form id="regFormBuy" action="/action_page.php" style="width: auto">
              <h1>Beli Ripple:</h1>
              <!-- One "tab" for each step in the form: -->
              <div class="tabBuy">Input:
                <div class="row " style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Saldo Rupiah:</h5>
                    </div>
                    <div class="col-5">
                        <h5> Rp 0 </h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah rupiah</h5>
                    </div>
                    <div class="col-5">
                        <input style="float: right; max-width: 250px" placeholder="Jumlah Rupiah..." oninput="this.className = ''" name="inputBuy">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Harga 1 Ripple:</h5>
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
                        <h5> 4500000</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi harga :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 5145 XRP</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Biaya :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 526</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi ripple diterima :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 514,46</h5>
                    </div>
                </div>
              </div>
              <div style="overflow:auto;">
                <div style="float:right;">
                  <button type="button" id="prevBtnBuy" onclick="nextPrevBuy(-1)">Previous</button>
                  <button type="button" id="nextBtnBuy" onclick="nextPrevBuy(1)">Next</button>
                </div>
              </div>
              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="stepBuy"></span>
                <span class="stepBuy"></span>
              </div>
            </form>
        </div>
        <div class="col-5">
            <form id="regFormSell" action="/action_page.php" style="width: auto">
              <h1>Jual Ripple:</h1>
              <!-- One "tab" for each step in the form: -->
              <div class="tabSell">Input:
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Saldo Ripple:</h5>
                    </div>
                    <div class="col-5">
                        <h5> 5148 XRP </h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Jumlah ripple:</h5>
                    </div>
                    <div class="col-5">
                        <input style="float: right; max-width: 250px" placeholder="Jumlah Rupiah..." oninput="this.className = ''" name="inputSell">

                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Harga 1 Ripple:</h5>
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
                        <h5> Jumlah ripple :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 5145</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi harga :</h5>
                    </div>
                    <div class="col-5">
                        <h5> RP 450000</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Biaya :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 5000</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-5">
                        <h5> Estimasi rupiah diterima :</h5>
                    </div>
                    <div class="col-5">
                        <h5> 445000</h5>
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
            </form>
        </div>
    </section>
</div>

<script src="{{ asset('js/instantBuy.js') }}"></script>
<script src="{{ asset('js/instantSell.js') }}"></script>

@endsection
