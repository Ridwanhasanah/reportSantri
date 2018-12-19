@extends('dashboard.masterdashboard')
@section('title')
Semua Invoice
@endsection

@section('content')

<div id="page-wrapper"">
	<div class="row">
		<div class="col-lg-12">
			@include('layouts.patrials.alerts')
			<h1 class="page-header">Edit Invoice</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Invoice</h3>
				</div>
				
					<form method="post" action="{{route('invoice-admin.update',$invoice->id)}}" class="form-horizontal" data-toggle="validator">
						{{csrf_field()}} {{ method_field('PATCH')}}
						<div class="panel-body">
							<div class="form-group">
								<label for="invoice" class="col-md-2 col-md-offset-1 control-label">Kakak Asuh</label>
								<div class="col-md-8">
									<input readonly="" type="text" value="{{ucwords(strtolower($invoice->user_name))}}" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="invoice" class="col-md-2 col-md-offset-1 control-label">Santri</label>
								<div class="col-md-8">
									<input readonly="" type="text" value="{{ucwords(strtolower($invoice->user_santri))}}" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="invoice" class="col-md-2 col-md-offset-1 control-label">No.Invoice</label>
								<div class="col-md-8">
									<input readonly type="number" name="invoice" id="invoice" value="{{$invoice->invoice}}" class="form-control" autofocus required>
									<span class="help-block with-errors"></span>
								</div>
							</div>

							<div class="form-group">
								<label for="package" class="col-md-2 col-md-offset-1 control-label">Paket</label>
								<div class="col-md-8">
									<select name="package" id="package" class="form-control">
										<option value="108000" {{$invoice->package == 108000?'selected':''}}>Paket A Rp 108.000,-</option>
										<option value="180000" {{$invoice->package == 180000?'selected':''}}>Paket B Rp 180.000,-</option>
										<option value="288000" {{$invoice->package == 288000?'selected':''}}>Paket C Rp 288.000,-</option>
									</select>
									<span class="help-block with-errors"></span>
								</div>
							</div>

							<div class="form-group">
								<label for="amount_month" class="col-md-2 col-md-offset-1 control-label">Total Bulan</label>
								<div class="col-md-2">
									<input type="number" name="amount_month" id="amount_month" class="form-control" value="{{$invoice->amount_month}}">
									<span class="help-block with-errors"></span>
								</div>
								<div class="col-md-6"><label class="control-label">bulan</label></div>
							</div>

							<div class="form-group">
		                        <label for="price" class="col-md-2 col-md-offset-1 control-label">Total</label>
								<div class="col-md-1"><label class="control-label">Rp. </label></div>
		                        <div class="col-md-7">
									<input type="number" name="price" id="price" value="{{$invoice->price}}" class="form-control" required>
									<span class="help-block with-errors"></span>
								</div>
		                    </div>

		                    <div class="form-group">
								<label for="status" class="col-md-2 col-md-offset-1 control-label">Status</label>
								<div class="col-md-8">
									<select name="status" class="form-control" id="status">
										<option value="paid" {{$invoice->status=='paid'?'selected':''}}>Sudah Bayar</option>
										<option value="unpaid" {{$invoice->status=='unpaid'?'selected':''}}>Belum Bayar</option>
										<option value="canceled" {{$invoice->status=='canceled'?'selected':''}}>Batal</option>
										<option value="refunded" {{$invoice->status=='refunded'?'selected':''}}>Di Kembalikan</option>
									</select>
									<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2 col-md-offset-1">
									
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<input class="btn btn-primary" type="submit" class="form-control" name="submit" id="submit" value="Ubah">
						</div>
					</form>
				
			</div>
		</div>
	</div>
</div>
@endsection