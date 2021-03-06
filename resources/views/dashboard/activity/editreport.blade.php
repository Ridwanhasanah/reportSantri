@extends('dashboard.masterdashboard')
@section('title')
Ubah Kegiatan
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        
        <div class="col-lg-12">
        @include('layouts.patrials.alerts')
            <h1 class="page-header">Kegiatan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Lengkapi Kegiatan mu hari ini
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
                                </div>
                                <div class="form-group">
                                    <label>Hasil</label>
                                    <input name="result" class="form-control" value="{{$activity->result}}" placeholder="Contoh : Berhasil Membuat Program, Menyelesaikan Video Tuttorial ">
                                </div>
                                <div class="form-group">
                                    <label>Tindak Lanjut</label>
                                    <p><small>isi dengan perbaikanmu hari ini, Contoh : Menyempurnakan Desain yang sudah di buat</small></p>
                                    <input name="follow_up" class="form-control" value="{{$activity->follow_up}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
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