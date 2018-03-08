@extends('dashboard.masterdashboard')
@section('title')
Edit {{$register->nama}}
@endsection

@section('content')
<div id="page-wrapper">
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
          <form class="form-group" method="post" action="{{route('register.update',$register->id)}}" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('PATCH')}}
          
              <div class="row">
                <div class="col-md-6 col-lg-6 " align="center">
                  @if (strlen($register->foto) ==0)
                    <img alt="User Pic" src="{{asset('images/personal.png')}}" class="img-circle img-responsive"> 
                  @else
                    <img alt="User Pic" src="{{asset('photos/$register->foto')}}" class="img-circle img-responsive"> 
                  @endif
                  <br>
                  <br>
                  <input class="form-control" type="file" name="foto"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Proses</b></td>
                        <td>
                          <select name="proses" class="form-control">
                            <option value="sudah" {{$register->proses == 'sudah' ? 'selected' : ''}} >Sudah</option>
                            <option value="belum" {{$register->proses == 'belum' ? 'selected' : ''}}>Belum</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Nama Lengkap</b></td>
                        <td><input class="form-control" type="" name="nama" value="{{$register->nama}}"></td>
                      </tr>
                      <tr>
                        <td><b>Nama Ayah</b></td>
                        <td><input class="form-control" type="" name="nama_ayah" value="{{$register->nama_ayah}}"></td>
                      </tr>
                      <tr>
                        <td><b>Nama Ibu</b></td>
                        <td><input class="form-control" type="" name="nama_ibu" value="{{$register->nama_ibu}}"></td>
                      </tr>
                      <tr>
                        <td><b>Pekerjaan Ayah</b></td>
                        <td><input class="form-control" type="" name="p_ayah" value="{{$register->p_ayah}}"></td>
                      </tr>
                        <tr>
                        <td><b>Pekerjaan Ibu</b></td>
                        <td><input class="form-control" type="" name="p_ibu" value="{{$register->p_ibu}}"></td>
                      </tr>
                      <tr>
                        <td><b>Gaji Orang tua</b></td>
                        <td><input class="form-control" type="" name="gaji" value="{{$register->gaji}}"></td>
                      </tr>
                      <tr>
                        <td><b>Jumlah Saudara</b></td>
                        <td><input class="form-control" type="" name="j_saudara" value="{{$register->j_saudara}}"></td>
                      </tr>
                      <tr>
                        <td><b>Izin Orang Tua</b></td>
                        <td>
                          <select name="izin" class="form-control">
                            <option value="Sudah" {{$register->izin == 'Sudah' ? 'selected' : ''}} >Sudah</option>
                            <option value="Belum" {{$register->izin == 'Belum' ? 'selected' : ''}} >Belum</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Jumlah Orang Tua</b></td>
                        <td>
                          <select name="jml_ortu" class="form-control">
                            <option value="Lengkap" {{$register->jml_ortu == 'Lengkap' ? 'selected' : ''}} >Lengkap</option>
                            <option value="Yatim" {{$register->jml_ortu == 'Yatim Piatu' ? 'selected' : ''}} >Yatim</option>
                            <option value="Piatu" {{$register->jml_ortu == 'Piatu' ? 'selected' : ''}} >Piatu</option>
                            <option value="Yatim Piatu" {{$register->jml_ortu == 'Yatim Piatu' ? 'selected' : ''}} >Yatim Piatu</option>
                            <option value="Cerai Hidup" {{$register->jml_ortu == 'Cerai Hidup' ? 'selected' : ''}} >Cerai Hidup</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>No Hp Orang tua</b></td>
                        <td><input class="form-control" type="" name="hp_ortu" value="{{$register->hp_ortu}}"></td>
                      </tr>
                      <tr>
                        <td><b>Jika Ortu ada Rizki mau berinfaq</b></td>
                        <td><input class="form-control" type="" name="rizki" value="{{$register->rizki}}"></td>
                      </tr>
                      <tr>
                        <td><b>Orang tua sudah tau Pondok IT</b></td>
                        <td><input class="form-control" type="" name="tau" value="{{$register->tau}}"></td>
                      </tr>
                      <tr>
                        <td><b>Sekolah</b></td>
                        <td><input class="form-control" type="" name="sekolah" value="{{$register->sekolah}}"></td>
                      </tr>
                      <tr>
                        <td><b>Lulusan Sekolah</b></td>
                        <td><input class="form-control" type="" name="lulusan" value="{{$register->lulusan}}"></td>
                      </tr>
                      <tr>
                        <td><b>Punya Laptop</b></td>
                        <td><input class="form-control" type="" name="laptop" value="{{$register->laptop}}"></td>
                      </tr>
                      <tr>
                        <td><b>Punya Laptop</b></td>
                        <td>
                          <select name="laptop" class="form-control">
                            <option value="Sudah" {{$register->laptop == 'Sudah' ? 'selected' : ''}} >Sudah</option>
                            <option value="Belum" {{$register->laptop == 'Belum' ? 'selected' : ''}} >Belum</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>IQ</b></td>
                        <td><input class="form-control" type="" name="iq" value="{{$register->iq}}"></td>
                      </tr>
                      <tr>
                        <td><b>Hafalan</b></td>
                        <td><input class="form-control" type="" name="hafalan" value="{{$register->hafalan}}"></td>
                      </tr>
                      <tr>
                        <td><b>Skill</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="skill">{{$register->skill}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Kelebihan</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="kelebihanmu">{{$register->kelebihanmu}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Kekurangan</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="kekuranganmu">{{$register->kekuranganmu}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Siap Patuhi Aturan Pondok</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="peraturan">{{$register->peraturan}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Menerima Kekurangan Pondok</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="kekurangan_pondok">{{$register->kekurangan_pondok}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Hal yang Membuat Bahagia</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="jalani_kehidupan">{{$register->jalani_kehidupan}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>No KTP / Identitas</b></td>
                        <td><input class="form-control" type="" name="ktp" value="{{$register->ktp}}"></td>
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
                        <td>
                          <select name="divisi" class="form-control">
                            <option value="Programmer" {{$register->divisi == 'Programmer' ? 'selected' : ''}} >Programmer</option>
                            <option value="Multimedia" {{$register->divisi == 'Multimedia' ? 'selected' : ''}} >Multimedia</option>
                            <option value="Imers" {{$register->divisi == 'Imers' ? 'selected' : ''}} >Imers</option>
                            <option value="Cyber" {{$register->divisi == 'Cyber' ? 'selected' : ''}} >Cyber</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Tempat Lahir</b></td>
                        <td><input class="form-control" type="" name="tempat_lahir" value="{{$register->tempat_lahir}}"></td>
                      </tr>
                      <tr>
                        <td><b>Tanggal Lahir</b></td>
                        <td><input class="form-control" id="datepicker" type="" name="tanggal_lahir" value="{{$register->tanggal_lahir }}"></td>
                      </tr>
                      <tr>
                        <td><b>Alamat</b></td>
                        <td><input class="form-control" type="" name="rumah" value="{{$register->rumah}}"> ,<input class="form-control" type="" name="kota" value="{{$register->kota}}"> </td>
                      </tr>
                      <tr>
                        <td><b>Nomor HP / WA</b></td>
                        <td>(HP)<input class="form-control" type="" name="hp" value="{{$register->hp}}">  - (WA)<input class="form-control" type="" name="wa" value="{{$register->wa}}"></td>
                      </tr>
                      <tr>
                        <td><b>Hobi</b></td>
                        <td><input class="form-control" type="" name="hobi" value="{{$register->hobi}}"></td>
                      </tr>
                      <tr>
                        <td><b>Cita -Cita</b></td>
                        <td><input class="form-control" type="" name="cita" value="{{$register->cita}}"></td>
                      </tr>
                      <tr>
                        <td><b>Mangang</b></td>
                        <td><input class="form-control" type="" name="magang" value="{{$register->magang}}"></td>
                      </tr>
                      <tr>
                        <td><b>Alasan Masuk Pondok</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="alasan">{{$register->alasan}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Dari Mana Tau Pondok IT</b></td>
                        <td><input class="form-control" type="" name="kamu_tau" value="{{$register->kamu_tau}}"></td>
                      </tr>
                      <tr>
                        <td><b>Meneruskan Cita - Cita Pondok</b></td>
                        <td><input class="form-control" type="" name="cita_pondok" value="{{$register->cita_pondok}}"></td>
                      </tr>
                      <tr>
                        <td><b>Berinfaq Rutin Setelah Lulus</b></td>
                        <td><input class="form-control" type="" name="berinfak" value="{{$register->berinfak}}"></td>
                      </tr>
                      <tr>
                        <td><b>Tokoh Idola</b></td>
                        <td><input class="form-control" type="" name="idola" value="{{$register->idola}}"></td>
                      </tr>
                      <tr>
                        <td><b>Buku Favorite</b></td>
                        <td><input class="form-control" type="" name="buku" value="{{$register->buku}}"></td>
                      </tr>
                      <tr>
                        <td><b>Ustad Favorite</b></td>
                        <td><input class="form-control" type="" name="ustad" value="{{$register->ustad}}"></td>
                      </tr>
                      <tr>
                        <td><b>Tanggungan Keluarga</b></td>
                        <td><input class="form-control" type="" name="tanggungan" value="{{$register->tanggungan}}"></td>
                      </tr>
                      <tr>
                        <td><b>Perokok</b></td>
                        <td><input class="form-control" type="" name="rokok" value="{{$register->rokok}}"></td>
                      </tr>
                      <tr>
                        <td><b>Punya Pacar</b></td>
                        <td>
                          <select name="pacar" class="form-control">
                            <option value="Iya" {{$register->pacar == 'Iya' ? 'selected' : ''}} >Iya</option>
                            <option value="Tidak" {{$register->pacar == 'Tidak' ? 'selected' : ''}} >Tidak</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Kesehatan</b></td>
                        <td><input class="form-control" type="" name="kesehatan" value="{{$register->kesehatan}}"></td>
                      </tr>
                      <tr>
                        <td><b>Tanggungan Pribadi</b></td>
                        <td>
                          <select name="ada_tanggungan" class="form-control">
                            <option value="Siap" {{$register->ada_tanggungan == 'Siap' ? 'selected' : ''}} >Siap</option>
                            <option value="Tidak Siap" {{$register->ada_tanggungan == 'Tidak Siap' ? 'selected' : ''}} >Tidak Siap</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Siap Berkarya</b></td>
                        <td>
                          <select name="karya" class="form-control">
                            <option value="Siap" {{$register->karya == 'Siap' ? 'selected' : ''}} >Siap</option>
                            <option value="Tidak Siap" {{$register->karya == 'Tidak Siap' ? 'selected' : ''}} >Tidak Siap</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Amalan yang sering di lakukan</b></td>
                        <td><input class="form-control" type="" name="peryataan" value="{{$register->peryataan}}"></td>
                      </tr>
                      <tr>
                        <td><b>Pemahaman Agama</b></td>
                        <td><input class="form-control" type="" name="pemahaman" value="{{$register->pemahaman}}"></td>
                      </tr>
                      <tr>
                        <td><b>Pernah Belajar di Bidang</b></td>
                        <td>
                          <select name="pernah" class="form-control">
                            <option value="Pernah" {{$register->pernah == 'Pernah' ? 'selected' : ''}} >Pernah</option>
                            <option value="Tidak Pernah" {{$register->pernah == 'Tidak Pernah' ? 'selected' : ''}} >Tidak Pernah</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Alokasi 5 M</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="limam">{{$register->limam}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Menyikapi Kekurangan Orang lain</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="kekurangan">{{$register->kekurangan}}</textarea></td>
                      <tr>
                        <td><b>Penyebab Marah</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="marah">{{$register->marah}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Penyebab Bahagia</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="bahagia">{{$register->bahagia}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Alokasi Pondok</b></td>
                        <td><input class="form-control" type="" name="alokasi" value="{{$register->alokasi}}"></td>
                      </tr>
                      <tr>
                        <td><b>Berjuang Untuk Pondok</b></td>
                        <td><input class="form-control" type="" name="berjuang" value="{{$register->berjuang}}"></td>
                      </tr>
                      <tr>
                        <td><b>10 Impian Besar</b></td>
                        <td><textarea rows="5" class="form-control" type="" name="impian">{{$register->kekurangan_pondok}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><input class="form-control" type="email" name="email" value="{{$register->email}}"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </form>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope">&nbsp;{{$register->email}}</i></a>
          <a href="{{ url('http:// #') }}" target="blank_" class="btn btn-primary btn-facebook"><i class="fa fa-facebook">&nbsp;{{$register->facebook}}</i></a>
          <span class="pull-right">
            <a href="" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><b>Edit</b><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection