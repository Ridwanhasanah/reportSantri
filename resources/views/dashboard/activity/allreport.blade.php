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
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Semua Kegiatan
                    <a onclick="createActivity()" class="btn btn-primary pull-right" style="margin-top: -8px;">Tambah Kegiatan</a>
                </h4>
            </div>
            <div class="panel-body">
                <table id="activity-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100">Tanggal</th>
                            <th width="300">Kegiatan</th>
                            <th width="300">Hasil</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  @include('dashboard.activity.createActivity'){{-- menambahkan modal form tambah kegiatan --}}
</div> 
@endsection
@section('js')
<script type="text/javascript">
    var table = $('#activity-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('api.activity')}}",
                    columns:[
                      {data: 'when', name: 'when'},
                      {data: 'activity', name: 'activity'},
                      {data: 'result', name: 'result'},
                      {data: 'action', name: 'action', ordertable: false, searchable:false}

                    ]
                  })


    /*Tambah Data*/
      function createActivity(){ /*function ini di taro di <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Contact</a>*/
        save_method = "add"; /*ini menentukan url yang akan d gunakan*/
        $('input[name=_method]').val('POST'); /*Untuk input post yanad ada di modal form, method_field()*/
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset(); /*untuk mereset form input*/
        $('.modal-title').text('Tambah Kegiatan'); /*untuk memberikan judul title kontak pada form h3 class="modal-title"></h3>*/
      }

      /*Edit Data*/
      function editActivity(id){
        save_method = 'edit';
        $('input[name=_method ]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{url('activity')}}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Ubah Kegiatan');

            $('#id').val(data.id);
            $('#activity').val(data.activity);
            $('#result').val(data.result);
            $('#follow_up').val(data.follow_up);
            $('.when').val(data.when);
          },
          eror: function(){
            alert("Nothing Data");
          }
        });
      }

      /*Delete Data*/
      function deleteActivity(id){
        var popup =  confirm("Kamu yakin ingin menghapus Kegiatan ini ? ");
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        if (popup == true) {
          $.ajax({
            url: "{{ url('activity') }}" + '/' + id,
            type: "DELETE",
            data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              console.log(data);
            },
            error: function(){
              alert("Oops! Something Wrong!");
            }
          })
        }
      }


      $(function(){
        $('#modal-form form').validator().on('submit', function(e){
          if(!e.isDefaultPrevented()){
            var id = $('#id').val();
            if (save_method == 'add'){ url = "{{ url('activity')}}";}
            else url = "{{ url('activity') . '/' }}" + id;

            $.ajax({
              url : url,
              type : "POST",
              data : $('#modal-form form').serialize(),
              success : function(data){
                $('#modal-form').modal('hide');
                table.ajax.reload()
              },
              error : function(){
                alert(' Oops! Something error!');
              }
            });
            return false;
          }
        });
      });

</script>
@endsection

{{-- @section('content')
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
                        {{-- </tr>
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
@endsection --}}