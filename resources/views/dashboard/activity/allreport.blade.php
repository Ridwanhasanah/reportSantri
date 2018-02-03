@extends('dashboard.masterdashboard')
@section('title')
Semua Kegiatan
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Kegiatan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- @if (Auth::user()->level == 1)
                     <a class="btn btn-primary" href="{{route('santri.createreport',$id)}}">Tambah Kegiatan</a><br>
                @else
                    <a class="btn btn-primary" href="{{route('report.add')}}">Tambah Kegiatan</a><br>
                @endif -->
                <b> Semua Kagiatan </b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Kegiatan</th>
                            <th>Hasil</th>
                            <th>Tindak Lanjut</th>
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
                                      <button type="submit" class="btn btn-danger rbtn">
                                        <i class="fa fa-trash-o"></i>
                                        <input type="hidden">
                                      </button>
                                </form>
                                &nbsp;
                                <a href="{{route('report.edit',$activity->id)}}">
                                <button class="btn btn-success rbtn">
                                        <i class="fa fa-pencil"></i>
                                        <input type="hidden">
                                </button>
                                </a>
                                </small>

                            </td>
                            <td>{{$activity->result}}</td>
                            <td>{{$activity->follow_up}}</td>
                            <td class="center">{{$activity->when}}</td>
                            {{--  <td class="center">{{$activity->created_at->diffForHumans()}}</td>  --}}
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
                {!! $activities->render() !!}
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
@endsection