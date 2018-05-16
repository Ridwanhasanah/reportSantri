@extends('layouts.app')
@section('title')
Resend Activation Email
@endsection
@section('content')

<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{route('auth.activate.resend')}}">
                        {{ csrf_field() }}
					<span class="login100-form-title p-b-43">
						@include('layouts.patrials.alerts')
						Kirim Ulang Aktivasi Email
					</span>
					
					
					<div class="wrap-input100 validate-input form-group{{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
						<span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                        
                    </div>
                    @if ($errors->has('email'))
                        <span style="color: red;" class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <br>
                    <br>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Kirim
						</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url({{asset('images/bg-01.jpg')}});">
				</div>
			</div>
		</div>
	</div>
@endsection