@extends('dashboard.masterdashboard')
@section('title')
Detail Konfirmasi Transfer
@endsection
@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Konfirmasi Transfer</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Detail Konfirmasi Transfer</h3>
					</div>
					<div class="panel-body">
						<div class="row">
                <div class=" col-md-12 col-lg-12 "> 
                 
                  <table class="table table-user-information">
                    <tbody>
                    	<tr>
                        <td><b>No Invoice</b></td>
                        <td>{{$conf->invoice}}</td>
                      </tr>
                      <tr>
                        <td><b>Nama Pemilik Rekening</b></td>
                        <td>{{$conf->bill_name}}</td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td>{{$conf->email}}</td>
                      </tr>
                      <tr>
                        <td><b>Nomor Hp/WA</b></td>
                        <td>{{$conf->hp}}</td>
                      </tr>
                      <tr>
                        <td><b>Tanggal Transfer</b></td>
                        <td>{{date('d/m/Y',strtotime($conf->transfer))}}</td>
                      </tr>
                      <tr>
                        <td><b>Keterangan</b></td>
                        <td>{{$conf->information}}</td>
                      </tr>
                      <tr>
                        <td><b>Total Pembayaran</b></td>
                        <td>Rp {{$conf->fund}} ,-</td>
                      </tr>
                      <tr>
                        <td><b>Bukti Foto</b></td>
                        <td><img alt="User Pic" src="{{asset('proof/'.$conf->photo)}}" class="img-circle img-responsive"></td>
                      </tr>
                      <tr>
                  </table>
                </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
@endsection