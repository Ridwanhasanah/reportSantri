<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('Logo IT ICON.png') }}" >    

    {{-- Pondokit Ridwan Css Start--}}
    <link rel="stylesheet" href="{{asset('css/cssPondokit.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/profile.css')}}">    --}}
    {{-- Pondokit Ridwan Css End--}}

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    <link href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- DataTables --}}
    <link href="{{asset('dashboard/vendor/datatables/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">

    {{-- SweetAlert2 --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('dashboard/vendor/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('dashboard/vendor/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- MetisMenu CSS -->
    <link href="{{asset('dashboard/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dashboard/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('dashboard/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('dashboard/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    {{-- kakak asug css --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/kakakAsuh/kakakAsuh.css')}}">
    {{-- themify icons --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/kakakAsuh/themify-icons/themify-icons.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body id="bounce1">
	<div class="header">
		<div class="container-fluid">
				<div class="row headerkka">
					<div class=" headerlogin col col-lg-push-8 col-lg-4">
						<a class="btn btn-default btn-outline" href="{{route('login')}}">
							<i class="fa fa-sign-in"></i>
							LOGIN
							<span>Relawan  / Donatur</span>
						</a>
						<a target="_blank" class="btn btn-default btn-outline" href="http://pondokit.com">
							<i class="fa fa-home"></i>
							<span>pondokit.com</span>
						</a>
					</div>
				</div>
				{{-- row 1 start--}}
				<div class="row kka1">
					<div class="kka1a col col-xs-12 col-sm-12 col-md-6 col-lg-7 ">
						<img src="http://pondokit.com/wp-content/uploads/2017/10/Logo-IT-tulisan-putih-e1519097611504.png">
						<h1>
							Ayo jadi kakak asuh di Pondok IT,
							Pondok IT Membuka program membantu adik asuh (santri Pondok IT) yang tidak mampu atau belum mandiri
						</h1>
						<h3>
							Kategori: Program Pendidikan
						</h3>
						<a href="" class="btn btn-lg btn-danger hidden-xs">Lanjut <span class="ti-arrow-right""></span></a>
					</div>
					<div class="kka1a col-xs-12 col-sm-12 col-md-6 col-lg-5 hide-img">
						<img id="bouncing1" src="{{asset('images/kakakasuh1.png')}}">
					</div>
				</div>
				{{-- row 1 end--}}
				{{-- row 2 start--}}
				<div class="row kka2 ">
					<h1 class="row-title header-title">Mengapa program kakak asuh?</h1>
					<div  class="row justify-content-md-center kka2a">
						<div class="col col-lg-12 col-xs-12 col-md-12">
							<div class="col col-xs-12 col-md-3 col-lg-3 feature">
								<span class="ti-ruler-pencil"></span>
								<h3>Biaya Pendidikan</h3>
								<p>Setiap kakak asuh di perkenankan untuk menanggung biaya pendidikan adik asuhnya sesuai jumlah adik asuh dan paket yang di ambil (sesuai pilihan dan kemampuan kakak asuh).</p>
							</div>
							<div class="col col-xs-12 col-md-3 col-lg-3 feature">
								<span class="ti-id-badge"></span>
								<h3>Mendapat Data Diri</h3>
								<p>Setiap kakak asuh akan mendapatkan data adik asuh yang menjadi tanggungannya</p>
							</div>
							<div class="col col-xs-12 col-md-3 col-lg-3 feature">
								<span class="ti-stats-up"></span>
								<h3>Laporan Perkembangan</h3>
								<p>Kakak asuh akan menerima laporan perbulan perkembangan adik asuhnya.</p>
							</div>
							<div class="col col-xs-12 col-md-3 col-lg-3 feature">
								<span class="ti-face-smile"></span>
								<h3>Silaturrahmi</h3>
								<p>Kakak asuh mendapatkan program silaturrahmi antara kakak asuh dengan adik yang ditanggung biaya pendidikannya.</p>
							</div>
						</div>
					</div>
				</div>
				{{-- row 2 end--}}
				{{-- row 3 start--}}
				<div class="row kka3">
					<h2 class="row-title header-title">Jenis Pilihan Paket Adik Asuh</h2>
					<div class="row feature  justify-content-md-center kka4margin">
						<div  class="col col-lg-4">
							<h3>Paket A</h3>
							<h1>Rp 108.000</h1>
							<p>per Bulan dan per Santri</p>
						</div>
						<div class="col col-lg-4">
							<h3>Paket B</h3>
							<h1>Rp 180.000</h1>
							<p>per Bulan dan per Santri</p>
						</div>
						<div class="col col-lg-4">
							<h3>Paket C</h3>
							<h1>Rp 288.000</h1>
							<p>per Bulan dan per Santri</p>
						</div>
					</div>
				</div>
				{{-- row 3 end--}}
				{{-- row 4 start--}}
				<div class="row kka4">
					<div class="kka4a">
						<h2 class="row-title header-title">Cara Menjadi Kakak Asuh</h2>
							<div class="row">
								<div class="col-lg-1 col-xs-0"></div>
								<div class="col col-lg-4 col-md-4 col-xs-12 box">
									<img src="https://sedekahharian.com/assets/kakakasuh/img/number-1.png">
									<h3>Isi Form</h3>
									<p>Sertakan nama, email, nomor HP, alamat & foto asli.</p>
								</div>
								<div class="col col-lg-4 col-md-4 col-xs-12 box">
									<img src="https://sedekahharian.com/assets/kakakasuh/img/number-2.png">
									<h3>Pilih Beasiswa</h3>
									<p>Tentukan jenis beasiswa yang ingin di ambil.</p>
								</div>
								<div class="col col-lg-4 col-md-4 col-xs-12 box">
									<img src="https://sedekahharian.com/assets/kakakasuh/img/number-3.png">
									<h3>Jumlah Anak</h3>
									<p>Tentukan jumlah anak yang ingin di asuh.</p>
								</div>
							</div>
							{{-- <br> --}}
							<div class="row" style="margin-top: 0px;">
								<div class="col-lg-1 col-xs-0"></div>
								<div class="col col-xs-0 col-lg-2"></div>
								<div class="col col-xs-12 col-lg-4 box">
									<img src="https://sedekahharian.com/assets/kakakasuh/img/number-4.png">
									<h3>Transfer Awal</h3>
									<p>Transfer awal sebagai bentuk komitmen.</p>
								</div>
								<div class="col col-xs-12 col-lg-4 box">
									<img src="https://sedekahharian.com/assets/kakakasuh/img/number-5.png">
									<h3>Invoice</h3>
									<p>Kakak asuh akan menerima invoice keikutsertaan.</p>
								</div>
							</div>
					</div>
				</div>
				{{-- row 4 end--}}
				{{-- row 5 start--}}
				<div class="row kka5">
					<div class="kka5a">
						<div class="col col-lg-1 col-xs-0"></div>
						<div class="col col-lg-6 col-xs-12 col-md-6">
							@include('layouts.patrials.alerts')
							<h3><span class="ti-write"></span> &nbsp; Form Keikutsertaan</h3>
							<form class="form-horizontal" method="post" action="{{route('kkaregis.store')}}">
								{{csrf_field()}}
									<div class="form-group">
										<label class="col-lg-3">Nama*</label>
										<div class="col-lg-9">
											<input required value="{{ old('name') }}" name="name" id="name" class="form-control" type="text">
											<span  class="errorval errorRegis" id="errorName"></span>
										</div>
									</div>
									<div class="form-group has-feedback{{$errors->has('email') ? ' has-error' : ''}}">
										<label class="col-lg-3">Email*</label>
										<div class="col-lg-9">
											<input id="email" required name="email" value="{{ old('email') }}" class="form-control" type="email">
											<span  class="errorval errorRegis" id="errorEmail"></span>
											@if ($errors->has('email'))
												<span class="errorRegis2">
													{{$errors->first('email')}}
												</span>
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Password*</label>
										<div class="col-lg-9">
											<input id="password" required name="password" class="form-control" type="password">
											<span  class="errorval errorRegis" id="errorPassword"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Ulangi Password*</label>
										<div class="col-lg-9">
											<input id="repass" required name="repass" class="form-control" type="password">
										</div>
									</div>
									<div class="form-group has-feedback{{$errors->has('hp') ? ' has-error' : ''}}">
										<label class="col-lg-3">Nomor HP*</label>
										<div class="col-lg-9">
											<input id="hp" required name="hp" value="{{ old('hp') }}" class="form-control" type="number">
											<span  class="errorval errorRegis" id="errorHp"></span>
											@if ($errors->has('hp'))
											<span class="errorRegis2">
												{{$errors->first('hp')}}
											</span>
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Tempat Lahir*</label>
										<div class="col-lg-9">
											<input required id="date_place" name="date_place" value="{{ old('date_birth') }}" class="form-control" type="text">
											<span  class="errorval errorRegis" id="errorDateplace"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Tanggal Lahir*</label>
										<div class="col-lg-9">
											<input value="{{old('date_birth')}}" required name="date_birth" id="datepicker" class="form-control date_birth" type="date">
											<span  class="errorval errorRegis" id="errorDatebirth"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3">Alamat*</label>
										<div class="col-lg-9">
											<textarea id="address" name="address" class="form-control" rows="7">{{ old('address') }}</textarea>
											<span  class="errorval errorRegis" id="errorAddress"></span>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-9 col-lg-offset-3 col-xs-12">
											<button name="submit" value="submit" id="submit" type="submit" class="btn btn-info btn-lg pull-right">
												Daftar <span class="ti-arrow-right"></span>
											</button>
											<p class="pull-right">
												<a href="{{route('login')}}" class="btn btn-default btn-lg">Login</a>
												&nbsp; atau &nbsp;
											</p>
										</div>
									</div>
							</form>
						</div>
						<div class="col col-xs-12 col-sm-12 col-md-6 col-lg-5 hide-img">
							<img id="bouncing2" src="{{asset('images/kakakasuh2.png')}}">
						</div>
					</div>
				</div>
				{{-- row 5 end --}}
				{{-- footer start --}}
				<footer class="row kka-footer">
					<div class="footer-row footer-row-sm">
						<div class="col col-xs-12 col-lg-3 col-sm-6 footer-col">
							<div class="icon-top">
								<i class="fa fa-envelope"></i>
							</div>
							<p>
								info@pondokit.com
							</p>						
						</div>
						<div class="col col-xs-12 col-lg-3 col-sm-6 footer-col">
							<div class="icon-top">
								<i class="fa fa-phone"></i>
							</div>
							<p>
								085228802828 (informasi)
							</p>						
						</div>
						<div class="col col-xs-12 col-lg-3 col-sm-6 footer-col">
							<div class="icon-top">
								<i class="fa fa-map-marker"></i>
							</div>
							<p>
								Glagah Lor RT.02 No.64
								<br>
								Desa Tamanan
								<br>
								 Kec. Banguntapan, Kab. Bantul
								<br>
								Daerah Istimewa Yogyakarta 
							</p>						
						</div>
						<div class="col col-xs-12 col-lg-3 col-sm-6 footer-col footer-sosmed">
							<div class="icon-top">
								<a href="https://www.facebook.com/pondokitcom/?ref=br_rs" target="_blank">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="" target="_blank">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="" target="_blank">
									<i class="fa fa-google-plus"></i>
								</a>
								<a href="https://www.youtube.com/watch?v=maw1XuVX72Y" target="_blank">
									<i class="fa fa-youtube"></i>
								</a>
								<a href="https://www.instagram.com/pondokit/" target="_blank">
									<i class="fa fa-instagram"></i>
								</a>
							</div>
							<p>
								© <a href="http://pondokit.com" target="_blank">pondokit.com</a>
							</p>	
							<br><br><br><br>					
						</div>
					</div>
				</footer>
				{{-- footer end --}}
			</div>
	</div>
	
	<script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('dashboard/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('dashboard/vendor/raphael/raphael.min.js')}}"></script>
    {{-- <script src="{{asset('dashboard/vendor/morrisjs/morris.min.js')}}"></script> --}}
    {{-- <script src="{{asset('dashboard/data/morris-data.js')}}"></script> --}}

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('dashboard/dist/js/sb-admin-2.js')}}"></script>

    {{-- reportPondokit --}}
    <script src="{{asset('js/reportPondokit.js')}}"></script>
    {{-- <script src="{{asset('js/profile.js')}}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

     <!-- Placed at the end of the document so the pages load faster -->
    {{-- <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script> --}}

    {{-- dataTables --}}
    <script src="{{ asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/datatables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    {{-- CKEditor --}}
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script type="text/javascript">
        $('.wysiwyg').ckeditor();
    </script>
    {{-- Kakak Asuh --}}
	<script src="{{asset('js/kakakAsuh/kakakAsuh.js')}}"></script>

    @yield('js')
</body>
</html>