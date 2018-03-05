@extends('dashboard.masterdashboard')
@section('title')
Ubah Santri / Staff
@endsection

@section('content')

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        {{-- @include('dashboard.admin.editPassword') --}}
        <h1 class="page-header">Edit User</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">{{$user->name}}</h3>
        </div>
        <div class="panel-body">
              <div class="row">

                 <form action="{{route('user.update',$user->id)}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}

                <div class="col-md-3 col-lg-3 " align="center">
                @if ($user->photo ==0)
                  <img alt="User Pic" src="{{asset('images/personal.png')}}" class="img-circle img-responsive"> 
                @else
                  <img alt="User Pic" src="{{asset('storage/photos/'.$user->photo)}}" class="img-circle img-responsive"> 
                @endif 
                  <br>
                  <input type="file" name="photo" class="form-control">
                  <br>
                  <a href="{{route('password.edit',$user->id)}}" id="editpass" class="btn btn-outline btn-danger">Ubah Password</a>
                  <div class="panel panel-info rmargin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><b>Quote</b></h3>
                    </div>
                    <div class="panel-body">
                      <textarea placeholder="Contoh : Berilmu sebelum berkata dan beramal" class="form-control" type="textarea" name="quote">{{$user->quote}}</textarea>
                    </div>
                  </div>
                </div>

               
                <div class=" col-md-9 col-lg-9 "> 
                 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Nama</b>  </td>
                        <td><input placeholder="Ridwan" class="form-control" type="" name="name" value="{{$user->name}}"></td>
                      </tr>
                      <tr>
                        <td><b>Divisi</b></td>
                        <td>
                          <select name="department" class="form-control">
                            @if(Auth::user()->hasRole('master'))
                            <option {{$user->department=='Master' ? 'selected' : ''}} value="Staff Pondok IT">Master</option>
                            <option {{$user->department=='Staff Pondok IT' ? 'selected' : ''}} value="Staff Pondok IT">Staff Pondok IT</option>
                            <option {{$user->department=='Teacher' ? 'selected' : ''}} value="Cyber">Guru / Mentor</option>
                            @endif
                            <option {{$user->department=='Programmer' ? 'selected' : ''}} value="Programmer">Programmer</option>
                            <option {{$user->department=='Multimedia' ? 'selected' : ''}}  value="Multimedia">Multimedia</option>
                            <option {{$user->department=='Imers' ? 'selected' : ''}} value="Imers">Imers</option>
                            <option {{$user->department=='Cyber' ? 'selected' : ''}} value="Cyber">Cyber</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Tempat, Tanggal Lahir</b></td>
                        <td><input class="form-control" id="datepicker" name="date_birth" value="{{$user->date_birth}}"> , <input placeholder="Contoh : Jakarta" name="birth_place" class="form-control" value="{{$user->birth_place}}"></td>
                      </tr>
                      <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>

                          <input {{$user->gender=='Pria' ? 'checked' : ''}} type="radio" name="gender" value="Pria"> Pria<br>
                          <input  {{$user->gender=='Wanita' ? 'checked' : ''}} type="radio" name="gender" value="Wanita"> Wanita<br>
                        </td>
                      </tr>
                        <tr>
                        <td><b>Alamat</b></td>
                        <td><textarea placeholder="Contoh : jl.pesangrahan" class="form-control" type="text" name="address">{{$user->address}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><input placeholder="Contoh : ridwan@pondokit.com" class="form-control" type="email" name="email" value="{{$user->email}}"></td>
                      </tr>
                      <tr>
                        <td><b>Nomor HandPhone</b></td>
                        <td><input placeholder="Contoh : 089123456789" class="form-control" type="number" name="hp" value="{{$user->hp}}">(Mobile)</td>
                      </tr>
                      <tr>
                        <td><b>Hobi</b></td>
                        <td><input placeholder="Contoh : Memanah" class="form-control" type="" name="hobby" value="{{$user->hobby}}"></td>
                      </tr>
                      <tr>
                        <td><b>Pengalaman</b></td>
                        <td><input placeholder="Contoh : Membuat CRUD di Laravel" class="form-control" type="text" name="experience" value="{{$user->experience}}"></td>
                      </tr>
                      <tr>
                        <td><b>Karya</b></td>
                        <td><input placeholder="Contoh : Membuat Web Onlinde Shop" class="form-control" type="" name="creation" value="{{$user->creation}}"></td>
                      </tr>
                      <tr>
                        <td><b>100 Cita - Cita ku</b></td>
                        <td><textarea 
                          placeholder="
                          Pisahkan dengan tanda koma yaa cita citanya
                          Contoh : 
                          1. Mempunyai Istri Cantik dan Sholeha,
                          2.Mempunyai Rumah 4 lantai di Jakarta, dst
                          " rows="30" class="form-control" type="text" name="dream">{{$user->dream}}</textarea></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="btn btn-primary" type="submit" name="submit"></td>
                      </tr>
                    </tbody>
                  </table>
                 
                </div>
                </form>
              </div>
        </div>
        <div class="panel-footer">
          
        </div>
      </div>
    </div>
  </div>
</div>

@endsection