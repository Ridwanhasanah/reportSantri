@extends('dashboard.masterdashboard')
@section('title')
Semua Konfirmasi Transfer
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
      @include('layouts.patrials.alerts')
      <h1 class="page-header">Semua Konfirmasi Transfer</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Semua Konfirmasi Transfer</h4>
        </div>
        <div class="panel-body">
          <table id="confirmation-table" class="table table-striped">
            <thead>
              <tr>
                <th width="100">No Invoice #</th>
                <th width="100">Tanggal</th>
                <th width="100">Nama</th>
                <th width="100">HandPhone</th>
                <th width="100">Total</th>
                <th></th>
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
  var table = $('#confirmation-table').DataTable({
    order: [[1,'desc']],
    processing: true,
    serverSide: true,
    ajax: "{{route('api.confirmation-admin')}}",
    columns:[
    {data:'invoice', name:'invoice'},
    {data:'transfer', name:'transfer'},
    {data:'bill_name', name:'bill_name'},
    {data:'hp', name:'hp'},
    {data:'fund', name:'fund'},
    {data:'action', name:'action'}
    ]
  })

 //  function editInvoice(id){
 //   window.location = "{{url('invoice-admin')}}"+"/"+id+"/edit"
 // }


 /*Delete Data*/
 function deleteInvoice(id){
  var csrf_token = $('meta[name="csrf-token"]').attr('content');

  swal({
    title: 'Kamu yakin ?',
    text: "Data yang di hapus tidak akan kembali!",
    type: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Ya, Hapus ini!'
  }).then(function(){
    $.ajax({
      url: "{{ url('confirmation-admin') }}" + '/' + id,
      type: "DELETE",
      data: {'_mehtod' : 'DELETE', '_token' : csrf_token},
      success: function(data){
        table.ajax.reload();
        swal({
          title:'Berhasil',
          text: 'Data Sudah di hapus',
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


function detailInvoice(id){
  window.location = "{{url('confirmation-admin')}}"+"/"+id;
}
</script>
@endsection