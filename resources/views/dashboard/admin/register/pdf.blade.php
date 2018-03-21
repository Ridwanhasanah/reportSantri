<!DOCTYPE html>
<html >
<head>
   
    <title>Document</title>
    <link href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    
</head>
<body>
    <div id="page-wrapper" class="" style="width:700px; ">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">{{$register->nama}}</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            @if($register->proses == NULL)
              <i>Kosong</i> Proses
            @else
              {{$register->proses}} Proses
            @endif
          </h3>
        </div>
        <div class="panel-body">
              <div class="row">
                <div class="col-md-6 col-lg-6 " align="center">
                  {{-- @if (strlen($user->photo) ==0) --}}
                    <img alt="User Pic" src="{{asset('images/personal.png')}}" class="img-circle img-responsive"> 
                  {{-- @else
                    <img alt="User Pic" src="" class="img-circle img-responsive"> 
                  @endif  --}}
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Nama Ayah</b></td>
                        <td>{{$register->nama_ayah}}</td>
                      </tr>
                      <tr>
                        <td><b>Nama Ibu</b></td>
                        <td>{{$register->nama_ibu}}</td>
                      </tr>
                      <tr>
                        <td><b>Pekerjaan Ayah</b></td>
                        <td>{{$register->p_ayah}}</td>
                      </tr>
                        <tr>
                        <td><b>Pekerjaan Ibu</b></td>
                        <td>{{$register->p_ibu}}</td>
                      </tr>
                      <tr>
                        <td><b>Gaji Orang tua</b></td>
                        <td>{{$register->gaji}}</td>
                      </tr>
                      <tr>
                        <td><b>Jumlah Saudara</b></td>
                        <td>{{$register->j_saudara}}</td>
                      </tr>
                      <tr>
                        <td><b>Izin Orang Tua</b></td>
                        <td>{{$register->izin}}</td>
                      </tr>
                      <tr>
                        <td><b>Jumlah Orang Tua</b></td>
                        <td>{{$register->jml_ortu}}</td>
                      </tr>
                      <tr>
                        <td><b>No Hp Orang tua</b></td>
                        <td>{{$register->hp_ortu}}</td>
                      </tr>
                      <tr>
                        <td><b>Jika Ortu ada Rizki mau berinfaq</b></td>
                        <td>{{$register->rizki}}</td>
                      </tr>
                      <tr>
                        <td><b>Orang tua sudah tau Pondok IT</b></td>
                        <td>{{$register->tau}}</td>
                      </tr>
                      <tr>
                        <td><b>Sekolah</b></td>
                        <td>{{$register->sekolah}}</td>
                      </tr>
                      <tr>
                        <td><b>Lulusan Sekolah</b></td>
                        <td>{{$register->lulusan}}</td>
                      </tr>
                      <tr>
                        <td><b>Jurusan Sekolah</b></td>
                        <td>{{$register->jurusan}}</td>
                      </tr>
                      <tr>
                        <td><b>Punya Laptop</b></td>
                        <td>{{$register->laptop}}</td>
                      </tr>
                      <tr>
                        <td><b>IQ</b></td>
                        <td>{{$register->iq}}</td>
                      </tr>
                      <tr>
                        <td><b>Hafalan</b></td>
                        <td>{{$register->hafalan}}</td>
                      </tr>
                      <tr>
                        <td><b>Skill</b></td>
                        <td>{{$register->skill}}</td>
                      </tr>
                      <tr>
                        <td><b>Kelebihan</b></td>
                        <td>{{$register->kelebihanmu}}</td>
                      </tr>
                      <tr>
                        <td><b>Kekurangan</b></td>
                        <td>{{$register->kekuranganmu}}</td>
                      </tr>
                      <tr>
                        <td><b>Siap Patuhi Aturan Pondok</b></td>
                        <td>{{$register->peraturan}}</td>
                      </tr>
                      <tr>
                        <td><b>Menerima Kekurangan Pondok</b></td>
                        <td>{{$register->kekurangan_pondok}}</td>
                      </tr>
                      <tr>
                        <td><b>Hal yang Membuat Bahagia</b></td>
                        <td>{{$register->jalani_kehidupan}}</td>
                      </tr>
                      <tr>
                        <td><b>No KTP / Identitas</b></td>
                        <td>{{$register->ktp}}</td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>


                {{-- ============================= --}}
                <div class=" col-md-6 col-lg-6 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Divisi</b></td>
                        <td>{{$register->divisi}}</td>
                      </tr>
                      <tr>
                        <td><b>Tempat, Tanggal Lahir</b></td>
                        <td>{{$register->tempat_lahir}}, {{$register->tanggal_lahir }}</td>
                      </tr>
                      <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td></td>
                      </tr>
                        <tr>
                        <td><b>Alamat</b></td>
                        <td> {{$register->rumah}}, {{$register->kota}}</td>
                      </tr>
                      <tr>
                        <td><b>Nomor HP / WA</b></td>
                        <td>(HP) {{$register->hp}} - (WA){{$register->wa}}</td>
                      </tr>
                      <tr>
                        <td><b>Hobi</b></td>
                        <td>{{$register->hobi}}</td>
                      </tr>
                      <tr>
                        <td><b>Cita -Cita</b></td>
                        <td>{{$register->cita}}</td>
                      </tr>
                      <tr>
                        <td><b>Mangang</b></td>
                        <td>{{$register->magang}}</td>
                      </tr>
                      <tr>
                        <td><b>Alasan Masuk Pondok</b></td>
                        <td>{{$register->alasan}}</td>
                      </tr>
                      <tr>
                        <td><b>Dari Mana Tau Pondok IT</b></td>
                        <td>{{$register->kamu_tau}}</td>
                      </tr>
                      <tr>
                        <td><b>Meneruskan Cita - Cita Pondok</b></td>
                        <td>{{$register->cita_pondok}}</td>
                      </tr>
                      <tr>
                        <td><b>Berinfaq Rutin Setelah Lulus</b></td>
                        <td>{{$register->berinfak}}</td>
                      </tr>
                      <tr>
                        <td><b>Tokoh Idoala</b></td>
                        <td>{{$register->idola}}</td>
                      </tr>
                      <tr>
                        <td><b>Buku Favorite</b></td>
                        <td>{{$register->buku}}</td>
                      </tr>
                      <tr>
                        <td><b>Ustad Favorite</b></td>
                        <td>{{$register->ustad}}</td>
                      </tr>
                      <tr>
                        <td><b>Tanggungan Keluarga</b></td>
                        <td>{{$register->tanggungan}}</td>
                      </tr>
                      <tr>
                        <td><b>Perokok</b></td>
                        <td>{{$register->rokok}}</td>
                      </tr>
                      <tr>
                        <td><b>Punya Pacar</b></td>
                        <td>{{$register->pacar}}</td>
                      </tr>
                      <tr>
                        <td><b>Kesehatan</b></td>
                        <td>{{$register->kesehatan}}</td>
                      </tr>
                      <tr>
                        <td><b>Tanggungan Pribadi</b></td>
                        <td>{{$register->ada_tanggungan}}</td>
                      </tr>
                      <tr>
                        <td><b>Siap Berkarya</b></td>
                        <td>{{$register->karya}}</td>
                      </tr>
                      <tr>
                        <td><b>Amalan yang sering di lakukan</b></td>
                        <td>{{$register->peryataan}}</td>
                      </tr>
                      <tr>
                        <td><b>Pemahaman Agama</b></td>
                        <td>{{$register->pemahaman}}</td>
                      </tr>
                      <tr>
                        <td><b>Pernah Belajar di Bidang</b></td>
                        <td>{{$register->pernah}}</td>
                      </tr>
                      <tr>
                        <td><b>Alokasi 5 M</b></td>
                        <td>{{$register->limam}}</td>
                      </tr>
                      <tr>
                        <td><b>Menyikapi Kekurangan Orang lain</b></td>
                        <td>{{$register->kekurangan}}</td>
                      </tr>
                      <tr>
                        <td><b>Penyebab Marah</b></td>
                        <td>{{$register->marah}}</td>
                      </tr>
                      <tr>
                        <td><b>Penyebab Bahagia</b></td>
                        <td>{{$register->bahagia}}</td>
                      </tr>
                      <tr>
                        <td><b>Alokasi Pondok</b></td>
                        <td>{{$register->alokasi}}</td>
                      </tr>
                      <tr>
                        <td><b>Berjuang Untuk Pondok</b></td>
                        <td>{{$register->berjuang}}</td>
                      </tr>
                      <tr>
                        <td><b>10 Impian Besar</b></td>
                        <td>{{$register->impian}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope">&nbsp;{{$register->email}}</i></a>
          <a href="{{ url('http:// #') }}" target="blank_" class="btn btn-primary btn-facebook"><i class="fa fa-facebook">&nbsp;{{$register->facebook}}</i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

</body>
</html>