@component('mail::message')
# Aktivkan akunmu

Terima kasih telah mendaftar sebagai Kakak Asuh Indonesia, Silahkan aktifkan akun ini 

@component('mail::button', ['url' => route('auth.activate',[
				'token' => $user->activation_token,
				'email' => $user->email
			] )
		] )
	Activate
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
