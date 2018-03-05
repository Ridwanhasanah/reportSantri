@extends('dashboard.masterdashboard')
@section('title')
Santri {{ucwords($divisi)}}
@endsection
@section('content')
{{-- =================================================================== --}}
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.patrials.alerts')
                    <h1 class="page-header">Santri {{ucwords($divisi)}} </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="blue">Total Santri {{ucwords($divisi)}} <b class="red">{{$total}}</b></p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                    <tr class="odd gradeX">
                                        <td>
                                            @if ($user->photo != 0)
                                                <div class="form-group">
                                                    <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('storage/photos/'.$user->photo)}}">
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('images/personal.png')}}">
                                                </div>
                                            @endif

                                            <b><a href="{{route('user.show',$user->id)}}">{{ $user->name }}</a></b><br>
                                            <small>
                                                    <a style="float: left;" href="{{route('user.edit',$user->id)}}">
                                                        <button class="btn btn-success rbtn">
                                                            <i class="fa fa-pencil"></i>
                                                            <input type="hidden">
                                                        </button>
                                                    <a>
                                                    <form style="float: left; color: red;" class="" action="{{route('user.destroy',$user->id)}}" method="post">
                                                          {{ csrf_field() }}
                                                          {{ method_field('DELETE') }}
                                                          <button type="submit" class="btn btn-danger rbtn">
                                                            <i class="fa fa-trash-o"></i>
                                                            <input type="hidden">
                                                          </button>
                                                      </form>
                                                      <a style="float: left;" href="{{route('user.show',$user->id)}}">
                                                          <button class="btn btn-info rbtn">
                                                            <i class="fa fa-eye"></i>
                                                            <input type="hidden">
                                                        </button>
                                                      </a>
                                            </small>

                                        </td>
                                        <td>{{$user->department}}</td>
                                        <td>{{$user->date_birth}}</td>
                                        <td class="center">{{$user->address}}</td>
                                        <td class="center">{{$user->gender}}</td>
                                    </tr>
                                    @endforeach

                                    
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                            </table>
                            {!! $users->render() !!}
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