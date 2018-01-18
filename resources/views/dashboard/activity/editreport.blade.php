@extends('dashboard.masterdashboard')
@section('title')
Edit Report
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        
        <div class="col-lg-12">
        @include('layouts.patrials.alerts')
            <h1 class="page-header">Report</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Isi Kegiatan mu hari ini
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-lg-3"></div>
                        <div class="col-lg-6 col-ld-pull-3">
                            <form action="{{route('report.update',$activity->id)}}" method="post" role="form">
                            	{{csrf_field()}}
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <input name="activity" class="form-control" value="{{$activity->activity}}">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label>Hasil</label>
                                    <input name="result" class="form-control" value="{{$activity->result}}">
                                </div>
                                <div class="form-group">
                                    <label>Tindak Lanjut</label>
                                    <input name="follow_up" class="form-control" value="{{$activity->follow_up}}" ">
                                </div>
                                <div class="form-group">
                                    <label>Kapan</label>
                                    <input name="when" id="datepicker" class="form-control" value="{{$activity->when}}">
                                </div>
                                <p id="x"></p>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary">
                                </div>
                             </form>
                        </div>
                        <div class="col-lg-3"></div>
                     </div>
                 </div>
             </div>
        </div>
    </div>        
</div>                    
@endsection