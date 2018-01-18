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
                <div class="col-md-3 col-lg-3 " align="center">
                  @if (count($user->photo)==0)
                    <img alt="User Pic" src="{{asset('images/personal.png')}}" class="img-circle img-responsive"> 
                  @else
                    <img alt="User Pic" src="{{asset('storage/photos/'.$user->photo)}}" class="img-circle img-responsive"> 
                  @endif 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Department:</td>
                        <td>{{$user->department}}</td>

                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>{{$user->date_birth}} , {{$user->birth_place}}</td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td>{{$user->gender}}</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>{{$user->address}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="{{$user->email}}">{{$user->email}}</a></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td>{{$user->hp}}(Mobile)</td>
                      </tr>
                      <tr>
                        <td>Dream / Impian</td>
                        <td>{{$user->dream}}</td>
                      </tr>
                      <tr>
                        <td>Hobby</td>
                        <td>{{$user->hobby}}</td>
                      </tr>
                      <tr>
                        <td>Experience / Pengalaman</td>
                        <td>{{$user->experience}}</td>
                      </tr>
                      <tr>
                        <td>Karya</td>
                        <td>{{$user->creation}}</td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
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