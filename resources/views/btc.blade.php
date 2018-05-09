@extends('layouts.wddepo')

@section('depocontent')
Ini depo btc
<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				Silakan kirim Bitcoin ke alamat di bawah ini:
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-3 no-padding no-margin">Alamat bitcoin:</label>
				<input class="col-md-8 no-padding no-margin" type="text" name="" readonly="readonly" value="0,0005">
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>Alamat di atas khusus untuk anda, dan dapat digunakan berulang kali.</li>
					<li>Deposit akan masuk setelah 3 konfirmasi (30-60 menit).</li>
					<li>Deposit Bitcoin tidak dikenakan biaya.</li>
					<li>Mengirim token selain BTC ke alamat di atas akan menyebabkan token tersebut hilang.</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="col-md-4">
			Scan QR Code di samping untuk mempermudah deposit Bitcoin dari smartphone/tablet.
		</div>
		<div class="col-md-8">
			Ini isinya qr code dari alamat wallet
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
			<label class="col-md-3 no-padding no-margin">Jumlah BTC:</label>
			<input class="col-md-8 no-padding no-margin" type="text" name="" placeholder="Jumlah penarikan"/>
		</div>
		<div class="form-group">
			<label class="col-md-3 no-padding no-margin">Biaya penarikan:</label>
			<input class="col-md-8 no-padding no-margin" type="text" name="" readonly="readonly" value="0,0005">
		</div>
		<div class="form-group">
			<label class="col-md-3 no-padding no-margin">Terima bersih:</label>
			<input class="col-md-8 no-padding no-margin" type="text" name="" value="0" placeholder="Jumlah bersih btc yang akan diterima">
		</div>
		<div class="form-group">
			<label class="col-md-3 no-padding no-margin">Alamat bitcoin:</label>
			<input class="col-md-8 no-padding no-margin" type="text" name="" placeholder="Alamat bitcoin">
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
			<h5>Minimal penarikan 0,001 BTC..</h5>
		</div>
		<div class="row no-padding">
			<h5>Maksimal penarikan 2 BTC per hari.</h5>
		</div>
		<div class="row no-padding">
			<h5>Biaya 0,0005 BTC dipotong dari jumlah penarikan.</h5>
		</div>
		<div class="row no-padding">
			<h5>BTC akan masuk ke wallet tujuan dalam 60 menit.</h5>
		</div>
		<div class="row no-padding">
			<h5>Bitcoin akan dikirim dari alamat hot storage kami, bukan dari alamat Bitcoin yang Anda gunakan untuk melakukan deposit.
			</h5>
		</div>
	</div>
</div>@endsection

@section('historycontent')
<div class="row ">
	<div class="col-md-12">
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
