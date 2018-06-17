@extends('dashboard.masterdashboard')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/kakakAsuh/kakakAsuh.css')}}">
@endsection
@section('content')
<div id="page-wrapper">
<br>
<br>
	<div class="row">
	    <div class="col-lg-offset-2 col-lg-8">
	      <div class="panel panel-info">
	        <div class="panel-heading">
	          <h3 class="panel-title">Pilih Paket Kakak Asuh</h3>
	        </div>
	        <div class="panel-body">
	              <div class="row ">

	                 <form action="{{route('paket-amal.store',$id_santri)}}" method="post" role="form" action="">
	                    {{csrf_field()}}
	                    {{ method_field('POST') }}
	                <div class=" col-lg-offset-2 col-8"> 
	                   <div class="funkyradio col-lg-8 col-lg-offset-1">
					        <div class="funkyradio-info">
					            <input value="108000" type="radio" name="package" id="package-a" />
					            <label for="package-a">Paket A Rp 108.000,- perbulan</label>
					        </div>
					        <div class="funkyradio-info">
					            <input value="180000" type="radio" name="package" id="package-b" />
					            <label for="package-b">Paket B Rp 180.000,- perbulan</label>
					        </div>
					        <div class="funkyradio-info">
					            <input checked value="288000" type="radio" name="package" id="package-c" />
					            <label for="package-c">Paket C Rp 288.000,- perbulan</label>
					        </div>
					    
					        <br>
					        <div class="form-group">
						        <select name="amount_month" class="form-control">
									<option value="6" >6 bulan</option>
									<option value="3">3 bulan</option>
									<option value="1">1 bulan</option>
								</select>
							</div>
							<div>
								<button id="submit" name="submit"  class="btn btn-info">Kirim</button>
							</div>
						</div>
					</div>
	                 
	                </div>
	                </form>
	              </div>
	        </div>
	      </div>
	    </div>
	  </div>
</div>
@endsection