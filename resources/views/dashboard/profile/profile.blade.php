@extends('dashboard.masterdashboard')
@section('title')
{{$user->name}} Profil
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">{{$user->name}} Profil</h1>
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
                <div class="col-md-3 col-lg-3 " align="center">
                  @if (strlen($user->photo) ==0)
                    <img alt="User Pic" src="{{asset('images/flower.jpg')}}" class="img-circle img-responsive"> 
                  @else
                    <img alt="User Pic" src="{{asset('storage/photos/'.$user->photo)}}" class="img-circle img-responsive"> 
                  @endif 
                  <div class="panel panel-info rmargin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><b>Quote</b></h3>
                    </div>
                    <div class="panel-body">
                      <p><i><b>{{$user->quote}}</b></i></p>
                    </div>
                  </div>
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Divisi</b></td>
                        <td>{{$user->department}}</td>
                      </tr>
                      <tr>
                        <td><b>Tempat, Tanggal Lahir</b></td>
                        <td>{{$user->date_birth}} , {{$user->birth_place}}</td>
                      </tr>
                      <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>{{$user->gender}}</td>
                      </tr>
                      <tr>
                        <td><b>Kota</b></td>
                        <td>{{$user->city}}</td>
                      </tr>
                      <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>{{$user->district}}</td>
                      </tr>
                      <tr>
                        <td><b>Alamat</b></td>
                        <td>{{$user->address}}</td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><a href="{{$user->email}}">{{$user->email}}</a></td>
                      </tr>
                      <tr>
                        <td><b>Nomor HandPhone</b></td>
                        <td>{{$user->hp}}(Mobile)</td>
                      </tr>
                      <tr>
                        <td><b>Hobi</b></td>
                        <td>{{$user->hobby}}</td>
                      </tr>
                      <tr>
                        <td><b>Pengalaman</b></td>
                        <td>{{$user->experience}}</td>
                      </tr>
                      <tr>
                        <td><b>Karya</b></td>
                        <td>{{$user->creation}}</td>
                      </tr>
                      <tr>
                        <td><b>100 Cita-Cita Ku</b></td>
                        <td>
                          <div class="scrolltab">
                          {!! $user->dream !!}
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="{{route('profile.edit',$user->id)}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><b>Edit</b><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection