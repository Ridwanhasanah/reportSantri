@extends('dashboard.masterdashboard')
@section('title')
Adik Asuh Ku
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Adik Asuh</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row" style="padding-bottom:10%;">
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
                        <a class="dropdown-toggle btn btn-primary" data-toggle="dropdown" href="#">
                            Lihat Kegiatan
                        </a>
                        <ul class="dropdown-menu" style="top:auto; left:auto;">
                            <li>
                                <a target="_blank" href="{{route('reporttoka.adikasuh',$user[0]->id)}}"><i class="fa fa-th-list fa-fw"></i> Laporan dari Adik Asuh</a>
                            </li>
                            <li>
                                <a target="_blank" href="{{route('adik.activity',$user[0]->id)}}"><i class="fa fa-th-list fa-fw"></i> Kegiatan</a>
                            </li>
                            <li>
                                <a target="_blank" href="{{route('adik.target',$user[0]->id)}}"><i class="fa fa-dot-circle-o fa-fw"></i> Target</a>
                            </li>
                            <li>
                                <a target="_blank" href="{{route('adik.amaliyah',$user[0]->id)}}"><i class="fa fa-moon-o fa-fw"></i> Amaliyah</a>
                            </li>
                        </ul>
                        <a target="_blank" href="{{route('profile.show',$user[0]->id)}}" class="btn btn-success">Lihat Profil</a> &nbsp;
                        
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