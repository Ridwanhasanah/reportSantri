@extends('dashboard.masterdashboard')
@section('title')
Ubah Target
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts.patrials.alerts')
            <h1 class="page-header">Goal</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lengkapi Target Mu Minggu ini
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-lg-3"></div>
                        <div class="col-lg-6 col-ld-pull-3">
                            <form action="{{route('goal.update',$goal->id)}}" method="post" role="form">
                            	{{csrf_field()}}
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label>Target</label>
                                    <input name="goal" class="form-control" value="{{$goal->goal}}">
                                </div>
                                <div class="form-group">
                                    <label>Option</label>
                                    <input name="option" class="form-control" value="{{$goal->option}}">
                                </div>
                                <div class="form-group">
                                    <label>Reality</label>
                                    <p><small>Isi dengan hasil target mu minggu ini,Contoh : masih kesulitan dalam membuat program</small></p>
                                    <input name="reality" class="form-control" value="{{$goal->reality}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input name="information" class="form-control" value="{{$goal->information}}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input name="when" id="datepicker" class="form-control" value="{{$goal->when}}">
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