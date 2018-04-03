@extends('dashboard.masterdashboard')
@section('title')
Dasbor
@endsection
@section('content')
<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            @include('layouts.patrials.alerts')
            <h1 class="page-header">Semua Target Mingguan dan Kegiatan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Semua Target Mingguan</h4>
                </div>
                <div class="panel-body">
                    <table id="goal-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="100">Tanggal</th>
                                <th width="300">Target</th>
                                <th width="300">Tindakan</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Semua Kegiatan</h4>
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
</div>
@endsection
@section('js')
<script type="text/javascript">
 $('#activity-table').DataTable({
    order: [[1, 'desc']],
    processing: true,
    serverSide: true,
    ajax: "{{route('api.activitysantri',$id)}}" ,
    columns:[
    {data: 'when', name: 'when'},
    {data: 'activity', name: 'activity'},
    {data: 'result', name: 'result'},
    // {data: 'action', name: 'action', ordertable: false, searchable:false}

    ]
})

 $('#goal-table').DataTable({
    order: [[1, 'desc']],
    processing: true,
    serverSide: true,
    ajax: "{{route('api.goalsantri',$id)}}",
    columns:[
    {data: 'when', name: 'when'},
    {data: 'goal', name: 'goal'},
    {data: 'option', name: 'option'},
    // {data: 'action', name: 'action', ordertable: false, searchable:false}

    ]
})
</script>
@endsection