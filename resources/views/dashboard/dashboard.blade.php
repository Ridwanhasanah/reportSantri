@extends('dashboard.masterdashboard')
@section('title')
Dashboard
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Target</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	{{-- ===== Goal Start ====--}}
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Goal
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Goal</th>
                            <th>Option</th>
                            <th>Reality</th>
                            <th>Kapan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($goals as $goal)
                    		<tr class="odd gradeX">
                            <td>
                                {{$goal->goal}}<br>
                                <small>
                                    <form style="float: left; color: red;" class="" action="{{route('goal.delete',$goal->id)}}" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>&nbsp;Hapus
                                        <input type="hidden">
                                      </button>
                                </form>
                                &nbsp;
                                <a href="{{route('goal.edit',$goal->id)}}">
                                <button class="btn btn-success">
                                        <i class="fa fa-pencil"></i>&nbsp; Edit
                                        <input type="hidden">
                                </button>
                                </a>
                                </small>

                            </td>
                            <td>{{$goal->option}}</td>
                            <td>{{$goal->reality}}</td>
                            <td class="center">{{$goal->when}}</td>
                            <td class="center">{{$goal->created_at}}</td>
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
                {!! $goals->render() !!}
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>DataTables Usage Information</h4>
                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    {{-- ===== Goal End =====--}}
    <!-- /.col-lg-12 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Kegiatan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Kegiatan</th>
                            <th>Hasil</th>
                            <th>Tindak Lanjut</th>
                            <th>Kapan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($activities as $activity)
                    		<tr class="odd gradeX">
                            <td>
                                {{$activity->activity}}<br>
                                <small>
                                    <form style="float: left; color: red;" class="" action="{{route('report.delete',$activity->id)}}" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>&nbsp;Hapus
                                        <input type="hidden">
                                      </button>
                                </form>
                                &nbsp;
                                <a href="{{route('report.edit',$activity->id)}}">
                                <button class="btn btn-success">
                                        <i class="fa fa-pencil"></i>&nbsp; Edit
                                        <input type="hidden">
                                </button>
                                </a>
                                </small>

                            </td>
                            <td>{{$activity->result}}</td>
                            <td>{{$activity->follow_up}}</td>
                            <td class="center">{{$activity->when}}</td>
                            <td class="center">{{$activity->created_at}}</td>
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
                {!! $activities->render() !!}
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>DataTables Usage Information</h4>
                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->
</div>
@endsection