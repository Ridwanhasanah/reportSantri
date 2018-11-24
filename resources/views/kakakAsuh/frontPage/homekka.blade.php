<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('Logo IT ICON.png') }}" >
  <link href="https://fonts.googleapis.com/css?family=Faster+One|Fredericka+the+Great|Fugaz+One" rel="stylesheet">
  <title>Kakak Asuh Indonesia</title>
   {{-- Date Picker --}}
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  {{-- SweetAlert2 --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('assets/MDB/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('assets/MDB/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('assets/MDB/css/style.css')}}" rel="stylesheet">
</head>

<body style="overflow-x:hidden">
  <!-- Nav Bar Menu -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color lighten-3 menu wow rotateInUpRight slower" data-wow-delay="1s">
    <a class="navbar-brand" href="#">
      <img src="{{asset('images/pondokit.png')}}" height="30" alt="mdb logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
      aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto"">
        <li class=" nav-item active">
        <a class="nav-link waves-effect waves-light text-black" target="_blank" href="{{route('login')}}">
          <i class="fa fa-sign-in"></i>
          LOGIN
          <span>Relawan / Donatur</span>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" target="_blank" href="https://pondokit.com">
            <i class="fa fa-home"></i>
            <span>pondokit.com</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mtop mb-5 wow rotateInUpLeft slower" data-wow-delay="0.5s">
    <div class="row kka1">
      <div class="ol-md-6 col-lg-6 p-3">
        <div class="font-1">
        <h1>
          Ayo jadi kakak asuh di Pondok IT,
          Pondok IT Membuka program membantu adik asuh (santri Pondok IT) yang tidak mampu atau belum mandiri
        </h1>
        <h3>
          Kategori: Program Pendidikan
        </h3>
        </div>
        <a href="#register" class="btn btn-lg btn-danger">Daftar <i class="fa fa-sign-in"></i></a>
      </div>
      <div class="col-md-6 col-lg-6 text-center spaceball">
        <img class=" ball" src="{{asset('images/kakakasuh1.png')}}">
      </div>
    </div>
  </div>

  <div class="container-fluid shadow-kka mt-5">
    <h1 class="text-center p-3">Mengapa program kakak asuh?</h1>
    <div class="row justify-content-center text-center p-3">
      <div class=" col-md-3 col-lg-3 aniwhite wow slideInUp slower" data-wow-delay="0.3s">
        <span class="fa fa-pencil-square text-lg p-2 text-primary"></span>
        <h3>Biaya Pendidikan</h3>
        <p>Setiap kakak asuh di perkenankan untuk menanggung biaya pendidikan adik asuhnya sesuai jumlah adik asuh
          dan paket yang di ambil (sesuai pilihan dan kemampuan kakak asuh).</p>
      </div>
      <div class=" col-md-3 col-lg-3 aniwhite wow slideInRight slower" data-wow-delay="0.3s">
        <span class="fa fa-group text-lg p-2 text-primary"></span>
        <h3>Mendapat Data Diri</h3>
        <p>Setiap kakak asuh akan mendapatkan data adik asuh yang menjadi tanggungannya</p>
      </div>
      <div class=" col-md-3 col-lg-3 aniwhite wow slideInLeft slower" data-wow-delay="0.3s">
        <span class="fa fa-bar-chart-o text-lg p-2 text-primary"></span>
        <h3>Laporan Perkembangan</h3>
        <p>Kakak asuh akan menerima laporan perbulan perkembangan adik asuhnya.</p>
      </div>
      <div class=" col-md-3 col-lg-3 aniwhite wow slideInUp slower" data-wow-delay="0.3s">
        <span class="fa fa-smile-o text-lg p-2 text-primary"></span>
        <h3>Silaturrahmi</h3>
        <p>Kakak asuh mendapatkan program silaturrahmi antara kakak asuh dengan adik yang ditanggung biaya
          pendidikannya.</p>
      </div>
    </div>
  </div>

  <div class="container-fluid shadow-kka mt-5 primary-color py-5 text-white wow slideInRight slower" data-wow-delay="1s">
    <h1 class="text-center p-3"> <i class="fa fa-money"></i> Jenis Pilihan Paket Adik Asuh <i class="fa fa-money"></i></h1>
    <div class="row justify-content-center text-center">
      <div class="col-lg-4 ani-no-bgc p-2">
        <h3>Paket A</h3>
        <h1>Rp 108.000</h1>
        <p>per Bulan dan per Santri</p>
      </div>
      <div class="col-lg-4 ani-no-bgc p-2">
        <h3>Paket B</h3>
        <h1>Rp 180.000</h1>
        <p>per Bulan dan per Santri</p>
      </div>
      <div class="col-lg-4 ani-no-bgc p-2">
        <h3>Paket C</h3>
        <h1>Rp 288.000</h1>
        <p>per Bulan dan per Santri</p>
      </div>
    </div>
  </div>
  <div class="container mt-5 text-center ">
    <h1 class="text-center p-3 wow slideInUp slower" data-wow-delay="0.3s">Cara Menjadi Kakak Asuh</h1>
    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-3 p-2 aniwhite wow bounceInRight slower" data-wow-delay="0.3s">
        <div class="shadow-kka p-3">
          <img class="mb-5" src="{{asset('images/number-1.png')}}">
          <h3>Isi Form</h3>
          <p>Sertakan nama, email, nomor HP, alamat.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 p-2 aniwhite wow bounceInLeft slower" data-wow-delay="0.3s">
        <div class="shadow-kka p-3">
          <img class="mb-5" src="{{asset('images/number-2.png')}}">
          <h3>Pilih Beasiswa</h3>
          <p>Tentukan jenis beasiswa yang ingin di ambil.</p>
        </div>
      </div>
      <!-- <div class="col-lg-3 col-md-3 p-2 aniwhite">
          <div class="shadow-kka p-3">
          <img class="mb-5" src="asset('images/number-3.png')">
          <h3>Jumlah Anak</h3>
          <p>Tentukan jumlah anak yang ingin di asuh.</p>
          </div>
        </div> -->


      <div class="col-lg-3 col-md-3 p-2 aniwhite wow bounceInRight slower" data-wow-delay="0.3s">
        <div class="shadow-kka p-3">
          <img class="mb-5" src="{{asset('images/number-3.png')}}">
          <h3>Transfer</h3>
          <p>Transfer dana untuk adik asuh yang sudah di pilih.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 p-2 aniwhite wow bounceInLeft slower" data-wow-delay="0.3s">
        <div class="shadow-kka p-3">
          <img class="mb-5" src="{{asset('images/number-4.png')}}">
          <h3>Invoice</h3>
          <p>Kakak asuh akan menerima invoice pembaran.</p>
        </div>
      </div>
    </div>
  </div>
@include('kakakAsuh.frontPage.success-modal')
  <div class="container-fluid shadow-kka mt-5 wow rotateInUpRight slower" data-wow-delay="0.5s" id="register">
    {{-- Loading --}}
    
    <div class="row pt-5 px-5 ">
        <div class="load offset-md-3 offset-lg-3 col-lg-6 col-md-6" id="loadingDiv"><img class="load-img" src="{{asset('images/loading.gif')}}" alt="loading pendaftaran"></div>
      <div id="form-1" class="col-lg-6 col-md-6">
        <h3><span class="fa fa-edit"></span> &nbsp; Form Keikutsertaan</h3>
        {{-- Error --}}
        <div class="alert alert-danger" style="display:none"></div>

        <form id="formData">
          {{csrf_field()}}
          {{ method_field('POST') }}

          <div class="form-group row p-0">
            <label class="col-lg-3"> <b> Nama* </b></label>
            <div class="col-lg-9">
              <input required value="{{ old('name') }}" name="name" id="name" class="form-control" type="text">
              <span class="text-danger p-1 hide" id="errorName"></span>
            </div>
          </div>
          <div class="form-group row has-feedback{{$errors->has('email') ? ' has-error' : ''}}">
            <label class="col-lg-3"> <b> Email* </b></label>
            <div class="col-lg-9">
              <input id="email" required name="email" value="{{ old('email') }}" class="form-control" type="email">
              <span class="text-danger p-1 hide " id="errorEmail"></span>
              @if ($errors->has('email'))
              <span class="text-danger p-1 hide">
                {{$errors->first('email')}}
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row mt-0 p-0">
            <label class="col-lg-3"> <b> Password* </b></label>
            <div class="col-lg-9">
              <input id="password" required name="password" class="form-control" type="password">
              <span class="text-danger p-1 hide " id="errorPassword"></span>
            </div>
          </div>
          <div class="form-group row mt-0 p-0">
            <label class="col-lg-3"> <b> Ulangi Password* </b></label>
            <div class="col-lg-9">
              <input id="repass" required name="repass" class="form-control" type="password">
              <span class="text-danger p-1 hide " id="errorRePassword"></span>
            </div>
          </div>
          <div class="form-group row has-feedback{{$errors->has('hp') ? ' has-error' : ''}}">
            <label class="col-lg-3"> <b> Nomor HP* </b></label>
            <div class="col-lg-9">
              <input id="hp" required name="hp" value="{{ old('hp') }}" class="form-control" type="number">
              <span class="text-danger p-1 hide " id="errorHp"></span>
              @if ($errors->has('hp'))
              <span class="2">
                {{$errors->first('hp')}}
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row mt-0 p-0">
            <label class="col-lg-3"> <b> Tanggal Lahir* </b></label>
            <div class="col-lg-9">
              <input style="background-color: #fff; cursor: pointer;" id="datepicker" placeholder="hari-bulan-tahun" readonly value="{{old('date_birth')}}" required name="date_birth" class="form-control">
              <span class="text-danger p-1 hide " id="errorDatebirth"></span>
            </div>
          </div>
          <div class="form-group row mt-0 p-0">
            <label class="col-lg-3"> <b> Alamat* </b></label>
            <div class="col-lg-9">
              <textarea id="address" name="address" class="form-control">{{ old('address') }}</textarea>
              <span class="text-danger p-1 hide " id="errorAddress"></span>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              
              <div class="col-lg-9 col-md-9">
                  <button style="width:100%;" name="submit" value="submit" id="submit" type="submit" class="btn btn-info">
                    Daftar <span class="fa fa-arrow-circle-right"></span>
                  </button>
              </div>
              <div class="col-lg-3 col-md-3">
                  <a href="{{route('login')}}" class="btn btn-default"> Login </a>
              </div>
              <div class="col-lg-12 col-md-12 mt-1 ani-no-bgc">
                  <p style="border-radius: 5px;" class="text-white text-center bg-success p-3"><b>Kesulitan dalam
                      mendaftar Hubungi WhatsApp 0857 1444 2664</b></p>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div id="img-2" class="col-md-6 col-lg-6 text-center spaceball">
        <img class="ball2" src="{{asset('images/kakakasuh2.png')}}">
      </div>
    </div>
  </div>

  <footer class="container-fluid mt-5 primary-color pt-5 pb-5 wow flipInX slower" data-wow-delay="0.3s">
    <div class="row text-center text-white">
      <div class=" col-lg-3 col-md-3 ani-no-bgc wow flipInY slower" data-wow-delay="1.5s">
        <div class="border border-light rounded py-3 footbox shadow-kka">
          <div class="icon-top">
            <i class="fa fa-envelope text-md"></i>
          </div>
          <p>
            info@pondokit.com
          </p>
        </div>
      </div>
      <div class=" col-lg-3 col-md-3 ani-no-bgc wow flipInX slower" data-wow-delay="1.5s">
        <div class="border border-light rounded py-3 footbox shadow-kka">
          <i class="fa fa-phone text-md"></i>
          <p>
            085228802828 (informasi)
          </p>
        </div>
      </div>
      <div class=" col-lg-3 col-md-3 ani-no-bgc wow flipInY slower" data-wow-delay="1.5s">
        <div class="border border-light rounded py-3 footbox shadow-kka">
          <i class="fa fa-map-marker text-md"></i>
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
      </div>
      <div class=" col-lg-3 col-md-3 ani-no-bgc wow flipInX slower" data-wow-delay="1.5s">
        <div class="border border-light rounded py-3 footbox shadow-kka">
          <a class="text-white p-2" href="https://www.facebook.com/pondokitcom/?ref=br_rs" target="_blank">
            <i class="fa fa-facebook text-md"></i>
          </a>
          <a class="text-white p-2" href="" target="_blank">
            <i class="fa fa-google-plus text-md"></i>
          </a>
          <a class="text-white p-2" href="https://www.youtube.com/watch?v=maw1XuVX72Y" target="_blank">
            <i class="fa fa-youtube text-md"></i>
          </a>
          <a class="text-white p-2" href="https://www.instagram.com/pondokit/" target="_blank">
            <i class="fa fa-instagram text-md"></i>
          </a>
          <p class="mt-3">
            © <a class="text-white" href="http://pondokit.com" target="_blank">pondokit.com</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('assets/MDB/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/MDB/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('assets/MDB/js/mdb.min.js')}}"></script>
  {{-- <script type="text/javascript" src="{{asset('assets/MDB/js/jquery-3.3.1.min.js')}}"></script> --}}
 <script type="text/javascript" src="{{asset('js/kakakAsuh/kakakAsuh.js')}}"></script>
 <script type="text/javascript" src="{{asset('js/kakakAsuh/post-register.js')}}"></script>

<script>
  new WOW().init();
</script>
  
</body>

</html>