@extends('dashboard.masterdashboard')
@section('title')
Kegiatan Santri Hari Ini
@endsection
@section('content')
{{-- =================================================================== --}}
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.patrials.alerts')
                    <h1 class="page-header">Kegiatan Santri</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="blue">Kegiatan Santri Hari Ini</b></p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kegiatan</th>
                                        <th>Hasil</th>
                                        <th>Tindak Lanjut</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="rfontsize">

                                    @foreach ($activities as $activity)

                                        @if ($activity->user->department != 'Staff Pondok IT')
                                            
                                            @if ($activity->when == date('Y-m-d'))
                                                
                                            
                                            <tr class="odd gradeX">
                                                <td>
                                                    @if (count($activity->user->photo) != 0)
                                                        <div class="form-group">
                                                            <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('storage/photos/'.$activity->user->photo)}}">
                                                        </div>
                                                    @else
                                                        <div class="form-group">
                                                            <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('images/personal.png')}}">
                                                        </div>
                                                    @endif

                                                    <b>{{ $activity->user->name }}</b><br>
                                                </td>
                                                <td>{{$activity->activity}}</td>
                                                <td>{{$activity->result}}</td>
                                                <td>{{$activity->follow_up}}</td>
                                                <td>{{$activity->user->department}}</td>
                                                <td class="center">{{date('d F Y', strtotime($activity->when))}}</td>
                                            </tr>
                                            @endif
                                        @endif
                                    @endforeach

                                    
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kegiatan</th>
                                        <th>Hasil</th>
                                        <th>Tindak Lanjut</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                            </table>
                            {!! $activities->render() !!}
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
{{-- ====================================================== --}}
@endsection