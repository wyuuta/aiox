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
        
    </section>
</div>
@endsection
