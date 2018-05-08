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
<div class="row" style="margin-top: 50px; padding: 20px">
	<div class="col-md-12 no-padding" >
		<div class="contentpanel no-padding">
		<ul class="nav nav-tabs navbar-dark bg-dark" role="tablist">
			<li class="nav-item">
				<a data-toggle="tab" class="nav-link active" href="#deposit">
					<h4>Deposit Rupiah</h4>
				</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" class="nav-link" href="#withdraw">
					<h4>Withdraw Rupiah</h4>
				</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" class="nav-link" href="#history">
					<h4>History</h4>
				</a>
			</li>
		</ul>
		<div class="tab-content clearfix tab-content-dark">
			<div class="tab-pane active" id="deposit">
				@yield('depocontent')
			</div>
			<div class="tab-pane fade" id="withdraw">
				@yield('wdcontent')
			</div>
			<div class="tab-pane fade" id="history">
				@yield('historycontent')
			</div>
		</div>
		</div>
	</div>
</div>
@endsection