@extends('dashboard.masterdashboard')
@section('title')
All User
@endsection
@section('content')
{{-- =================================================================== --}}
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.patrials.alerts')
                    <h1 class="page-header">All User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables All User
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
                                    @if ($user->level != 1)

                                    <tr class="odd gradeX">
                                        <td>
                                            @if (count($user->photo) != 0)
                                                <div class="form-group">
                                                    <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('storage/photos/'.$user->photo)}}">
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('images/personal.png')}}">
                                                </div>
                                            @endif

                                            <b><a href="{{route('user.detail',$user->id)}}">{{ $user->name }}</a></b><br>
                                            <small>
                                                    <a style="float: left;" href="{{route('user.edit',$user->id)}}">Edit | </a>
                                                    <form style="float: left; color: red;" class="" action="" method="post">
                                                          {{ csrf_field() }}
                                                          {{ method_field('DELETE') }}
                                                          <a href="">
                                                            &nbsp;Delete | 
                                                            <input type="hidden">
                                                          </a>
                                                      </form>
                                                      <a style="float: left;" href="{{route('user.detail',$user->id)}}">&nbsp;View</a>
                                            </small>

                                        </td>
                                        <td>{{$user->department}}</td>
                                        <td>{{$user->date_birth}}</td>
                                        <td class="center">{{$user->address}}</td>
                                        <td class="center">{{$user->gender}}</td>
                                    </tr>
                                    @endif

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