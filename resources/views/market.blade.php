@extends('layouts.app')

@section('navbarlink')
<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="{{route('instant')}}">Tukar Instan</a></li>
    <li class="nav-item active"><a class="nav-link" href="{{route('market')}}">Market</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('balance')}}">Balance</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{route('profil')}}">Profil</a></li>
</ul>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top: 55px;">
		<!-- list market area -->
		<div class="col-lg-4">
			<!-- maket nav -->
			<div class="no-padding">
				<ul class="nav nav-tabs navbar-dark bg-dark" role="tablist">
					<li class="nav-item">
						<a data-toggle="tab" class="nav-link active" href="{{url('/market/IDR')}}">
							<h4>IDR</h4>
						</a>
					</li>
					<li class="nav-item">
						<a data-toggle="tab" class="nav-link" href="{{url('/market/BTC')}}">
							<h4>BTC</h4>
						</a>
					</li>
					<li class="nav-item">
						<a data-toggle="tab" class="nav-link" href="{{url('/market/ETC')}}">
							<h4>ETC</h4>
						</a>
					</li>
				</ul>
			</div>
			<!-- end market nav -->
			<table class="table table-dark table-hover no-padding table-striped" style="margin:0px;">
				<thead>
					<tr>
						<td>Kode</td>
						<td>Harga</td>
						<td>Volume</td>
						<td>Change</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>BTC</td>
						<td>RP 120222548</td>
						<td>4.1248 M</td>
						<td>1%</td>
					</tr>
					<tr>
						<td>ETH</td>
						<td>RP 12222548</td>
						<td>2.1248 M</td>
						<td>0.1%</td>
					</tr>
					<tr>
						<td>ETC</td>
						<td>RP 1222254</td>
						<td>410 Jt</td>
						<td>0.5%</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- end list market area -->

		<!-- chart etc -->
		<div class="col-lg-8">
			<div class="container-fluid">
				<!-- chart -->
				<div class="row">
					<div class="col-lg-12">
					</div>

				</div>
				<!-- end chart -->

				<!-- buy and sell crypto -->
				<div class="row" style="margin-top: 25px;">
					<!-- buy crypto -->
					<div class="col-lg-6">
						<div class="contentpanel no-padding">

							<ul class="nav nav-tabs navbar-dark bg-dark" role="tablist">
								<li class="nav-item">
									
									<h4>Beli btc</h4>
									
								</li>
							</ul>
							<div class="tab-content clearfix tab-content-dark">
								<div class="tab-pane active" id="deposit" >
									<form>
										{{csrf_field()}}
										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Total Rupiah
										    </label>
										    <div class="col-sm-8">
										      	<input type="text" placeholder="Jumlah rupiah" name="value">
										    </div>
										</div>

										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Harga
										    </label>
										    <div class="col-sm-8">
										      	<input type="text" readonly="" value="120225400">
										    </div>
										</div>

										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Biaya
										    </label>
										    <div class="col-sm-8">
										      	<input id="biayabeli" readonly="" value="5014200">
										    </div>
										</div>

										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Estimasi
										    </label>
										    <div class="col-sm-8">
										      	<input id="estimasibeli" readonly="" value="120225400">
										    </div>
										</div>
									</form>
								</div>
							</div>

						</div>
					</div>
					<!-- end buy crypto -->

					<!-- sell crypto -->
					<div class="col-lg-6">
						<div class="contentpanel no-padding">

							<ul class="nav nav-tabs navbar-dark bg-dark" role="tablist">
								<li class="nav-item">
									
									<h4>Jual btc</h4>
									
								</li>
							</ul>
							<div class="tab-content clearfix tab-content-dark">
								<div class="tab-pane active" id="deposit" >
									<form>
										{{csrf_field()}}
										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Total BTC
										    </label>
										    <div class="col-sm-8">
										      	<input type="text" placeholder="Jumlah rupiah" name="value">
										    </div>
										</div>

										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Harga
										    </label>
										    <div class="col-sm-8">
										      	<input type="text" readonly="" value="120225400">
										    </div>
										</div>

										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Biaya
										    </label>
										    <div class="col-sm-8">
										      	<input id="biayabeli" readonly="" value="0.0021">
										    </div>
										</div>

										<div class="form-group row">
										    <label class="col-sm-4 col-form-label">
										    	Estimasi
										    </label>
										    <div class="col-sm-8">
										      	<input id="estimasibeli" readonly="" value="120225400">
										    </div>
										</div>
									</form>
								</div>
							</div>

						</div>
					</div>
					<!-- end sell crypto -->
				</div>
				<!-- end buy and sell crypto -->

				<!-- order records -->
				<div class="row" style="margin-top: 25px;">
				<!-- order buy crypto -->
					<div class="col-lg-6">
						<div class="contentpanel no-padding" style="overflow-y:auto; height: 100px">

							<ul class="nav nav-tabs navbar-dark bg-dark" style ="position: static;" role="tablist">
								<li class="nav-item">
									
									<h4>Order Buy</h4>
									
								</li>
							</ul>
							
							<div class="tab-content clearfix tab-content-dark">
								<div class="tab-pane active" id="deposit">
									<table class="table table-dark table-hover no-padding table-striped">
										<thead>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- end order buy crypto -->

					<!-- order sell crypto -->
					<div class="col-lg-6">
						<div class="contentpanel no-padding" style="overflow-y:auto; height: 100px">

							<ul class="nav nav-tabs navbar-dark bg-dark" style ="position: static;" role="tablist">
								<li class="nav-item">
									
									<h4>Order Sell</h4>
									
								</li>
							</ul>
							
							<div class="tab-content clearfix tab-content-dark">
								<div class="tab-pane active" id="deposit">
									<table class="table table-dark table-hover no-padding table-striped">
										<thead>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
											<tr>
												<td>
													Kode
												</td>
												<td>
													Jumlah rupiah
												</td>
												<td>
													Jumlah BTC
												</td>
												<td>
													Bid
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- end order sell crypto -->
				</div>
				<!-- end order records -->

				<!-- history  -->
				<div class="row" style="margin-top: 25px;">
					<div class="col-lg-12">
					<div class="contentpanel no-padding" style="overflow-y:auto; height: 100px">
						<ul class="nav nav-tabs navbar-dark bg-dark" style ="position: static;" role="tablist">
							<li class="nav-item">
								<h4>Order History</h4>
							</li>
						</ul>
							
						<div class="tab-content clearfix tab-content-dark">
							<div class="tab-pane active" id="deposit">
								<table class="table table-dark table-hover no-padding table-striped">
									<thead>
										<tr>
											<td>
												Tanggal
											</td>
											<td>
												Waktu
											</td>
											<td>
												Type
											</td>
											<td>
												Harga
											</td>
											<td>
												BTC
											</td>
											<td>
												Sum
											</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												Tanggal
											</td>
											<td>
												Waktu
											</td>
											<td>
												Type
											</td>
											<td>
												Harga
											</td>
											<td>
												BTC
											</td>
											<td>
												Sum
											</td>
										</tr>
										<tr>
											<td>
												Tanggal
											</td>
											<td>
												Waktu
											</td>
											<td>
												Type
											</td>
											<td>
												Harga
											</td>
											<td>
												BTC
											</td>
											<td>
												Sum
											</td>
										</tr>
										<tr>
											<td>
												Tanggal
											</td>
											<td>
												Waktu
											</td>
											<td>
												Type
											</td>
											<td>
												Harga
											</td>
											<td>
												BTC
											</td>
											<td>
												Sum
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
				</div>
				<!-- end history -->
			</div>
		</div>
		<!-- end chart, etc -->
	</div>
</div>
@endsection