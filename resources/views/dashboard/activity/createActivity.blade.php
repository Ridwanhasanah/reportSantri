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
						<label for="activity" class="col-md-1 control-label">Kegiatan</label>
						<div class="col-md-11">
							<textarea type="text" name="activity" id="activity" class="form-control" autofocus required></textarea>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="result" class="col-md-1 control-label">Hasil</label>
						<div class="col-md-11">
							<input type="text" name="result" id="result" class="form-control">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="follow_up" class="col-md-1 control-label">Tindak Lanjut</label>
						<div class="col-md-11">
							<input type="text" name="follow_up" id="follow_up" class="form-control">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
                        <label for="when" class="col-md-1 control-label">Tanggal</label>
                        <div class="col-md-11">
							<input type="text" name="when" id="datepicker" class="form-control when" required>
							<span class="help-block with-errors"></span>
							<p id="x"></p>
						</div>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-save" >Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>