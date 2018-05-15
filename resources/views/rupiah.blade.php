@extends('layouts.wddepo')

@section('depocontent')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<form method="POST" action="{{url('/balance/deposit/rupiah')}}">
			{{ csrf_field() }}
			<div class="form-group">
				<div class="col-md-12" style="padding: 20px 20px;">
					Kami menerima beberapa metode pembayaran untuk memudahkan para member dalam melakukan deposit Rupiah ke akun Indodax. Silakan masukan nominal deposit yang Anda inginkan dan pilih sumber dana/metode pembayaran yang paling mudah untuk Anda.
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 no-padding no-margin">Jumlah deposit:</label>
				<input class="col-md-8 no-padding no-margin" type="text" name="value" placeholder="Jumlah deposit"/>
			</div>
			<div class="form-group">
				<div class="row" style="padding-left: 20px;">
				<label class="col-md-3 no-padding no-margin">Sumber dana:</label>
				<div class="col-md-8">
					<div class="dropdown">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    						Pilihan Bank
  						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item">Bank Mandiri</a>
							<a class="dropdown-item">Bank BCA</a>
							<a class="dropdown-item">Bank BNI</a>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 no-padding no-margin">Nomer rekening anda:</label>
				<input class="col-md-8 no-padding no-margin" type="text" name="nomerRekening"/>
			</div>
			<div class="form-group">
				<input class="btn btn-success col-md-3" type="submit" style="margin-left: 10px;" value="submit">
					
				</input>
				<input type="hidden" name="curr" value="IDR">
			</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('wdcontent')
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<div class="col-md-12">
				Untuk melakukan penarikan Rupiah, lengkapi isian di bawah dengan teliti:
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 no-padding no-margin">Jumlah penarikan:</label>
			<input class="col-md-8 no-padding no-margin" type="text" name="" placeholder="Jumlah penarikan"/>
		</div>
		<div class="form-group">
			<label class="col-md-3 no-padding no-margin">Biaya penarikan:</label>
			<input class="col-md-8 no-padding no-margin" type="text" name="" readonly="readonly" value="0">
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<button class="btn btn-success">
					Withdraw
				</button>
			</div>
		</div>	
	</div>
	<div class="col-md-6">
		<div class="row no-padding">
			<h5>Minimal penarikan Rp. 100.000.</h5>
		</div>
		<div class="row no-padding">
			<h5>Maksimal penarikan Rp. 200.000.000 per hari.</h5>
		</div>
		<div class="row no-padding">
			<h5>Biaya 1% dihitung dari jumlah penarikan.</h5>
		</div>
		<div class="row no-padding">
			<h5>Minimal biaya adalah Rp. 25.000</h5>
		</div>
		<div class="row no-padding">
			<h5>Semua penarikan Rupiah akan diproses menggunakan jaringan LLG (Kliring) atau RTGS. Proses penarikan hingga dana masuk ke rekening Anda akan memakan waktu 1 hari kerja bank.</h5>
		</div>
	</div>
</div>
@endsection
@section('historycontent')
<div class="row">
	<div class="col-md-12 justify-content-center">
		<h5 style="text-align: center;"><strong>Riwayat Mutasi Rupiah</strong></h5>
		<table class="table table-bordered table-striped table-dark">
			<thead>
				<tr>
					<th style="width: 20%;">
						Waktu
					</th>
					<th style="width: 10%;">
						Jenis
					</th>
					<th style="width: 10%;">
						Jumlah
					</th>
					<th style="width: 20%;">
						Tujuan
					</th>
					<th style="width: 20%;">
						Status
					</th>
				</tr>
			</thead>
			<tbody>
				@if(count($transactions) == 0)
					<tr>
						<td colspan="5"><center><strong>-KOSONG-</strong></center></td>
					</tr>
				@else
					@foreach($transactions as $t)
						<tr>
							<td>{{$t->updated_at}}</td>
							<td>{{$t->type}}</td>
							<td>{{$t->value}}</td>
							@if($t->type!="DEPOSIT")
								<td>{{$t->to_user}}</td>
							@else
								<td>Self</td>
							@endif
							<td>Success</td>
						</tr>
					@endforeach
				@endif
				
			</tbody>
		</table>
	</div>
</div>
@endsection