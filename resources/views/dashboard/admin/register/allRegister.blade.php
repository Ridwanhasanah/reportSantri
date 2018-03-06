@extends('dashboard.masterdashboard')
@section('title')
Semua Calon Santri
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Semua Calon Santri</h1>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Semua Calon Santri
                    {{-- <a onclick="" class="btn btn-primary pull-right" style="margin-top: -8px;">Tambah Kegiatan</a> --}}
                </h4>
            </div>
            <div class="panel-body">
                <table style="max-width: 110px;" id="register-table" class="table table-striped scrolltab">
                    <thead>
                        <tr>
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
<script type="text/javascript">
  $('#register-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('api.register') }}",
    columns:[
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
</script>
@endsection