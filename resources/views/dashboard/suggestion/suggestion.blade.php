@extends('dashboard.masterdashboard')
@section('title')
Semua Saran
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Saran</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        @foreach($suggestions as $suggestion)
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{$suggestion->name}}&nbsp;|&nbsp;{{$suggestion->hp}}
                </div>
                <div class="panel-body">
                    <p>{{ str_limit($suggestion->suggestion,100)}}</p>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-outline btn-info"><a style="text-decoration: none;" href="{{route('suggestion.show',$suggestion->id)}}">View</a></button>
                    <form class="rfloat" action="{{route('suggestion.destroy',$suggestion->id)}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    <button class="btn btn-outline btn-danger">Delete</button>&nbsp;
                    </form>
                    <i style="float: right; padding-top: 10px;">{{ $suggestion->created_at->diffForHumans()}}</i>
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