@extends('dashboard.masterdashboard')
@section('title')
Semua {{$department}}
@endsection
@section('content')
{{-- =================================================================== --}}
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.patrials.alerts')
                    <h1 class="page-header">Semua {{$department}}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="blue">Total Seluruh Santri <b class="red">{{$santri}}</b></p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table id="user-table" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="300">Nama</th>
                                        <th width="300">Jurusan</th>
                                        <th width="200">Tanggal Lahir</th>
                                        <th width="300">Alamat</th>
                                        <th width="200">Jenis Kelamin</th>
                                        <th width="400">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @foreach ($users as $user)

                                    <tr class="odd gradeX">
                                        <td>
                                            @if (strlen($user->photo) != 0)
                                                <div class="form-group">
                                                    <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('storage/photos/'.$user->photo)}}">
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <img height="50" width="70" style="float: left; padding-left: 10px; padding-right: 10px;" src="{{asset('images/flower.jpg')}}">
                                                </div>
                                            @endif

                                            <b><a href="{{route('user.show',$user->id)}}">{{ $user->name }}</a></b><br>
                                        </td>
                                        <td>{{$user->department}}</td>
                                        <td>{{$user->date_birth}}</td>
                                        <td class="center">{{$user->address}}</td>
                                        <td class="center">{{$user->gender}}</td>
                                    </tr>

                                    @endforeach --}}

                                    
                                </tbody>
                                {{-- <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead> --}}
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
@section('js')
<script type="text/javascript">
    // get last url 
    function getLastUrl(){
        var url = window.location.pathname
        var split = url.split("/")
        var last = split.pop()
        return last
    }
    
    var table = $('#user-table').DataTable({
        order: [[1,'desc']],
        processing: true,
        serverSide: true,
        ajax:"/api-user/"+getLastUrl(),
        columns:[
            {data:'name', name:'name'},
            {data:'department', name:'department'},
            {data:'date_birth', name:'date_birth'},
            {data:'address', name:'address'},
            {data:'gender', name:'gender'},
            {data:'action', name: 'action', ordertable:false, searchable:false}
        ]
    })

    // Edit User
    function editUser(id){
        
        window.open("/user/"+id+"/edit")
        // window.open("{{route('user.edit',"id")}}")
        
    }

    // Detail User
    function detailUser(id){
        
        window.open("/user/"+id)
        // window.open("{{route('user.edit',"id")}}")
        
    }

    // Delete Data
    function deleteUser(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
            title: 'Kamu yakin ?',
            text: 'User yang di hapus tidak akan kembali!',
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus ini !'
        }).then(function(){
            $.ajax({
                url: "{{ url('user') }}"+'/'+id,
                type: 'DELETE',
                data: {'_method' : 'DELETE', '_token' : csrf_token},
                success: function(data){
                    table.ajax.reload();
                    swal({
                        title: 'Berhasil',
                        text: 'User sudah di hapus...',
                        type: 'success',
                        timer: '1500'
                    })
                },
                error: function(){
                    swal({
                        title: 'Oops',
                        text: 'Something went wrong',
                        type: 'error',
                        timer: '1500'
                    })
                }
            })
        })
    }
</script>
@endsection