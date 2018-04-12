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
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="input-checkbox100">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="{{ route('password.request') }}" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
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
		 @include('auth.passwords.popupEmail'){{-- menambahkan modal form forget email --}}
	</div>

{{--  ============================================================  --}}

@endsection
@section('js')
<script type="text/javascript">
	function email(){
		$('input[name=_method]').val('POST'); /*Untuk input post yang ada di modal form, method_field()*/
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset(); /*untuk mereset form input*/
	}

	$(function(){
        $('#modal-form form').validator().on('submit', function(e){
          if(!e.isDefaultPrevented()){
            $.ajax({
              url : "{{ route('password.email') }}",
              type : "GET",
              data : $('#modal-form form').serialize(),
              success : function(data){
                $('#modal-form').modal('hide');
                swal({
                  title: 'Berhasil',
                  text: 'Kami telah mengirimkan email reset password ke emailmu',
                  type: 'success',
                  timer: '4000'
                })
              },
              error : function(){
                swal({
                  title: 'Oops',
                  text: 'Something Error',
                  type: 'error',
                  timer: '1500'
                })
              }
            });
            return false;
          }
        });
      });
</script>
@endsection
