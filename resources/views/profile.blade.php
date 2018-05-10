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
<!-- Profile side bar -->
<div class="row" style="height: 1080px">
	<div class="col-md-2">
		<div class="sidenav">
			<div class="profilepict">
				<img src="{{URL::asset('/image/blank-avatar.png')}}" width="200" height="200" class="img-thumbnail">
			</div>
			<hr/>
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="#detilakun" data-toggle="tab">
						Akun
					</a>
				</li>
				<hr/>
				<li class="nav-item">
					<a class="nav-link" href="#editakun" data-toggle="tab">
						Edit Akun
					</a>
				</li>
				<hr/>
				<li class="nav-item">
					<a class="nav-link" href="#keamanan" data-toggle="tab">
						Keamanan
					</a>
				</li>
				<hr/>
			</ul>
			
		</div>
	</div>

<!-- Profile content -->
	<div class="col-md-10">
	<div class="tab-content clearfix tab-content-dark" style="margin-top: 80px;">
		<div class="tab-pane active" id="detilakun"	>
			<div class="row m15">
				<div class="col-md-3">
					Nama Lengkap
				</div>
				<div class="col-md-8">
					Jono Budiman
				</div>
			</div>
			<div class="row m15">
				
				<div class="col-md-3">
					Email
				</div>
				<div class="col-md-8">
					jono.budiman@gmail.com
				</div>
				
			</div>
			<div class="row m15">
				
				<div class="col-md-3">
					Nomor HP
				</div>
				<div class="col-md-8">
					081568975587515
				</div>
				
			</div>
			<div class="row m15">
				
				<div class="col-md-3">
					Alamat
				</div>
				<div class="col-md-8">
					Araya tahap 1 Nomor 51, Surabaya, Jawa Timur
				</div>
				
			</div>
		</div>
		<div class="tab-pane fade" id="editakun">
			Ini edit akun
		</div>
		<div class="tab-pane fade" id="keamanan">
			Ini kemanan
		</div>
	</div>
	</div>
</div>
@endsection