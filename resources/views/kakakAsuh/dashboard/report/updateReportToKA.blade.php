@extends('dashboard.masterdashboard')
@section('title')
Update Laporan
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Update Laporan</h1>
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
            <form class="form-group" action="{{route('reporttoka.update',$rk->id)}}" method="POST" role="form">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                <textarea class="form-control wysiwyg" name="report" id="report" cols="30" rows="10">{{$rk->report}}</textarea>
                <br>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
            </div>
            <div class="panel-footer">
                <i style="float: right; padding-top: 10px;">{{ $rk->created_at->diffForHumans()}}</i>

                <form class="" action="{{route('reporttoka.destroy',$rk->id)}}" method="post">
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