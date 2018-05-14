@extends('dashboard.masterdashboard')
@section('title')
Semua Izin Motor
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Izin Motor</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Semua Izin Motor
                    <a onclick="createMotor()" class="btn btn-primary pull-right" style="margin-top: -8px;">Izin pakai motor</a>
                </h4>
            </div>
            <div class="panel-body">
                <table id="motor-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100">Pergi</th>
                            <th width="100">Pulang</th>
                            @if (Auth::user()->hasRole('teacher'))
                            <th width="100">Nama</th>
                            @endif
                            <th width="150">Motor</th>
                            <th >Keterangan</th>
                            <th width="150"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  @include('dashboard.motor.createMotor'){{-- menambahkan modal form tambah kegiatan --}}
</div> 
@endsection
@section('js')
@if($urls == 'motor') {{-- it is for the User general --}}
<script type="text/javascript">
    var table = $('#motor-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('api.motor')}}",
                    columns:[
                      {data: 'borrow', name: 'borrow'},
                      {data: 'return', name: 'return'},
                      {data: 'motor', name: 'motor'},
                      {data: 'info', name: 'info'},
                      {data: 'action', name: 'action', ordertable: false, searchable:false}

                    ]
                  })


    /*Tambah Data*/
      function createMotor(){ /*function ini di taro di <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Izin pakai motor</a>*/
        save_method = "add"; /*ini menentukan url yang akan d gunakan*/
        $('input[name=_method]').val('POST'); /*Untuk input post yanad ada di modal form, method_field()*/
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset(); /*untuk mereset form input*/
        $('.modal-title').text('Izin Pakai Motor'); /*untuk memberikan judul title kontak pada form h3 class="modal-title"></h3>*/
      }

      /*Edit Data*/
      function editMotor(id){
        save_method = 'edit';
        $('input[name=_method ]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{url('motor')}}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Selesai pinjam motor');

            $('#info1').hide();
            $('#motor1').hide();
            $('#motor2').show();

            $('#id').val(data.id);
            $('#borrow').val(data.borrow);
            $('#return').val(data.return);
            // $('#name').val(data.name);
            // if ($('#motor').val(data.motor) == ) {}
            // $('#motor').val(data.motor).attr('selected','selected');
            $('#info').val(data.info);

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

      /*Done*/
      function doneMotor(id){
        $.ajax({
              url : "{{ url('done/motor') . '/' }}" + id,
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
      }

      /*Delete Data*/
      function deleteMotor(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: 'Kamu yakin ?',
          text: "Data Izin Motor yang di hapus tidak akan kembali!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus ini!'
        }).then(function(){
          $.ajax({
            url: "{{ url('motor') }}" + '/' + id,
            type: "DELETE",
            data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              swal({
                title:'Berhasil',
                text: 'Izin motor Sudah di hapus',
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
            if (save_method == 'add'){ url = "{{ url('motor')}}";}
            else url = "{{ url('motor') . '/' }}" + id;

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
    var table = $('#motor-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('api.motor.admin')}}",
                    columns:[
                      {data: 'borrow', name: 'borrow'},
                      {data: 'return', name: 'return'},
                      {data: 'name', name: 'name'},
                      {data: 'motor', name: 'motor'},
                      {data: 'info', name: 'info'},
                      {data: 'action', name: 'action', ordertable: false, searchable:false}

                    ]
                  })


    /*Tambah Data*/
      function createMotor(){ /*function ini di taro di <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Izin pakai motor</a>*/
        save_method = "add"; /*ini menentukan url yang akan d gunakan*/
        $('input[name=_method]').val('POST'); /*Untuk input post yanad ada di modal form, method_field()*/
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset(); /*untuk mereset form input*/
        $('.modal-title').text('Izin Pakai Motor'); /*untuk memberikan judul title kontak pada form h3 class="modal-title"></h3>*/
      }

      /*Edit Data*/
      function editMotor(id){
        save_method = 'edit';
        $('input[name=_method ]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{url('santri/editmotor')}}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Ubah izin');

            $('#id').val(data.id);
            $('#borrow').val(data.borrow);
            $('#return').val(data.return);
            $('#name').val(data.name);
            $('#motor').val(data.motor);
            $('#info').val(data.info);
          },
          eror: function(){
            alert("Nothing Data");
          }
        });
      }

      /*Delete Data*/
      function deleteMotor(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: 'Kamu yakin ?',
          text: "Data Izin Motor yang di hapus tidak akan kembali!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus ini!'
        }).then(function(){
          $.ajax({
            url: "{{ url('motor') }}" + '/' + id,
            type: "DELETE",
            data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              swal({
                title:'Berhasil',
                text: 'Izin motor Sudah di hapus',
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
            if (save_method == 'add'){ url = "{{ route('adminmotor.store')}}";}
            else url = "{{ url('adminmotor') . '/' }}" + id;

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