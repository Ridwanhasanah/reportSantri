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
				<div class="col-md-12" id="motor2" style="display: none; text-align: center; font-size: 15px;">
					<p >Jika sudah selesai menggunakan motor kamu bisa klik tombol selesai</p>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div id="info1" class="form-group">
						<label for="info" class="col-md-3 control-label">Keterangan</label>
						<div class="col-md-6">
							<textarea type="text" name="info" id="info" class="form-control" autofocus required></textarea>
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div style="display: none;" id="motor1" class="form-group">
						<label for="motor" class="col-md-3 control-label">Motor</label>
						<div class="col-md-6">
							<select name="motor" class="form-control">
								<option value="Astrea" >Astrea</option>
								<option value="Revo Hitam">Revo Hitam</option>
								<option value="Revo Merah">Revo Merah</option>
								<option value="Vega R">Vega-R</option>
							</select>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-save" >Selesai</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>