<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backup="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" class="form-horizontal" data-toggle="validator">
				{{csrf_field()}}
				<div class="modal-header">
					{{-- <button type="button" class="close" data-dismis="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> --}}
					<h3 class="modal-title">Reset Password</h3>
				</div>

				<div class="modal-body">
					<div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							<span class="help-block with-errors"></span>
							<p id="x"></p>
						</div>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-save" >Reset Password</button>
				</div>
			</form>
		</div>
	</div>
</div>