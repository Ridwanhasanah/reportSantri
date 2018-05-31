@extends('dashboard.masterdashboard')
@section('title')
Semua Santri @if(!(Auth::user()->hasRole('foster_brother') && Auth::user()->hasRole('foster_brother'))){{$divisi}}@endif
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Santri @if(!(Auth::user()->hasRole('foster_brother') && Auth::user()->hasRole('foster_brother'))){{$divisi}}@endif</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col col-lg-12">
        @foreach($students as $student)
        <div class="col col-lg-3" style="float: left">
            <div class="card-santri">
                     @if (strlen($student->photo) != 0)
                      <div style="overflow: hidden; padding: 0; min-height:200px; max-height:200px;" >
                        <img style="max-height: auto; display: block; margin: auto; width: 100%;"  src="{{asset('storage/photos/'.$student->photo)}}">
                     </div>
                    @else
                     <div style="overflow: hidden; padding: 0; min-height:200px; max-height:200px;" >
                        <img style="max-height: auto; display: block; margin: auto; width: 100%;"  src="{{asset('images/flower.jpg')}}">
                     </div>
                    @endif
                    <div class="card-santri-body">
                      <div class="card-santri-body2">
                          <h4 style="margin-bottom: 0px; margin-top: 0px"><b>{{ucwords(strtolower("$student->name"))}}</b></h4><br>
                          <p><i class="fa fa-map-marker" style="font-size: 20px;"></i>{{$student->city}} - {{$student->district}}</p>
                          <p>{{ str_limit($student->quote, 70) }}</p>
                      </div>
                      <div class="card-santri-footer">
                        <a href="#" class="btn btn-success">See Profile</a>
                        @if(Auth::user()->hasRole('foster_brother'))
                        <a style="margin-left: 10px;" href="{{route('paket-amal.create',$student->id)}}" class="btn btn-info pull-right">Tambah</a>
                        @endif
                      </div>
                  </div>
            </div>
        </div>
        @endforeach
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
{!! $students->render() !!}
@endsection