@extends('dashboard.masterdashboard')
@section('title')
Semua Laporan
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <div>
          <h1 class="page-header">Semua Laporan</h1>
        </div>
        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@if (!Auth::user()->hasRole('foster_brother'))

<div style="margin-bottom:5%;">
    <a class="btn btn-lg btn-info pull-right" href="{{route('reporttoka.create')}}">Buat Laporan </a>
  </div>

  @endif
<div class="row">
    
    <div id="reporttoka" class="col-lg-12">

        @foreach($rk as $rk)
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{-- {{$rk->name}}&nbsp;|&nbsp;{{$suggestion->hp}} --}}
                </div>
                <div class="panel-body">
                    <p>{!! str_limit($rk->report,100) !!}</p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-outline btn-primary" href="{{route('reporttoka.show',$rk->id)}}">
                        View
                    </a>
                    &nbsp;
                    @if (!Auth::user()->hasRole('foster_brother'))
                        
                        <a class="btn btn-outline btn-primary" href="{{route('reporttoka.edit',$rk->id)}}">
                                Edit
                            </a>
                        <form class="rfloat" action="{{route('reporttoka.destroy',$rk->id)}}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                        <button class="btn btn-outline btn-danger">Delete</button>&nbsp;
                        </form>
                        
                    @endif
                    
                    <i style="float: right; padding-top: 10px;">{{ $rk->created_at->diffForHumans()}}</i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
@endsection