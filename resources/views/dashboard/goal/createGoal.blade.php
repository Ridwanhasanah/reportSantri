<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backup="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" class="form-horizontal" data-toggle="validator">
				{{csrf_field()}} {{ method_field('POST')}}
				<div class="modal-header">
					{{-- <button type="button" class="close" data-dismis="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> --}}
					<h3 class="modal-title"></h3>
				</div>

				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="activity" class="col-md-3 control-label">Target</label>
						<div class="col-md-6">
							<input type="text" name="goal" id="goal" class="form-control" autofocus required>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="result" class="col-md-3 control-label">Tindakan</label>
						<div class="col-md-6">
							<input type="text" name="option" id="option" class="form-control">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="follow_up" class="col-md-3 control-label">Kenyataan</label>
						<div class="col-md-6">
							<input type="text" name="reality" id="reality" class="form-control">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="follow_up" class="col-md-3 control-label">Keterangan</label>
						<div class="col-md-6">
							<input type="text" name="information" id="information" class="form-control">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
                        <label for="when" class="col-md-3 control-label">Tanggal</label>
                        <div class="col-md-6">
							<input type="text" name="when" id="datepicker" class="form-control when" required>
							<span class="help-block with-errors"></span>
							<p id="x"></p>
						</div>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-save">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>