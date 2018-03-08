@extends('dashboard.masterdashboard')
@section('title')
Kirim Saran
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Kirim Saran</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Kirim Saran untuk Pondok IT</h3>
        </div>
        <div class="panel-body">
              <div class="row">

                 <form action="{{route('suggestion.store')}}" method="post" role="form">
                    {{csrf_field()}}
                    {{ method_field('POST') }}
               
                <div class=" col-md-12 col-lg-12 "> 
                  <div class="form-group">
                    <label>Nama : </label>
                    <input name="name" class="form-control" value="{{Auth::user()->name}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Handphone : </label>
                    <input name="hp" class="form-control" value="{{Auth::user()->hp}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Tanggal : </label>
                    <input name="date" class="form-control" value="{{date('d-m-Y')}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Saran Kamu</label>
                    <textarea rows="15" class="form-control" type="text" name="suggestion"></textarea>
                  </div>
                  <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit">
                  </div>
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