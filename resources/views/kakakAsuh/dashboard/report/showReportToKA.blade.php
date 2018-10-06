@extends('dashboard.masterdashboard')
@section('title')
Lihat Laporan
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Lihat Laporan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            {{-- <div class="panel-heading">
                {{$rk->name}}&nbsp;|&nbsp;{{$rk->hp}}
            </div> --}}
            <div class="panel-body">
                <p>{!! $rk->report !!}</p>
            </div>
            <div style="padding: 3%;" class="panel-footer">
                <i class="pull-right" >{{ $rk->created_at->diffForHumans()}}</i>
                @if (!Auth::user()->hasRole('foster_brother'))

                <form class="" action="{{route('reporttoka.destroy',$rk->id)}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                <button class="btn btn-outline btn-danger">Delete</button>&nbsp;
                </form>

                @endif
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
@endsection