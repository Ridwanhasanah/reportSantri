@extends('dashboard.masterdashboard')
@section('title')
Semua Target
@endsection

@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Target</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{-- @if (Auth::user()->level == 1)
                     <a class="btn btn-primary" href="{{route('santri.creategoal',$id)}}">Tambah Target</a><br>
                @else
                    <a class="btn btn-primary" href="{{route('report.add')}}">Tambah Target</a><br>
                @endif --}}
                <b>Semua Target</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Target</th>
                            <th>Option</th>
                            <th>Reality</th>
                            <th>Keterangan</th>
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
                                      <button type="submit" class="btn btn-danger rbtn">
                                        <i class="fa fa-trash-o"></i>
                                        <input type="hidden">
                                      </button>
                                </form>
                                &nbsp;
                                <a href="{{route('goal.edit',$goal->id)}}">
                                <button class="btn btn-success rbtn">
                                        <i class="fa fa-pencil"></i>
                                        <input type="hidden">
                                </button>
                                </a>
                                </small>

                            </td>
                            <td>{{$goal->option}}</td>
                            <td>{{$goal->reality}}</td>
                            <td>{{$goal->information}}</td>
                            <td class="center">{{$goal->when}}</td>
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
                {!! $goals->render() !!}
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