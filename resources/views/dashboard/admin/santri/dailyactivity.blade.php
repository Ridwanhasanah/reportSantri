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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dailyActivity">
                                <thead>
                                    <tr>
                                        <th width="100" >Nama</th>
                                        <th width="300" >Kegiatan</th>
                                        <th width="300" >Hasil</th>
                                        <th width="300" >Tindak Lanjut</th>
                                        <th width="100" >Jurusan</th>
                                        <th width="100" >Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="rfontsize">

                                    {{-- @foreach ($activities as $activity)

                                        @if ($activity->department != 'Staff Pondok IT')
                                            
                                            @if ($activity->when == date('Y-m-d'))
                                                
                                            
                                            <tr class="odd gradeX">
                                                <td>
                                                    @if (strlen($activity->photo) != 0)
                                                        <div class="form-group">
                                                            <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('storage/photos/'.$activity->photo)}}">
                                                        </div>
                                                    @else
                                                        <div class="form-group">
                                                            <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('images/flower.jpg')}}">
                                                        </div>
                                                    @endif

                                                    <b>{{ $activity->name }}</b><br>
                                                </td>
                                                <td>{{$activity->activity}}</td>
                                                <td>{{$activity->result}}</td>
                                                <td>{{$activity->follow_up}}</td>
                                                <td>{{$activity->department}}</td>
                                                <td class="center">{{date('d F Y', strtotime($activity->when))}}</td>
                                            </tr>
                                            @endif
                                        @endif
                                    @endforeach

                                     --}}
                                </tbody>
                            </table>
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
@section('js')
    <script type="text/javascript">
    function getLastUrl(){
        var url = window.location.pathname
        var split = url.split("/")
        var last = split.pop()
        return last
    }
        $('#dailyActivity').DataTable({
            order: [[1,'desc']],
            processing: true,
            serverSide: true,
            ajax: "/api/dailyactivity/"+getLastUrl(),
            columns:[
                {data: "name", name: "name"},
                {data: "activity", name: "activity"},
                {data: "result", name: "result"},
                {data: "follow_up", name: "follow_up"},
                {data: "department", name: "department"},
                {data: "when", name: "when"}
            ],
        })
    </script>
@endsection