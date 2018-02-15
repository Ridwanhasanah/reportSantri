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

@if (session('amal'))
	<div class="alert alert-info rupdate">
		<h1>
			{{session('amal')}}&nbsp;<b><i class="fa fa-hand-o-right"><a style="color: #f00;" href="{{route('amaliyahcheck')}}">&nbsp;Klik disini</a></i></b>
		</h1>
	</div>
@endif