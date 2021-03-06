@extends('dashboard.masterdashboard')
@section('title')
Semua Calon Santri {{$divisi}}
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Semua Calon Santri @if($divisi != 'register'){{ucwords($divisi)}}@else @endif</h1>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Semua Calon Santri @if($divisi != 'register'){{ucwords($divisi)}}@else @endif
                    {{-- <a onclick="" class="btn btn-primary pull-right" style="margin-top: -8px;">Tambah Kegiatan</a> --}}
                </h4>
            </div>
            <div class="panel-body">
                <table style="max-width: 110px;" id="register-table" class="table table-striped scrolltab">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th width="50px">Proses</th>
                          <th>Divisi</th>
                          <th width="100px">Tanggal Daftar</th>
                          <th>WhatsApp</th>
                          <th>IQ</th>
                          <th >Opsi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div> 
@endsection
@section('js')

    @if ($divisi == 'programmer')
      <script type="text/javascript">
        var table = $('#register-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('api.register.programmer') }}",
          columns:[
            {data: 'no', name: 'no'},
            {data: 'nama', name: 'nama'},
            {data: 'proses', name: 'proses'},
            {data: 'divisi', name: 'divisi'},
            {data: 'tgl_daftar', name: 'tgl_daftar'},
            {data: 'wa', name: 'wa'},
            {data: 'iq', name: 'iq'},
            {data: 'action', name: 'action', ordertable: false, searchable:false}
          ]
        })

        function showRegis(id){
          window.location = "{{url('register')}}"+'/'+ id;
        }
        function editRegis(id){
          window.location = "{{url('register')}}"+'/'+ id + '/edit';
        }
        /*Delete Data*/
        function deleteRegis(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');

          swal({
            title: 'Kamu yakin ?',
            text: "Data Pendaftar yang di hapus tidak akan kembali!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus ini!'
          }).then(function(){
            $.ajax({
              url: "{{ url('register') }}" + '/' + id,
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
      </script>
    @elseif ($divisi == 'multimedia')
      <script type="text/javascript">
       var table = $('#register-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('api.register.multimedia') }}",
          columns:[
            {data: 'no', name: 'no'},
            {data: 'nama', name: 'nama'},
            {data: 'proses', name: 'proses'},
            {data: 'divisi', name: 'divisi'},
            {data: 'tgl_daftar', name: 'tgl_daftar'},
            {data: 'wa', name: 'wa'},
            {data: 'iq', name: 'iq'},
            {data: 'action', name: 'action', ordertable: false, searchable:false}
          ]
        })

        function showRegis(id){
          window.location = "{{url('register')}}"+'/'+ id;
        }
        function editRegis(id){
          window.location = "{{url('register')}}"+'/'+ id + '/edit';
        }
        /*Delete Data*/
        function deleteRegis(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');

          swal({
            title: 'Kamu yakin ?',
            text: "Data Pendaftar yang di hapus tidak akan kembali!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus ini!'
          }).then(function(){
            $.ajax({
              url: "{{ url('register') }}" + '/' + id,
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
      </script>
    @elseif ($divisi == 'imers')
      <script type="text/javascript">
        var table = $('#register-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('api.register.imers') }}",
          columns:[
            {data: 'no', name: 'no'},
            {data: 'nama', name: 'nama'},
            {data: 'proses', name: 'proses'},
            {data: 'divisi', name: 'divisi'},
            {data: 'tgl_daftar', name: 'tgl_daftar'},
            {data: 'wa', name: 'wa'},
            {data: 'iq', name: 'iq'},
            {data: 'action', name: 'action', ordertable: false, searchable:false}
          ]
        })

        function showRegis(id){
          window.location = "{{url('register')}}"+'/'+ id;
        }
        function editRegis(id){
          window.location = "{{url('register')}}"+'/'+ id + '/edit';
        }
        /*Delete Data*/
        function deleteRegis(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');

          swal({
            title: 'Kamu yakin ?',
            text: "Data Pendaftar yang di hapus tidak akan kembali!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus ini!'
          }).then(function(){
            $.ajax({
              url: "{{ url('register') }}" + '/' + id,
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
      </script>
    @elseif ($divisi == 'cyber')
      <script type="text/javascript">
        var table = $('#register-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('api.register.cyber') }}",
          columns:[
            {data: 'no', name: 'no'},
            {data: 'nama', name: 'nama'},
            {data: 'proses', name: 'proses'},
            {data: 'divisi', name: 'divisi'},
            {data: 'tgl_daftar', name: 'tgl_daftar'},
            {data: 'wa', name: 'wa'},
            {data: 'iq', name: 'iq'},
            {data: 'action', name: 'action', ordertable: false, searchable:false}
          ]
        })

        function showRegis(id){
          window.location = "{{url('register')}}"+'/'+ id;
        }
        function editRegis(id){
          window.location = "{{url('register')}}"+'/'+ id + '/edit';
        }
        /*Delete Data*/
        function deleteRegis(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');

          swal({
            title: 'Kamu yakin ?',
            text: "Data Pendaftar yang di hapus tidak akan kembali!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus ini!'
          }).then(function(){
            $.ajax({
              url: "{{ url('register') }}" + '/' + id,
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
      </script>

    @else
      <script type="text/javascript">
        var table = $('#register-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('api.register') }}",
          columns:[
            {data: 'no', name: 'no'},
            {data: 'nama', name: 'nama'},
            {data: 'proses', name: 'proses'},
            {data: 'divisi', name: 'divisi'},
            {data: 'tgl_daftar', name: 'tgl_daftar'},
            {data: 'wa', name: 'wa'},
            {data: 'iq', name: 'iq'},
            {data: 'action', name: 'action', ordertable: false, searchable:false}
          ]
        })

        function showRegis(id){
          window.location = "{{url('register')}}"+'/'+ id;
        }
        function editRegis(id){
          window.location = "{{url('register')}}"+'/'+ id + '/edit';
        }
        /*Delete Data*/
      function deleteRegis(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
          title: 'Kamu yakin ?',
          text: "Data Pendaftar yang di hapus tidak akan kembali!",
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus ini!'
        }).then(function(){
          $.ajax({
            url: "{{ url('register') }}" + '/' + id,
            type: "DELETE",
            data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
            success: function(data){
              table.ajax.reload();
              swal({
                title:'Berhasil',
                text: 'Calon Santri Sudah di hapus',
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
    @endif

@endsection