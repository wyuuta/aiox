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
	       		@foreach($wallet as $w)
	       			<tr>
			            <td class="kode-cell">{{$w->currency}}</td>
			            <td class="name-cell">{{$w->currency_name}}</td>
			            <td class="saldo-cell">{{$w->currency." ".$w->balance}}</td>
			            <td class="aksi-cell"> 
			                <a type="button" class="btn btn-primary" href="{{url('/balance/'.$w->currency)}}">
			                    Deposit/Withdraw
			                </a>
			            </td>
		            </tr>
	       		@endforeach   
	        </tbody>
	    </table>
	</div>
    
</div>
@endsection