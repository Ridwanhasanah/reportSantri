@extends('dashboard.masterdashboard')
@section('title')
Dasbor
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <br>
        
        @if (Auth::user()->hasRole('master') || Auth::user()->hasRole('foster_brother') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher')) 

        @else
            @if (Auth::user()->status == 'Telah Dibiayai')
                <i class="btn-lg pull-right btn-success" >Telah Dibiayai</i>
            @elseif(Auth::user()->status == 'Mandiri')
                <i class="btn-lg pull-right btn-primary" >Sudah Mandiri</i>
            @else
            <i class="btn-lg pull-right btn-info" >Belum Di Biayai</i>
            @endif
        @endif
        <br>
        <br>
        <hr>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-code fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$programmer}}</div>
                        <div><b>Programmer</b></div>
                    </div>
                </div>
            </div>
            <a href="{{route('list.programmer')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-camera fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$multimedia}}</div>
                        <div><b>Multimedia</b></div>
                    </div>
                </div>
            </div>
            <a href="{{route('list.multimedia')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$imers}}</div>
                        <div><b>Imers</b></div>
                    </div>
                </div>
            </div>
            <a href="{{route('list.imers')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-lock fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$cyber}}</div>
                        <div><b>Cyber</b></div>
                    </div>
                </div>
            </div>
            <a href="{{route('list.cyber')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
@include('dashboard.dashboard.santri.dashboardSantri')
<!-- /.row -->
</div>
@endsection