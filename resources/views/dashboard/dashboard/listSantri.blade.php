@extends('dashboard.masterdashboard')
@section('title')
Semua Santri {{$divisi}}
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Santri {{ucwords($divisi)}}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        @foreach($students as $student)
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 col">
                        @if (count($student->photo) != 0)
                            <div class="form-group">
                                <img height="120" width="150" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('storage/photos/'.$student->photo)}}">
                            </div>
                        @else
                            <div class="form-group">
                                <img height="120" width="150" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('images/personal.png')}}">
                            </div>
                        @endif
                    </div>
                    </div>
                    {{$student->name}}&nbsp;|&nbsp;{{$student->hp}}
                </div>
                <div class="panel-body">
                    <p><i><b>{{$student->quote}}</b></i></p>
                </div>
                {{-- <div class="panel-footer">
                    <a class="btn btn-outline btn-primary" href="{{route('student.show',$student->id)}}">
                        View
                    </a>
                    <form class="rfloat" action="{{route('student.destroy',$student->id)}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    <button class="btn btn-outline btn-danger">Delete</button>&nbsp;
                    </form>
                    <i style="float: right; padding-top: 10px;">{{ $student->created_at->diffForHumans()}}</i>
                </div> --}}
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.col-lg-12 -->
    {!! $students->render() !!}
</div>
<!-- /.row -->
</div>
@endsection