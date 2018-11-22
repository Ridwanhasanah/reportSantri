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

@if (session('register'))
<div class="alert alert-success rupdate">
	<p style="font-size:18px;" class="text-success"> Registrasi berhasil, Silahkan buka email anda untuk melakukan Vertifikasi, jika tidak memukannya anda bisa melihat di folder sosial/promosi/spam pada folder email anda, <br> Anda kesulitan bisa hubungi nomor berikut <br> 0857 1444 2664 </p>
</div>
@endif