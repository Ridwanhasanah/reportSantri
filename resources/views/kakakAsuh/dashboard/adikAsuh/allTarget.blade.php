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
                </h4>
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
  </div>
  @include('dashboard.goal.createGoal'){{-- menambahkan modal form tambah Target --}}
</div> 
@endsection
@section('js')
<script type="text/javascript">
   function data(){
    $('#goal-table').DataTable({
                    order: [[1, 'desc']],
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('adik.api-target',$idNow)}}",
                    columns:[
                      {data: 'when', name: 'when'},
                      {data: 'goal', name: 'goal'},
                      {data: 'option', name: 'option'},
                      // {data: 'action', name: 'action', ordertable: false, searchable:false}

                    ]
                  })
   }

   data()

</script>
@endsection