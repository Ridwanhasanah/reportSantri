@extends('dashboard.masterdashboard')
@section('title')
Ubah Target Terdekat
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Ubah Target Terdekat</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Target Terdekat</h3>
        </div>
        <div class="panel-body">
              <div class="row">

                 <form action="{{route('target.update',$user->id)}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
               
                <div class=" col-md-12 col-lg-12 "> 
                    <textarea 
                        placeholder="
                        Pisahkan dengan tanda koma yaa Target Terdekatnya
                        Contoh :
                        1. Meyelesaikan Design Logo,
                        2. Meyelesaikan Design Web, dst
                        " rows="30" class="form-control" type="text" name="target">{{$user->target}}</textarea><br>
                    <input class="btn btn-primary" type="submit" name="submit">
                </div>
                </form>
              </div>
        </div>
        <div class="panel-footer">
          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
        </span>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection