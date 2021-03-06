@extends('dashboard.masterdashboard')
@section('title')
Semua Kegiatan
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Target Mingguan</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Semua Target Mingguan
                    <a onclick="createGoal()" class="btn btn-primary pull-right" style="margin-top: -8px;">Tambah Target</a>
                </h4>
            </div>
            <div class="panel-body">
                <table id="goal-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100">Tanggal</th>
                            <th width="300">Target</th>
                            <th width="300">Tindakan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  @include('dashboard.goal.createGoal'){{-- menambahkan modal form tambah Target --}}
</div> 
@endsection
@section('js')
@if($urls == 'goal')
<script type="text/javascript">
   var table = $('#goal-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('api.goal')}}",
                    columns:[
                      {data: 'when', name: 'when'},
                      {data: 'goal', name: 'goal'},
                      {data: 'option', name: 'option'},
                      {data: 'action', name: 'action', ordertable: false, searchable:false}

                    ]
                  })

    /*Tambah Data*/
      function createGoal(){ /*function ini di taro di <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Contact</a>*/
        save_method = "add"; /*ini menentukan url yang akan d gunakan*/
        $('input[name=_method]').val('POST'); /*Untuk input post yanad ada di modal form, method_field()*/
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset(); /*untuk mereset form input*/
        $('.modal-title').text('Tambah Target Mingguan'); /*untuk memberikan judul title kontak pada form h3 class="modal-title"></h3>*/
      }

      /*Edit Data*/
      function editGoal(id){
        save_method = 'edit';
        $('input[name=_method ]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{url('goal')}}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Ubah Target Mingguan');

            $('#id').val(data.id);
            $('#goal').val(data.goal);
            $('#option').val(data.option);
            $('#reality').val(data.reality);
            $('#information').val(data.information);
            $('.when').val(data.when);
          },
          eror: function(){
            alert("Nothing Data");
          }
        });
      }


      /*Delete Data*/
      function deleteGoal(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: 'Kamu yakin ?',
          text: "Data Target yang di hapus tidak akan kembali!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus ini!'
        }).then(function(){
          $.ajax({
            url: "{{ url('goal') }}" + '/' + id,
            type: "DELETE",
            data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              swal({
                title:'Berhasil',
                text: 'Target Sudah di hapus',
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
            if (save_method == 'add'){ url = "{{ url('goal')}}";}
            else url = "{{ url('goal') . '/' }}" + id;

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
   var table = $('#goal-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('santri.apigoal', $id)}}",
                    columns:[
                      {data: 'when', name: 'when'},
                      {data: 'goal', name: 'goal'},
                      {data: 'option', name: 'option'},
                      {data: 'action', name: 'action', ordertable: false, searchable:false}

                    ]
                  })

    /*Tambah Data*/
      function createGoal(){ /*function ini di taro di <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Contact</a>*/
        save_method = "add"; /*ini menentukan url yang akan d gunakan*/
        $('input[name=_method]').val('POST'); /*Untuk input post yanad ada di modal form, method_field()*/
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset(); /*untuk mereset form input*/
        $('.modal-title').text('Tambah Target Mingguan'); /*untuk memberikan judul title kontak pada form h3 class="modal-title"></h3>*/
      }

      /*Edit Data*/
      function editGoal(id){
        save_method = 'edit';
        $('input[name=_method ]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{url('santri/editgoal')}}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Ubah Target Mingguan');

            $('#id').val(data.id);
            $('#goal').val(data.goal);
            $('#option').val(data.option);
            $('#reality').val(data.reality);
            $('#information').val(data.information);
            $('.when').val(data.when);
          },
          eror: function(){
            alert("Nothing Data");
          }
        });
      }


      /*Delete Data*/
      function deleteGoal(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: 'Kamu yakin ?',
          text: "Data Target yang di hapus tidak akan kembali!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus ini!'
        }).then(function(){
          $.ajax({
            url: "{{ url('goal') }}" + '/' + id,
            type: "DELETE",
            data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              swal({
                title:'Berhasil',
                text: 'Target Sudah di hapus',
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
            if (save_method == 'add'){ url = "{{ route('santri.storegoal',$id)}}";}
            else url = "{{ url('santri/editgoal') }}"+ '/'  + id;

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