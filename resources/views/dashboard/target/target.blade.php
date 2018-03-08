@extends('dashboard.masterdashboard')
@section('title')
Target Terdekat
@endsection

@section('content')

<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
              @include('layouts.patrials.alerts')
              <h1 class="page-header">Target Terdekat</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Target Terdekat</h3>
              </div>
              <div class="panel-body">
                   <p>
                        @foreach($targets as $target)
                            {{$target}}<br>
                        @endforeach
                   </p>
              </div>
              <div class="panel-footer">
                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                <span class="pull-right">
                  <a href="{{route('target.edit',$user->id)}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><b>Edit</b><i class="glyphicon glyphicon-edit"></i></a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection