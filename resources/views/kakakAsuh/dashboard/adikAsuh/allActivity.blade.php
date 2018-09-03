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
                </h4>
            </div>
            <div class="panel-body">
                <table id="activity-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100">Tanggal</th>
                            <th width="300">Kegiatan</th>
                            <th width="300">Hasil</th>
                            {{-- <th></th> --}}
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

    function data(){
      $('#activity-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('adik.api-activity',$idNow)}}",
                    columns:[
                      {data: 'when', name: 'when'},
                      {data: 'activity', name: 'activity'},
                      {data: 'result', name: 'result'},
                      // {data: 'action', name: 'action', ordertable: false, searchable:false}

                    ]
                  })
    }

    data()    
</script>
@endsection