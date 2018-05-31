@extends('dashboard.masterdashboard')
@section('title')
Semua Invoice
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Semua Invoice</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Semua Invoice</h4>
            </div>
            <div class="panel-body">
                <table id="invoice-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100">Invoice #</th>
                            <th width="300">Tanggal Invoice</th>
                            <th width="300">Total</th>
                            <th>Status</th>
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
  $('#invoice-table').DataTable({
    order: [[1,'desc']],
    processing: true,
    serverSide: true,
    ajax: "{{route('api.invoice')}}",
    columns:[
      {data:'invoice', name:'invoice'},
      {data:'created_at', name:'created_at'},
      {data:'price', name:'price'},
      {data:'action', name:'action'}
    ]
  })

  function detailInvoice(id){
    window.location = "{{url('invoice')}}"+"/"+id;
  }
</script>
@endsection