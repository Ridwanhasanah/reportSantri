<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backup="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="form-horizontal" data-toggle="validator">
                {{csrf_field()}} {{ method_field('PATCH')}}
                <div class="modal-header">
                    {{-- <button type="button" class="close" data-dismis="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                    <h3 class="modal-title">Ubah Password</h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" name="password" id="password" class="form-control">
                            <br><span class="errorval errorRegis" id="errorPassword"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="repass" class="col-md-3 control-label">Ulangi Password</label>
                        <div class="col-md-6">
                            <input type="password" name="repass" id="repass" class="form-control">
                            <br><span class="errorval errorRegis" id="errorRepass"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="update" class="btn btn-primary btn-save update" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>