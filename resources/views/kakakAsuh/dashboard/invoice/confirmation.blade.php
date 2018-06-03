@extends('dashboard.masterdashboard')
@section('title')
Semua Invoice
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">Konfirmasi</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Konfirmasi</h4>
            </div>
            <div class="panel-body">
              <form action="{{route('confirmation.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label>No Invoice</label>
                  <input required value="{{old('invoice')}}" class="form-control" name="invoice" id="invoie">
                </div>
                <div class="form-group">
                  <label>Tangga Tranfer</label>
                  <input value="{{old('date')}}"  required class="form-control" type="date" name="transfer" id="datepicker">
                </div>
                <div class="form-group">
                  <label>Jumlah Dana</label>
                  <input required class="form-control" type="number" name="fund" id="fund">
                </div>
                <div class="form-group">
                  <label>Nama Pemilik Rekening</label>
                  <input required class="form-control" type="text" name="bill_name" id="bill_name">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea rows="5" class="form-control" type="text" name="information" id="information"></textarea>
                </div>
                <div class="form-group">
                  <label>Bukti upload</label>
                  <input class="form-control" type="file" name="photo" id="photo">
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Kirim" >
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
</div> 
@endsection