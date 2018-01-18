@extends('dashboard.masterdashboard')
@section('title')
{{$user->name}}'s Profile
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">{{$user->name}}'s Profile</h1>
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

                 <form action="{{route('profile.update',$user->id)}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}

                <div class="col-md-3 col-lg-3 " align="center">
                @if (count($user->photo)==0)
                  <img alt="User Pic" src="http://enadcity.org/enadcity/wp-content/uploads/2017/02/profile-pictures.png" class="img-circle img-responsive"> 
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
                        <td>Name : </td>
                        <td><input placeholder="Ridwan" class="form-control" type="" name="name" value="{{$user->name}}"></td>
                      </tr>
                      <tr>
                        <td>Department:</td>
                        <td><input readonly class="form-control" type="" name="departemt" value="{{$user->department}}"></td>
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
                  
                  
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
                </form>
              </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection