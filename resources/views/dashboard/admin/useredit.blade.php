@extends('dashboard.masterdashboard')
@section('title')
Edit User
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
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
                @if (count($user->photo)==0)
                  <img alt="User Pic" src="{{asset('images/personal.png')}}" class="img-circle img-responsive"> 
                @else
                  <img alt="User Pic" src="{{asset('storage/photos/'.$user->photo)}}" class="img-circle img-responsive"> 
                @endif 
                  <br>
                  <input type="file" name="photo" class="form-control">
                </div>

               
                <div class=" col-md-9 col-lg-9 "> 
                 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name  </td>
                        <td><input placeholder="Ridwan" class="form-control" type="" name="name" value="{{$user->name}}"></td>
                      </tr>
                      <tr>
                        <td>Department:</td>
                        <td>
                          <select name="department" class="form-control">
                            <option {{$user->department=='Programmer' ? 'selected' : ''}} value="Programmer">Programmer</option>
                            <option {{$user->department=='Multimedia' ? 'selected' : ''}}  value="Multimedia">Multimedia</option>
                            <option {{$user->department=='Imers' ? 'selected' : ''}} value="Imers">Imers</option>
                            <option {{$user->department=='Cyber' ? 'selected' : ''}} value="Cyber">Cyber</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><input class="form-control" id="datepicker" name="date_birth" value="{{$user->date_birth}}"> , <input placeholder="Contoh : Jakarta" name="birth_place" class="form-control" value="{{$user->birth_place}}"></td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td>

                          <input {{$user->gender=='Pria' ? 'checked' : ''}} type="radio" name="gender" value="Pria"> Pria<br>
                          <input  {{$user->gender=='Wanita' ? 'checked' : ''}} type="radio" name="gender" value="Wanita"> Wanita<br>
                        </td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><textarea placeholder="Contoh : jl.pesangrahan" class="form-control" type="text" name="address">{{$user->address}}</textarea></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input placeholder="Contoh : ridwan@pondokit.com" class="form-control" type="email" name="email" value="{{$user->email}}"></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td><input placeholder="Contoh : 089123456789" class="form-control" type="number" name="hp" value="{{$user->hp}}">(Mobile)</td>
                      </tr>
                      <tr>
                        <td>Dream / Impian</td>
                        <td><input placeholder="Contoh : Menjadi Mater WEB" class="form-control" type="text" name="dream" value="{{$user->dream}}"></td>
                      </tr>
                      <tr>
                        <td>Hobby</td>
                        <td><input placeholder="Contoh : Memanah" class="form-control" type="" name="hobby" value="{{$user->hobby}}"></td>
                      </tr>
                      <tr>
                        <td>Experience / Pengalaman</td>
                        <td><input placeholder="Contoh : Membuat CRUD di Laravel" class="form-control" type="text" name="experience" value="{{$user->experience}}"></td>
                      </tr>
                      <tr>
                        <td>Karya</td>
                        <td><input placeholder="Contoh : Membuat Web Onlinde Shop" class="form-control" type="" name="creation" value="{{$user->creation}}"></td>
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