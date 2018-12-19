@extends('layouts.app')
@section('title')
Login
@endsection
@section('content')

<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
					<span class="login100-form-title p-b-43">
						@include('layouts.patrials.alerts')
						Login to continue
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
					<div class="wrap-input100 validate-input form-group{{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Password is required">
						<input class="input100" type="password" name="password" required id="password">
						<span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        <br>
                        <br>
                        @if ($errors->has('password'))
                            <span style="color: red;" class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                       
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                    	<div class="contact100-form-checkbox">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

						<div>
							<a href="{{ route('password.request') }}" class="txt1">
								Forgot Password?
							</a>
						</div>
						<div>
							<a href="{{ route('auth.activate.resend') }}" class="txt1">
								Kirim Ulang Aktivasi Akun?
							</a>
						</div>

					</div>
			

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<a style="width:450px; height:50px; border-radius: 10px; line-height:250%;" href="/#register" type="submit" class="btn btn-success">
							DAFTAR
						</a>
					</div>
					
					{{--  <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>  --}}
				</form>

				<div class="login100-more" style="background-image: url({{asset('images/bg-01.jpg')}});">
				</div>
			</div>
		</div>
	</div>

{{--  ============================================================  --}}

@endsection