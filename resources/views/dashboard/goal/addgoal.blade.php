@extends('dashboard.masterdashboard')
@section('title')
Tambah Target
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts.patrials.alerts')
            <h1 class="page-header">Tabah Target</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Isi Target mu Minggu ini
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-lg-3"></div>
                        <div class="col-lg-6 col-ld-pull-3">
                            {{-- <form action="{{Auth::user()->level==1?route('santri.storegoal',$id):route('goal.addstore')}}" method="post" role="form"> --}}
                            <form action="{{route('goal.addstore')}}" method="post" role="form">
                            	{{csrf_field()}}
                                <div class="form-group">
                                    <label>Target</label>
                                    <input name="goal" class="form-control" placeholder="Contoh: Membuat Program kalkulator, Membuat Website">
                                </div>
                                <div class="form-group">
                                    <label>Option</label>
                                    <input name="option" class="form-control" placeholder="Isi dengan caramu mencapai target, Contoh : Menonton Video Tutorial">
                                </div>
                                <div class="form-group">
                                    <label>Reality</label>
                                    <input name="reality" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input name="information" class="form-control" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input name="when" id="datepicker" class="form-control">
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