@extends('dashboard.masterdashboard')
@section('title')
Semua Santri
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Santri</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col col-lg-12">
        @for($i=0; $i<$count; $i++)
        <?php $user = DB::table('users')->select('*')->where('id',$caregivers[$i]->santri)->get(); ?>
        <div class="col col-lg-3" style="float: left">
            <div class="card-santri">
                     @if (strlen($user[0]->photo) != 0)
                      <div style="overflow: hidden; padding: 0; min-height:200px; max-height:200px;" >
                        <img style="max-height: auto; display: block; margin: auto; width: 100%;"  src="{{asset('storage/photos/'.$user[0]->photo)}}">
                     </div>
                    @else
                     <div style="overflow: hidden; padding: 0; min-height:200px; max-height:200px;" >
                        <img style="max-height: auto; display: block; margin: auto; width: 100%;"  src="{{asset('images/flower.jpg')}}">
                     </div>
                    @endif
                    <div class="card-santri-body">
                      <div class="card-santri-body2">
                          <h4 style="margin-bottom: 0px; margin-top: 0px"><b>{{$user[0]->name}}</b></h4><br>
                          <p><i class="fa fa-map-marker" style="font-size: 20px;"></i>{{$user[0]->city}} - {{$user[0]->district}}</p>
                          <p>{{ str_limit($user[0]->quote, 70) }}</p>
                      </div>
                      <div class="card-santri-footer">
                        <a href="#" class="btn btn-success">See Profile</a>
                      </div>
                  </div>
            </div>
        </div>
        @endfor
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
{{-- {!! $students->render() !!} --}}
@endsection