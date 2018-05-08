@extends('layouts.wddepo')

@section('depocontent')
<h3>Ini Deposit Rupiah</h3>
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
			<label class="col-md-3 no-padding no-margin">Jumlah penarikan</label>
			<input class="col-md-8 no-padding no-margin" type="text" name="" placeholder="Jumlah penarikan"/>
		</div>
		<div class="form-group">
			<label class="col-md-3 no-padding no-margin">Biaya penarikan</label>
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
	<div class="col-md-12">
		<h5><strong>Riwayat Mutasi Rupiah</strong></h5>
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
						TX
					</th>
					<th style="width: 20%;">
						Status
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="6"><center><strong>-KOSONG-</strong></center></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection