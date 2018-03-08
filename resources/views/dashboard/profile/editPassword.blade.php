@extends('dashboard.masterdashboard')
@section('title')
Ubah Password
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        {{-- @include('dashboard.admin.editPassword') --}}
        <h1 class="page-header"></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Ubah Password</h3>
        </div>
        <div class="panel-body">
              <div class="row ">

                 <form action="{{route('profilepass.update',$id)}}" method="post" role="form">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                <div class=" col-md-12 col-lg-12 "> 
                 
                  <table class="table table-user-information">
                    <tbody>
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
                        <td>Ulangi Password  </td>
                        <td>
                          <input value="{{old('repassword')}}" has-feedback{{$errors->has('repassword') ? 'has-error' : ''}} class="form-control" type="password" name="repassword"">
                          @if ($errors->has('repassword'))
                            <span >
                              <p class="help-block rvalidasi" >{{$errors->first('repassword')}}</p>
                            </span>
                          @endif
                        </td>
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