<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Pendaftaran Pondok IT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Registration / Login form Responsive Widget, Login forms,Flat Pricing tables,Flat Drop downs  Sign up Web forms, Login sign up Responsive web Forms," />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom CSS -->
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

</script>
{{-- Ridwan --}}
		<script src="{{asset('js/reportPondokit.js')}}"></script>
<!-- font CSS --><!--
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">-->

<!-- <link href="https://fonts.googleapis.com/css?family=Signika:300,400,700" rel="stylesheet"> -->
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet"> -->
<style>
	.syarat {
		color: white;
		font-size: 15px;
	}

	.formleft {
		width: 45%;
		float: left;
	}
	.formright {
		width: 45%;
		float: right;
		padding-right: 15px;
	}
	.alert{
		text-align: center;
		font-size: 30px;
		color: #FBB116;
		margin-top: 20px;
		margin-bottom: 20px;
	}
</style>
<!--font CSS-->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body class="dashboard-page">
		<div class="main-grid">
			<div class="agile-grids">
				<!-- validation -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Pendaftaran Pondok IT</h2>

						@if (session('success'))
							<b>
								<p class="alert">
							      {{session('success')}}
							    </p>
								</b>
							@endif

					</div>
					<div class="forms-grids">
						<div class="forms3">
						<div class="w3agile-validation w3ls-validation">


							<div class="panel panel-widget agile-validation">
								<div class="validation-grids validation-grids-right login-form">
									<div class="widget-shadow login-form-shadow" data-example-id="basic-forms">
										<div class="input-info">
											<h3>Persyaratan :</h3>
										</div>
										<div class="form-body form-body-info">
											<p class="syarat"> > Laki-Laki Muslim</p>
											<p class="syarat"> > Belum Menikah</p>
											<p class="syarat"> > Lulusan SMK/SMA Sederajat</p>
											<p class="syarat">&nbsp;&nbsp;&nbsp;&nbsp;(Tidak Sedang Berkuliah/Bekerja)</p>
											<p class="syarat"> > Usia Maksimal 23 Tahun</p>
											<p class="syarat"> > Punya Passion di bidang IT</p>
											<p class="syarat"> > Mendapatkan Izin Orang Tua</p>
											<p class="syarat"> > Siap Belajar dan Berkarya selama 3 Tahun</p>
											<p class="syarat"> > Memiliki Laptop, Bila Tidak ada dapat Meminjam Terlebih Dahulu</p>
											<br><br>
											<p class="syarat"> *Jika dirasa sudah memenuhi persyaratan, anda dapat memulai mengisi form dibawah dan menekan tombol daftar jika telah selesai mengisi </p><br><br>
											<p class="syarat"> * Data pendaftaran anda pun akan di proses oleh tim kami. </p>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-widget agile-validation register-form">
								<div class="validation-grids widget-shadow" data-example-id="basic-forms">
									<div class="input-info">
										<h3>Form Registrasi :</h3>
									</div>
									<div class="form-body form-body-info">
										<form  action="{{ route('pendaftaran.store') }}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
											<div class="form-group valid-form has-feedback{{$errors->has('divisi') ? ' has-error' : ''}}">
												<label class="syarat" for="divisi">Jurusan Yang Dituju</label>
												<select class="form-control" name="divisi" id="divisi" >

													<option  style="background-color:black;" value="">--Pilih--</option>
													<option
													@if (old('divisi') == 'Programmer')
														selected
													@endif
													style="background-color:black;" value="Programmer">Pondok Programmer</option>
													<option
													@if (old('divisi') == 'Multimedia')
														selected
													@endif
													style="background-color:black;" value="Multimedia">Pondok Multimedia</option>
													<option
													@if (old('divisi') == 'IMERS')
														selected
													@endif
													style="background-color:black;" value="IMERS">Pondok IMERS</option>
													<option
													@if (old('divisi') == 'CYBER')
														selected
													@endif
													style="background-color:black;" value="CYBER">Pondok CYBER</option>
												</select>
                        @if ($errors->has('divisi'))
                          <span class="help-block">
                            <p>{{$errors->first('divisi')}}</p>
                          </span>
                        @endif
											</div> <br>

											<div class="form-group valid-form has-feedback{{$errors->has('nama') ? ' has-error' : ''}}">
												<label class="syarat" for="nama">Nama</label>
												<input required value="{{ old('nama') }}" type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" >
                        @if ($errors->has('nama'))
                          <span class="help-block">
                            <p>{{$errors->first('nama')}}</p>
                          </span>
                        @endif
											</div> <br>
											<div class="form-group has-feedback{{$errors->has('tempat_lahir') ? ' has-error' : ''}}">
												<label class="syarat" for="tempat_lahir">Tempat Lahir</label>
												<input required value="{{ old('tempat_lahir') }}" type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" >
                        @if ($errors->has('tempat_lahir'))
                          <span class="help-block">
                            <p>{{$errors->first('tempat_lahir')}}</p>
                          </span>
                        @endif
											</div>
												<div class="form-group has-feedback{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
												<label class="syarat" for="tanggal_lahir">Tanggal Lahir</label>
												<input required value="{{ old('tanggal_lahir') }}" id="datepicker" type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="dd/mm/yyyy" >
                        @if ($errors->has('tanggal_lahir'))
                          <span class="help-block">
                            <p>{{$errors->first('tanggal_lahir')}}</p>
                          </span>
                        @endif
											</div><br>

											 <div class="form-group has-feedback{{$errors->has('rumah') ? ' has-error' : ''}}">
												<label class="syarat" for="rumah">Alamat Rumah</label>
												<input required value="{{ old('rumah') }}" type="text" id="rumah" class="form-control" name="rumah" placeholder=" Ex : Jl, Wijoyo Mulyo No.64 Rt/Rw 02/06 Banguntapan..." >
                        @if ($errors->has('rumah'))
                          <span class="help-block">
                            <p>{{$errors->first('rumah')}}</p>
                          </span>
                        @endif
											</div><br>

												<div class="form-group has-feedback{{$errors->has('kota') ? ' has-error' : ''}}">
												<label class="syarat" for="kota">Kota</label>
												<input required value="{{ old('kota') }}" type="text" class="form-control" id="kota" name="kota" >
                        @if ($errors->has('kota'))
                          <span class="help-block">
                            <p>{{$errors->first('kota')}}</p>
                          </span>
                        @endif
											</div><br>

											<div class="form-group has-feedback{{$errors->has('hobi') ? ' has-error' : ''}}">
												<label class="syarat" for="hobi">Hobi</label>
												<input required value="{{ old('hobi') }}" type="text" id="hobi" class="form-control" name="hobi" >
                        @if ($errors->has('hobi'))
                          <span class="help-block">
                            <p>{{$errors->first('hobi')}}</p>
                          </span>
                        @endif
											</div><br>

												<div class="form-group has-feedback{{$errors->has('cita') ? ' has-error' : ''}}">
												<label class="syarat" for="cita">Cita - Cita</label>
												<input required value="{{ old('cita') }}" type="text" class="form-control" id="cita" name="cita" >
                        @if ($errors->has('cita'))
                          <span class="help-block">
                            <p>{{$errors->first('cita')}}</p>
                          </span>
                        @endif
											</div><br>

											<div class="form-group has-feedback{{$errors->has('email') ? ' has-error' : ''}}">
												<label class="syarat" for="email">Email</label>
												<input required value="{{ old('email') }}" type="email" id="email" class="form-control" name="email" placeholder="example@mail.com" >
                        @if ($errors->has('email'))
                          <span class="help-block">
                            <p>{{$errors->first('email')}}</p>
                          </span>
                        @endif
											</div><br>

												<div class="form-group has-feedback{{$errors->has('facebook') ? ' has-error' : ''}}">
												<label class="syarat" for="facebook">Nama Akun Facebook</label>
												<input required value="{{ old('facebook') }}" type="text" class="form-control" id="facebook" name="facebook" >
                        @if ($errors->has('facebook'))
                          <span class="help-block">
                            <p>{{$errors->first('facebook')}}</p>
                          </span>
                        @endif
											</div> <br>

											<div class="form-group has-feedback{{$errors->has('hp') ? ' has-error' : ''}}">
												<label class="syarat" for="hp">Nomor HP</label>
												<input required value="{{ old('hp') }}" type="number" id="hp" class="form-control" name="hp" placeholder="08xxxxxxxxxx" >
                        @if ($errors->has('hp'))
                          <span class="help-block">
                            <p>{{$errors->first('hp')}}</p>
                          </span>
                        @endif
											</div><br>

												<div class="form-group has-feedback{{$errors->has('wa') ? ' has-error' : ''}}">
												<label class="syarat" for="wa">Nomor WA</label>
												<input required value="{{ old('wa') }}" type="number" class="form-control" id="wa" name="wa" placeholder="08xxxxxxxxxx" >
                        @if ($errors->has('wa'))
                          <span class="help-block">
                            <p>{{$errors->first('wa')}}</p>
                          </span>
                        @endif
											</div><br>

											<div class="form-group has-feedback{{$errors->has('lulusan') ? ' has-error' : ''}}">
												<label class="syarat" for="lulusan">Lulusan</label>
												<input required value="{{ old('lulusan') }}" type="text" id="lulusan" class="form-control" name="lulusan" placeholder="SMA,SMP,SD,etc..." >
                        @if ($errors->has('lulusan'))
                          <span class="help-block">
                            <p>{{$errors->first('lulusan')}}</p>
                          </span>
                        @endif
											</div><br>

												<div class="form-group has-feedback{{$errors->has('sekolah') ? ' has-error' : ''}}">
												<label class="syarat" for="sekolah">Asal Sekolah</label>
												<input required value="{{ old('sekolah') }}" type="text" class="form-control" id="sekolah" name="sekolah" >
                        @if ($errors->has('sekolah'))
                          <span class="help-block">
                            <p>{{$errors->first('sekolah')}}</p>
                          </span>
                        @endif
											</div><br>

											<div class="form-group has-feedback{{$errors->has('jurusan') ? ' has-error' : ''}}">
											<label class="syarat" for="jurusan">Jurusan  di Sekolah</label>
											<input required value="{{ old('jurusan') }}" type="text" class="form-control" id="jurusan" name="jurusan" >
                      @if ($errors->has('jurusan'))
                        <span class="help-block">
                          <p>{{$errors->first('jurusan')}}</p>
                        </span>
                      @endif
										</div><br>

										<div class="form-group has-feedback{{$errors->has('jml_ortu') ? ' has-error' : ''}}">
										<label class="syarat" for="jml_ortu">jumlah Ortu</label>
										<select class="form-control" name="jml_ortu" id="jml_ortu" >
											<option style="background-color:black;" value="">Jumlah Ortu</option>
											<option
											@if (old('jml_ortu') == 'lengkap')
												selected
											@endif
											 style="background-color:black;" value="lengkap">Lengkap</option>
											<option
											@if (old('jml_ortu') == 'yatim')
												selected
											@endif
											 style="background-color:black;" value="yatim">Yatim</option>
											<option
											@if (old('jml_ortu') == 'piatu')
												selected
											@endif
											 style="background-color:black;" value="piatu">Piatu</option>
											<option
											@if (old('jml_ortu') == 'yatim_piatu')
												selected
											@endif
											 style="background-color:black;" value="yatim_piatu">Yatim Piatu</option>
											<option
											@if (old('jml_ortu') == 'cerai_hidup')
												selected
											@endif
											 style="background-color:black;" value="cerai_hidup">Cerai Hidup</option>
										</select>
                    @if ($errors->has('jml_ortu'))
                      <span class="help-block">
                        <p>{{$errors->first('jml_ortu')}}</p>
                      </span>
                    @endif
									</div><br>

									<div class="form-group has-feedback{{$errors->has('hp_ortu') ? ' has-error' : ''}}">
									<label class="syarat" for="nohportu">Nomor HP Ortu</label>
									<input required value="{{ old('hp_ortu') }}" type="number" class="form-control" id="nohportu" name="hp_ortu" >
                  @if ($errors->has('hp_ortu'))
                    <span class="help-block">
                      <p>{{$errors->first('hp_ortu')}}</p>
                    </span>
                  @endif
                </div><br>

									<div class="form-group has-feedback{{$errors->has('rizki') ? ' has-error' : ''}}">
									<label class="syarat" for="rizki">Apakah Orang Tuamu Mau Berinfak Kalau Ada Rizki</label>
									<input required value="{{ old('rizki') }}" type="text" class="form-control" id="rizki" name="rizki" >
                  @if ($errors->has('rizki'))
                    <span class="help-block">
                      <p>{{$errors->first('rizki')}}</p>
                    </span>
                  @endif
                </div><br>

									<div class="form-group has-feedback{{$errors->has('tau') ? ' has-error' : ''}}">
									<label class="syarat" for="tau">Apakah Orang Tuamu Tau Tentang Pondok IT</label>
									<input required value="{{ old('tau') }}" type="text" class="form-control" id="tau" name="tau" >
                  @if ($errors->has('tau'))
                    <span class="help-block">
                      <p>{{$errors->first('tau')}}</p>
                    </span>
                  @endif
                </div><br>

									<div class="form-group has-feedback{{$errors->has('nama_ayah') ? ' has-error' : ''}}">
										<label class="syarat" for="nama_ayah">Nama Ayah</label>
										<input required value="{{ old('nama_ayah') }}" type="text" id="nama_ayah" class="form-control" name="nama_ayah" >
                    @if ($errors->has('nama_ayah'))
                      <span class="help-block">
                        <p>{{$errors->first('nama_ayah')}}</p>
                      </span>
                    @endif
									</div><br>

										<div class="form-group has-feedback{{$errors->has('nama_ibu') ? ' has-error' : ''}}">
										<label class="syarat" for="nama_ibu">Nama Ibu</label>
										<input required value="{{ old('nama_ibu') }}" type="text" class="form-control" id="nama_ibu" name="nama_ibu" >
                    @if ($errors->has('nama_ibu'))
                      <span class="help-block">
                        <p>{{$errors->first('nama_ibu')}}</p>
                      </span>
                    @endif
									</div><br>

									<div class="form-group has-feedback{{$errors->has('p_ayah') ? ' has-error' : ''}}">
										<label class="syarat" for="p_ayah">Pekerjaan Ayah</label>
										<input required value="{{ old('p_ayah') }}" type="text" id="p_ayah" class="form-control" name="p_ayah" >
                    @if ($errors->has('p_ayah'))
                      <span class="help-block">
                        <p>{{$errors->first('p_ayah')}}</p>
                      </span>
                    @endif
									</div><br>


										<div class="form-group has-feedback{{$errors->has('p_ibu') ? ' has-error' : ''}}">
										<label class="syarat" for="p_ibu">Pekerjaan Ibu</label>
										<input required value="{{ old('p_ibu') }}" type="text" class="form-control" id="p_ibu" name="p_ibu" >
                    @if ($errors->has('p_ibu'))
                      <span class="help-block">
                        <p>{{$errors->first('p_ibu')}}</p>
                      </span>
                    @endif
									</div><br>

									<div class="form-group has-feedback{{$errors->has('gaji') ? ' has-error' : ''}}">
										<label class="syarat" for="gaji">Gaji Ortu / Bulan</label>
										<input required value="{{ old('gaji') }}" type="number" id="gaji" class="form-control" name="gaji"  >
                    @if ($errors->has('gaji'))
                      <span class="help-block">
                        <p>{{$errors->first('gaji')}}</p>
                      </span>
                    @endif
									</div><br>

										<div class="form-group has-feedback{{$errors->has('j_saudara') ? ' has-error' : ''}}">
										<label class="syarat" for="j_saudara">Jumlah Saudara</label>
										<input required value="{{ old('j_saudara') }}" type="number" class="form-control" id="j_saudara" name="j_saudara" >
                    @if ($errors->has('j_saudara'))
                      <span class="help-block">
                        <p>{{$errors->first('j_saudara')}}</p>
                      </span>
                    @endif
									</div><br>

									<div class="form-group has-feedback{{$errors->has('izin') ? ' has-error' : ''}}">
										<label class="syarat" for="izin">Izin Dari Ortu / Wali</label>
										<select class="form-control" name="izin" id="izin" >
											<option style="background-color:black;" value="">--Pilih--</option>
											<option
											@if (old('izin') == 'sudah')
												selected
											@endif
											 style="background-color:black;" value="sudah">Sudah</option>
											<option
											@if (old('izin') == 'belum')
												selected
											@endif
											 style="background-color:black;" value="belum">Belum</option>
										</select>
                    @if ($errors->has('izin'))
                      <span class="help-block">
                        <p>{{$errors->first('izin')}}</p>
                      </span>
                    @endif
									</div><br>

										<div class="form-group has-feedback{{$errors->has('laptop') ? ' has-error' : ''}}">
										<label class="syarat" for="laptop">Punya Laptop / Tidak</label>
										<select class="form-control" name="laptop" id="laptop" >
											<option style="background-color:black;" value="">--Pilih--</option>
											<option
											@if (old('laptop') == 'sudah')
												selected
											@endif
											 style="background-color:black;" value="sudah">Sudah</option>
											<option
											@if (old('laptop') == 'belum')
												selected
											@endif
											 style="background-color:black;" value="belum">Belum</option>
										</select>
                    @if ($errors->has('laptop'))
                      <span class="help-block">
                        <p>{{$errors->first('laptop')}}</p>
                      </span>
                    @endif
									</div><br>

									<div class="form-group has-feedback{{$errors->has('iq') ? ' has-error' : ''}}">
										<label class="syarat" for="iq">Tes IQ <a href="http://a.iqelite.com/iq/info/">Test Disini</a></label>
										<input required value="{{ old('iq') }}" type="number" id="iq" class="form-control" name="iq" >
                    @if ($errors->has('iq'))
                      <span class="help-block">
                        <p>{{$errors->first('iq')}}</p>
                      </span>
                    @endif
									</div><br>

										<div class="form-group has-feedback{{$errors->has('hafalan') ? ' has-error' : ''}}">
										<label class="syarat" for="hafalan">Hafalan Al-Qur`an</label>
										<input required value="{{ old('hafalan') }}" type="text" class="form-control" id="hafalan" name="hafalan" >
                    @if ($errors->has('hafalan'))
                      <span class="help-block">
                        <p>{{$errors->first('hafalan')}}</p>
                      </span>
                    @endif
									</div><br>

									<div class="form-group has-feedback{{$errors->has('skill') ? ' has-error' : ''}}">
									<label class="syarat" for="skill">Jelaskan Tentang Skill IT Yang Sudah Dimiliki</label>
									<textarea required style="height: 100px;" name="skill" id="skill" class="form-control" rows="8" cols="70" >{{ old('skill') }}</textarea>
                  @if ($errors->has('skill'))
                    <span class="help-block">
                      <p>{{$errors->first('skill')}}</p>
                    </span>
                  @endif
								</div><br>
								<div class="form-group has-feedback{{$errors->has('kelebihanmu') ? ' has-error' : ''}}">
								<label class="syarat" for="kelebihanmu">Sebutkan Minimal 5 Kelebihan Diri Anda (karakter)</label>
								<textarea required style="height: 100px;" name="kelebihanmu" id="kelebihanmu" class="form-control" rows="8" cols="70" >{{ old('kelebihanmu') }}</textarea>
                @if ($errors->has('kelebihanmu'))
                  <span class="help-block">
                    <p>{{$errors->first('kelebihanmu')}}</p>
                  </span>
                @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('kekuranganmu') ? ' has-error' : ''}}">
							<label class="syarat" for="kekuranganmu">Sebutkan Minimal 5 Keburukan Diri Anda (karakter)</label>
							<textarea required style="height: 100px;" name="kekuranganmu" id="kekuranganmu" class="form-control" rows="8" cols="70" >{{ old('kekuranganmu') }}</textarea>
              @if ($errors->has('kekuranganmu'))
                <span class="help-block">
                  <p>{{$errors->first('kekuranganmu')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('idola') ? ' has-error' : ''}}">
							<label class="syarat" for="idola">Tokoh Idola</label>
							<input required value="{{ old('idola') }}" type="text" id="idola" class="form-control" name="idola" >
              @if ($errors->has('idola'))
                <span class="help-block">
                  <p>{{$errors->first('idola')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('buku') ? ' has-error' : ''}}">
							<label class="syarat" for="buku">Buku Favorit</label>
							<input required value="{{ old('buku') }}" type="text" class="form-control" id="buku" name="buku" >
              @if ($errors->has('buku'))
                <span class="help-block">
                  <p>{{$errors->first('buku')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('ustad') ? ' has-error' : ''}}">
							<label class="syarat" for="ustad">Ustad Idola</label>
							<input required value="{{ old('ustad') }}" type="text" id="ustad" class="form-control" name="ustad" >
              @if ($errors->has('ustad'))
                <span class="help-block">
                  <p>{{$errors->first('ustad')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('tanggungan') ? ' has-error' : ''}}">
							<label class="syarat" for="tanggungan">Tanggungan Keluarga</label>
							<input required value="{{ old('tanggungan') }}" type="text" id="tanggungan" class="form-control" name="tanggungan" >
              @if ($errors->has('tanggungan'))
                <span class="help-block">
                  <p>{{$errors->first('tanggungan')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('rokok') ? ' has-error' : ''}}">
							<label class="syarat" for="rokok">Perokok / Tidak</label>
							<input required value="{{ old('rokok') }}" type="text" class="form-control" id="rokok" name="rokok" >
              @if ($errors->has('rokok'))
                <span class="help-block">
                  <p>{{$errors->first('rokok')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('pacar') ? ' has-error' : ''}}">
							<label class="syarat" for="pacar">Memiliki Pacar / Tidak</label>
							<select class="form-control" name="pacar" id="pacar" >
								<option style="background-color:black;" value="">--Pilih--</option>
								<option
								@if (old('pacar') == 'iya')
									selected
								@endif
								 style="background-color:black;" value="iya">Iya</option>
								<option
								@if (old('pacar') == 'tidak')
									selected
								@endif
								 style="background-color:black;" value="tidak">Tidak</option>
							</select>
              @if ($errors->has('pacar'))
                <span class="help-block">
                  <p>{{$errors->first('pacar')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('kesehatan') ? ' has-error' : ''}}">
							<label class="syarat" for="kesehatan">Riwayat Kesehatan</label>
							<input required value="{{ old('kesehatan') }}" type="text" name="kesehatan" class="form-control" >
              @if ($errors->has('kesehatan'))
                <span class="help-block">
                  <p>{{$errors->first('kesehatan')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('ada_tanggungan') ? ' has-error' : ''}}">
							<label class="syarat" for="ada_tanggungan">Tanggungan Pribadi</label>
							<select class="form-control" name="ada_tanggungan" id="ada_tanggungan" >
								<option style="background-color:black;" value="">--Pilih--</option>
								<option
								@if (old('ada_tanggungan') == 'iya')
									selected
								@endif
								 style="background-color:black;" value="iya">Siap</option>
								<option
								@if (old('ada_tanggungan') == 'tidak')
									selected
								@endif
								 style="background-color:black;" value="tidak">Tidak Siap</option>
							</select>
              @if ($errors->has('ada_tanggungan'))
                <span class="help-block">
                  <p>{{$errors->first('ada_tanggungan')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('karya') ? ' has-error' : ''}}">
							<label class="syarat" for="karya">Siap Untuk Berkarya</label>
							<select class="form-control" name="karya" id="karya" >
								<option style="background-color:black;" value="">--Pilih--</option>
								<option
								@if (old('karya') == 'iya')
									selected
								@endif
									style="background-color:black;" value="iya">Siap</option>
								<option
								@if (old('karya') == 'tidak')
									selected
								@endif
									style="background-color:black;" value="tidak">Tidak Siap</option>
							</select>
              @if ($errors->has('karya'))
                <span class="help-block">
                  <p>{{$errors->first('karya')}}</p>
                </span>
              @endif
            </div><br>

							<div class="form-group has-feedback{{$errors->has('pernah') ? ' has-error' : ''}}">
							<label  class="syarat" for="pernah">Pernah Belajar Dalam Bidang Yang Dituju?</label>
							<select class="form-control" name="pernah" id="pernah" >
							<option style="background-color:black;" value="">--Pilih--</option>
							<option
							@if (old('pernah') == 'iya')
								selected
							@endif
							 style="background-color:black;" value="iya">Pernah</option>
							<option
							@if (old('pernah') == 'tidak')
								selected
							@endif
							 style="background-color:black;" value="tidak">Tidak Pernah</option>
							</select>
              @if ($errors->has('pernah'))
                <span class="help-block">
                  <p>{{$errors->first('pernah')}}</p>
                </span>
              @endif
            </div><br>



							<div class="form-group has-feedback{{$errors->has('pemahaman') ? ' has-error' : ''}}">
							<label class="syarat" for="pemahaman">Pemahaman Agama</label>
							<input required value="{{ old('pemahaman') }}" type="text" class="form-control" id="pemahaman" name="pemahaman" >
              @if ($errors->has('pemahaman'))
                <span class="help-block">
                  <p>{{$errors->first('pemahaman')}}</p>
                </span>
              @endif
            </div><br>


							<div class="form-group has-feedback{{$errors->has('pernyataan') ? ' has-error' : ''}}">
							<label class="syarat" for="pernyataan">Amalan Yang Sering Dilakukan</label>
							<input required value="{{ old('pernyataan') }}" type="text" class="form-control" id="pernyataan" name="pernyataan" >
              @if ($errors->has('pernyataan'))
                <span class="help-block">
                  <p>{{$errors->first('pernyataan')}}</p>
                </span>
              @endif
            </div><br>


							<div class="form-group has-feedback{{$errors->has('limam') ? ' has-error' : ''}}">
							<label class="syarat" for="limam">Kami mau Tanya Kalau Alloh Menitipkan Uang Kepadamu Sebesar 5M Ke Kamu, Uangnya mau Kamu Buat Apa ? (Baik Urusan Dunia Maupun Urusan Akhirat) , alokasikan menjadi 5 bagian, dan tentukan berapa jumlah untuk setiap alokasi </label>
							<textarea required class="form-control" style="height: 100px;" name="limam" id="limam" rows="8" cols="70" >{{ old('limam') }}</textarea>
              @if ($errors->has('limam'))
                <span class="help-block">
                  <p>{{$errors->first('limam')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('kekurangan') ? ' has-error' : ''}}">
							<label class="syarat" for="kekurangan">Bagaimana Kamu Menyikapi Kekurangan Orang Lain? Karena Di Pondok Programmer Kamu Akan Menemui Banyak Karakter Orang </label>
							<textarea required class="form-control" style="height: 100px;" name="kekurangan" id="kekurangan" rows="8" cols="70" >{{ old('kekurangan') }}</textarea>
              @if ($errors->has('kekurangan'))
                <span class="help-block">
                  <p>{{$errors->first('kekurangan')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('marah') ? ' has-error' : ''}}">
							<label class="syarat" for="marah">Hal Yang Menyebabkan Anda Marah</label>
							<textarea required class="form-control" style="height: 100px;" name="marah" id="marah" rows="8" cols="70" >{{ old('marah') }}</textarea>
              @if ($errors->has('marah'))
                <span class="help-block">
                  <p>{{$errors->first('marah')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('bahagia') ? ' has-error' : ''}}">
							<label class="syarat" for="bahagia">Hal Yang Menyebabkan Anda Bahagia</label>
							<textarea required class="form-control" style="height: 100px;" name="bahagia" id="bahagia" rows="8" cols="70" >{{ old('bahagia') }}</textarea>
              @if ($errors->has('bahagia'))
                <span class="help-block">
                  <p>{{$errors->first('bahagia')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('alokasi') ? ' has-error' : ''}}">
							<label class="syarat" for="alokasi">Siap Alokasi Ke Pondok</label>
							<select class="form-control" name="alokasi" id="alokasi" >
							<option style="background-color:black;" value="">--Pilih--</option>
							<option
							@if (old('alokasi') == 'iya')
								selected
							@endif
							 style="background-color:black;" value="iya">Siap</option>
							<option
							@if (old('alokasi') == 'tidak')
								selected
							@endif
							 style="background-color:black;" value="tidak">Tidak Siap</option>
							</select>
              @if ($errors->has('alokasi'))
                <span class="help-block">
                  <p>{{$errors->first('alokasi')}}</p>
                </span>
              @endif
							</div>

							<div class="form-group has-feedback{{$errors->has('magang') ? ' has-error' : ''}}">
							<label class="syarat" for="magang">Siap Untuk Magang</label>
							<select class="form-control" name="magang" id="magang" >
							<option style="background-color:black;"  value="">--Pilih--</option>
							<option
							@if (old('magang') == 'iya')
								selected
							@endif
							 style="background-color:black;"  value="iya">Siap</option>
							<option
							@if (old('magang') == 'tidak')
								selected
							@endif
							 style="background-color:black;"  value="tidak">Tidak Siap</option>
						</select>
            @if ($errors->has('magang'))
              <span class="help-block">
                <p>{{$errors->first('magang')}}</p>
              </span>
            @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('berjuang') ? ' has-error' : ''}}">
							<label style="color:white;" for="berjuang">Siap Untuk Berjuang</label>
							<select class="form-control" name="berjuang" id="berjuang" >
							<option style="background-color:black;" value="">--Pilih--</option>
							<option
							@if (old('berjuang') == 'iya')
								selected
							@endif
							 style="background-color:black;" value="iya">Siap</option>
							<option
							@if (old('berjuang') == 'tidak')
								selected
							@endif
							style="background-color:black;" value="tidak">Tidak Siap</option>
							</select>
              @if ($errors->has('berjuang'))
                <span class="help-block">
                  <p>{{$errors->first('berjuang')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('cita_pondok') ? ' has-error' : ''}}">
							<label class="syarat" for="cita_pondok">Siap Untuk Berjuang Meneruskan Cita-Cita Pondok</label>
							<input required value="{{ old('cita_pondok') }}" class="form-control" name="cita_pondok" id="cita_pondok" ></input>
              @if ($errors->has('cita_pondok'))
                <span class="help-block">
                  <p>{{$errors->first('cita_pondok')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('berinfak') ? ' has-error' : ''}}">
							<label class="syarat" for="berinfak">Siap Untuk Berinfak Rutin Ketika Sudah Lulus</label>
							<input required value="{{ old('berinfak') }}" class="form-control" name="berinfak" id="berinfak" ></input>
              @if ($errors->has('berinfak'))
                <span class="help-block">
                  <p>{{$errors->first('berinfak')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('sudah_punya') ? ' has-error' : ''}}">
							<label class="syarat" for="sudah_punya">Siap Mengalokasikan Ke Pondok Ketika Sudah Mendapatkan Uang</label>
							<input required value="{{ old('sudah_punya') }}" class="form-control" name="sudah_punya" id="sudah_punya" ></input>
              @if ($errors->has('sudah_punya'))
                <span class="help-block">
                  <p>{{$errors->first('sudah_punya')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('peraturan') ? ' has-error' : ''}}">
							<label class="syarat" for="peraturan">Siap Untuk Mengikuti Aturan-Aturan Di pondok Baik yang Disukai Maupun yang Tidak Di Sukai </label>
							<textarea required class="form-control" style="height: 100px;" name="peraturan" id="peraturan" rows="8" cols="70" >{{ old('peraturan') }}</textarea>
              @if ($errors->has('peraturan'))
                <span class="help-block">
                  <p>{{$errors->first('peraturan')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('kekurangan_pondok') ? ' has-error' : ''}}">
							<label class="syarat" for="kekurangan_pondok">Siap Untuk Menerima Kekurangan Yang Ada Di Pondok  </label>
							<textarea required class="form-control" style="height: 100px;" name="kekurangan_pondok" id="kekurangan_pondok" rows="8" cols="70" >{{ old('kekurangan_pondok') }}</textarea>
              @if ($errors->has('kekurangan_pondok'))
                <span class="help-block">
                  <p>{{$errors->first('kekurangan_pondok')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('impian') ? ' has-error' : ''}}">
							<label class="syarat" for="impian">Sebutkan 10 Impian Terbesar Dalam Hidupmu </label>
							<textarea required class="form-control" style="height: 100px;" name="impian" id="impian" rows="8" cols="70" >{{ old('impian') }}</textarea>
              @if ($errors->has('impian'))
                <span class="help-block">
                  <p>{{$errors->first('impian')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('alasan') ? ' has-error' : ''}}">
							<label class="syarat" for="alasan"> 10 Alasan Masuk Pondok </label>
							<textarea required class="form-control" style=" height: 100px;" name="alasan" id="alasan" rows="8" cols="70" >{{ old('alasan') }}</textarea>
              @if ($errors->has('alasan'))
                <span class="help-block">
                  <p>{{$errors->first('alasan')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('kamu_tau') ? ' has-error' : ''}}">
							<label class="syarat" for="kamu_tau"> Dari Mana Kamu Tau Pondok IT</label>
							<input required value="{{ old('kamu_tau') }}" class="form-control" name="kamu_tau" id="kamu_tau" ></input>
              @if ($errors->has('kamu_tau'))
                <span class="help-block">
                  <p>{{$errors->first('kamu_tau')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('jalani_kehidupan') ? ' has-error' : ''}}">
							<label class="syarat" for="jalani_kehidupan"> Sebutkan Hal-Hal Yang membuat Kamu Semangat Dalam Menjalani Kehidupan</label>
							<textarea required style=" height: 100px;" class="form-control" name="jalani_kehidupan" id="jalani_kehidupan" >{{ old('jalani_kehidupan') }}</textarea>
              @if ($errors->has('jalani_kehidupan'))
                <span class="help-block">
                  <p>{{$errors->first('jalani_kehidupan')}}</p>
                </span>
              @endif
							</div><br>



							<div class="form-group has-feedback{{$errors->has('ktp') ? ' has-error' : ''}}">
							<label class="syarat" for="ktp">Nomor Identitas (NIK/No KTP/No SIM) </label>
							<input required value="{{ old('ktp') }}" type="number" class="form-control" id="ktp" name="ktp" >
              @if ($errors->has('ktp'))
                <span class="help-block">
                  <p>{{$errors->first('ktp')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('disc') ? ' has-error' : ''}}">
							<label class="syarat" for="disc">download file <a style="color:#F8D27F;" href="{{asset('doc/DISC.xlsx')}}">ini </a>, lalu isi dengan seksama, kemudian setelah di isi upload kembali di bawah ini</label>
							<input required value="{{ old('disc') }}" type="file" name="disc" id="disc"  class="form-control">
              @if ($errors->has('disc'))
                <span class="help-block">
                  <p>{{$errors->first('disc')}}</p>
                </span>
              @endif
							</div><br>

							<div class="form-group has-feedback{{$errors->has('foto') ? ' has-error' : ''}}">
							<label class="syarat" for="foto">Upload Foto Kamu </label>
							<input required value="{{ old('foto') }}" type="file" name="foto" id="foto"  class="form-control">
              @if ($errors->has('foto'))
                <span class="help-block">
                  <p>{{$errors->first('foto')}}</p>
                </span>
              @endif
							</div><br>

							<p class="syarat">*pastikan diisi dengan benar, karena anda hanya dapat mendaftar sebanyak 1 kali</p>







											<div class="form-group">
												<button name="submit" value="submit" id="submit" type="submit" class="btn btn-primary">Daftar</button>
											</div>
										</form>
									</div>
								</div>
							</div>



						</div>
						<div class="clear"> </div>
						</div>
					</div>
				</div>
				<!-- //validation -->
			</div>
		</div>
		<!-- footer -->
		<div class="footer">
			<!-- <p>© 2016 Registration / Login form . All Rights Reserved . Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p> -->
		</div>
		<!-- //footer -->
		<!-- input-forms -->


		<script type="text/javascript" src="js/valida.2.1.6.min.js"></script>
		<script type="text/javascript" >

			$(document).ready(function() {

				// show Valida's version.
				$('#version').valida( 'version' );

				// Exemple 1
				$('.valida').valida();

				// Exemple 2
				/*
				$('.valida').valida({

					// basic settings
					validate: 'novalidate',
					autocomplete: 'off',
					tag: 'p',

					// default messages
					messages: {
						submit: 'Wait ...',
						: 'Este campo é obrigatório',
						invalid: 'Field with invalid data',
						textarea_help: 'Digitados <span class="at-counter">{0}</span> de {1}'
					},

					// filters & callbacks
					use_filter: true,

					// a callback function that will be called right before valida runs.
					// it must return a boolan value (true for good results and false for errors)
					before_validate: null,

					// a callback function that will be called right after valida runs.
					// it must return a boolan value (true for good results and false for errors)
					after_validate: null

				});
				*/

        // setup the partial validation
				$('#partial-1').on('click', function( ev ) {
					ev.preventDefault();
					$('#res-1').click(); // clear form error msgs
					$('form').valida('partial', '#field-1'); // validate only field-1
					$('form').valida('partial', '#field-1-3'); // validate only field-1-3
				});

			});

		</script>
		<!-- //input-forms -->
		<!--validator js-->
		<script src="js/validator.min.js"></script>
		<!--//validator js-->
		

</body>
</html>
