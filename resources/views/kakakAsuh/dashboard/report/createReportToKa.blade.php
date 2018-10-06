@extends('dashboard.masterdashboard')
@section('title')
Laporan ke Kakak Asuh
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts.patrials.alerts')
            <h1 class="page-header">Buat Laporan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-lg-push-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Isi Laporan mu untuk Kakak Asuh
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('reporttoka.store')}}" method="post" role="form">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Laporan</label>
                                    <textarea class="form-control wysiwyg" name="report" id="report" cols="50" rows="10"></textarea>
                                </div>
                                <p id="x"></p>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary">
                                </div>
                             </form>
                        </div>
                     </div>
                 </div>
             </div>
        </div>
    </div>        
</div>    
@endsection