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
@if($urls == 'activity') {{-- it is for the User general --}}
<script type="text/javascript">
    var table = $('#activity-table').DataTable({
                    order: [[1, 'desc']],
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
          error: function(){
            swal({
                title: 'Oops',
                text: 'Something went wrong',
                type: 'error',
                timer: '1500'
              });
          }
        });
      }

      /*Delete Data*/
      function deleteActivity(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: 'Kamu yakin ?',
          text: "Data Kegiatan yang di hapus tidak akan kembali!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus ini!'
        }).then(function(){
          $.ajax({
            url: "{{ url('activity') }}" + '/' + id,
            type: "DELETE",
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              swal({
                title:'Berhasil',
                text: 'kegiatan Sudah di hapus',
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
                swal({
                  title: 'Berhasil',
                  type: 'success',
                  timer: '1500'
                })
              },
              error : function(){
                swal({
                  title: 'Oops',
                  text: 'Something Error',
                  type: 'error',
                  timer: '1500'
                })
              }
            });
            return false;
          }
        });
      });

</script>
@else
<script type="text/javascript">
    var table = $('#activity-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('santri.apireport',$id)}}" ,
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
          url: "{{url('santri/editreport')}}" + '/' + id + "/edit",
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
          error: function(){
            swal({
                title: 'Oops',
                text: 'Something went wrong',
                type: 'error',
                timer: '1500'
              });
          }
        });
      }

      /*Delete Data*/
      function deleteActivity(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: 'Kamu yakin ?',
          text: "Data Kegiatan yang di hapus tidak akan kembali!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus ini!'
        }).then(function(){
          $.ajax({
            url: "{{ url('activity') }}" + '/' + id,
            type: "DELETE",
            data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              swal({
                title:'Berhasil',
                text: 'kegiatan Sudah di hapus',
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


      $(function(){
        $('#modal-form form').validator().on('submit', function(e){
          if(!e.isDefaultPrevented()){
            var id = $('#id').val();
            if (save_method == 'add'){ url = "{{ route('santri.storereport',$id)}}";}
            else url = "{{ url('santri/editreport')}}"+ '/' + id;

            $.ajax({
              url : url,
              type : "POST",
              data : $('#modal-form form').serialize(),
              success : function(data){
                $('#modal-form').modal('hide');
                table.ajax.reload()
                swal({
                  title: 'Berhasil',
                  type: 'success',
                  timer: '1500'
                })
              },
              error : function(){
                swal({
                  title: 'Oops',
                  text: 'Something Error',
                  type: 'error',
                  timer: '1500'
                })
              }
            });
            return false;
          }
        });
      });

</script>
@endif
@endsection