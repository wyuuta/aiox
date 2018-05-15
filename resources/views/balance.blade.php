@extends('layouts.app')
@section('navbarlink')
<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="{{route('instant')}}">Tukar Instan</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('market')}}">Market</a></li>
    <li class="nav-item active" ><a class="nav-link" href="{{route('balance')}}">Balance</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('profil')}}">Profil</a></li>
</ul>
@endsection
@section('content')
<div class="row justify-content-center" style="margin-top: 50px;">
	<div class="col-lg-12">
	    <table class="table table-dark table-hover" style="min-width: 500px; width: 100%;">
	        <thead>
	            <tr>
	                <th class="kode-cell justify-content-center">Kode</th>
	                <th class="name-cell justify-content-center">Nama</th>
	                <th class="saldo-cell justify-content-center">Saldo</th>
	                <th class="aksi-cell justify-content-center">Aksi </th>
	            </tr>
	      	</thead>
	       	<tbody>
	            <tr>
		            <td class="kode-cell">RP</td>
		            <td class="name-cell">Rupiah</td>
		            <td class="saldo-cell">Rp 0</td>
		            <td class="aksi-cell"> 
		                <button type="button" class="btn btn-primary" href="/rupiah">
		                    Deposit/Withdraw
		                </button>
		            </td>
	            </tr>
	            <tr>
	                <td class="kode-cell">BTC</td>
	                <td class="name-cell">Bitcoin</td>
	                <td class="saldo-cell">0 BTC</td>
	                <td class="aksi-cell"> 
	                    <button type="button" class="btn btn-primary" href="{{url('bitcoin')}}">
	                        Deposit/Withdraw
	                    </button>
	                </td>
	            </tr>
	            <tr>
	                <td class="kode-cell">ETH</td>
	                <td class="name-cell">Etherium</td>
	                <td class="saldo-cell">0 ETH</td>
	                <td class="aksi-cell">
	                    <button type="button" class="btn btn-primary" href="{{url('etherium')}}">
	                        Deposit/Withdraw
	                    </button>
	                </td>
	            </tr>
	        </tbody>
	    </table>
	</div>
    
</div>
@endsection