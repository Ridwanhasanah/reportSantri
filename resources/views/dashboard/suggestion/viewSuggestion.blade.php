@extends('dashboard.masterdashboard')
@section('title')
Lihat Saran
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Lihat Saran</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                {{$suggestion->name}}&nbsp;|&nbsp;{{$suggestion->hp}}
            </div>
            <div class="panel-body">
                <p>{{$suggestion->suggestion}}</p>
            </div>
            <div class="panel-footer">
                <i style="float: right; padding-top: 10px;">{{ $suggestion->created_at->diffForHumans()}}</i>

                <form class="" action="{{route('suggestion.destroy',$suggestion->id)}}" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                <button class="btn btn-outline btn-danger">Delete</button>&nbsp;
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
@endsection