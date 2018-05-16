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
            <div class="card" style="width: 18rem;">
                    @if (strlen($student->photo) != 0)
                            <img class="card-img-top" alt="Card image cap"src="{{asset('storage/photos/'.$student->photo)}}">
                    @else
                            <img class="card-img-top" alt="Card image cap"src="{{asset('images/personal.png')}}">
                    @endif
                  {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        {{-- <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                    <div class="col-xs-12">
                        @if (strlen($student->photo) != 0)
                            <div class="form-group" style="overflow: hidden; padding: 0; min-height:300px; max-height:300px;" >
                                <img style="max-height: auto; display: block; margin: auto; width: 100%;"  src="{{asset('storage/photos/'.$student->photo)}}">
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
                    <p><i><b>{{ str_limit($student->quote, 35) }}</b></i></p>
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
            {{-- </div> --}}
        {{-- </div> --}}
        @endforeach
    </div>
    <!-- /.col-lg-12 -->
    {!! $students->render() !!}
</div>
<!-- /.row -->
</div>
@endsection