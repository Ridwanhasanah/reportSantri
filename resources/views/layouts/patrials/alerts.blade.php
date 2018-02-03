@if (session('success'))
	<div class="alert alert-success rupdate">
		{{session('success')}}
	</div>
@endif

@if (session('info'))
	<div class="alert alert-info rupdate">
		{{session('info')}}
	</div>
@endif

@if (session('danger'))
	<div class="alert alert-danger rupdate">
		{{session('danger')}}
	</div>
@endif