@extends('dashboard.masterdashboard')
@section('title')
Add User
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Add User</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Tambah Santri / Staff</h3>
        </div>
        <div class="panel-body">
              <div class="row">

                 <form action="{{route('user.store')}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('POST') }}

                <div class="col-md-3 col-lg-3 " align="center">
                
                  <img alt="User Pic" src="{{asset('images/personal.png')}}" class="img-circle img-responsive"> 
                  <br>
                  <input type="file" name="photo" class="form-control">
                </div>

               
                <div class=" col-md-9 col-lg-9 "> 
                 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name  </td>
                        <td>
                          <input value="{{old('name')}}" has-feedback{{$errors->has('name') ? 'has-error' : ''}} placeholder="Ridwan - required" class="form-control" type="" name="name"">
                          @if ($errors->has('name'))
                            <span >
                              <p class="help-block rvalidasi" >{{$errors->first('name')}}</p>
                            </span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Password  </td>
                        <td>
                          <input value="{{old('password')}}" has-feedback{{$errors->has('password') ? 'has-error' : ''}} class="form-control" type="password" name="password"">
                          @if ($errors->has('password'))
                            <span >
                              <p class="help-block rvalidasi" >{{$errors->first('password')}}</p>
                            </span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Department:</td>
                        <td>
                          <select name="department" class="form-control">
                            <option value="Programmer">Programmer</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Imers">Imers</option>
                            <option value="Cyber">Cyber</option>
                            @if(Auth::user()->hasRole('master'))
                            <option value="Staff Pondok IT">Staff Pondok IT</option>
                            <option value="Foster Brother">Kakak Asuh</option>
                            <option value="Teacher">Guru / Mentor</option>
                            <option value="Master">Master</option>
                            @endif
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td><input value="{{old('date_birth')}}" class="form-control" id="datepicker" name="date_birth" > , <input placeholder="Contoh : Jakarta" name="birth_place" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                          <input checked type="radio" name="gender" value="Pria"> Pria<br>
                          <input type="radio" name="gender" value="Wanita"> Wanita<br>
                        </td>
                      </tr>
                        <tr>
                        <td>Alamat</td>
                        <td>
                          <textarea value="{{old('address')}}" placeholder="Contoh : jl.pesangrahan" class="form-control wysiwyg" type="text" name="address">
                            
                          </textarea>
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>
                          <input value="{{old('email')}}" has-feedback{{$errors->has('email') ? 'has-error' : ''}} placeholder="Contoh : ridwan@pondokit.com - required" class="form-control" type="email" name="email" >
                          @if ($errors->has('email'))
                            <span >
                              <p class="help-block rvalidasi" >{{$errors->first('email')}}</p>
                            </span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Nomor HandPhone</td>
                        <td><input value="{{old('hp')}}" placeholder="Contoh : 089123456789" class="form-control" type="number" name="hp" >(Mobile)</td>
                      </tr>
                      <tr>
                        <td>Impian</td>
                        <td><input value="{{old('dream')}}" placeholder="Contoh : Menjadi Mater WEB" class="form-control" type="text" name="dream"></td>
                      </tr>
                      <tr>
                        <td>Hobby</td>
                        <td><input value="{{old('hobby')}}" placeholder="Contoh : Memanah" class="form-control" type="" name="hobby" ></td>
                      </tr>
                      <tr>
                        <td>Pengalaman</td>
                        <td><input value="{{old('experience')}}" placeholder="Contoh : Membuat CRUD di Laravel" class="form-control" type="text" name="experience" ></td>
                      </tr>
                      <tr>
                        <td>Karya</td>
                        <td><input value="{{old('creation')}}" placeholder="Contoh : Membuat Web Onlinde Shop" class="form-control" type="" name="creation" ></td>
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