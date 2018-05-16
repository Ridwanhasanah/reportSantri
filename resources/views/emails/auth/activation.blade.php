@component('mail::message')
# Aktivkan akunmu

Terima kasih telah mendaftar sebagai Kakak Asuh Pondok IT, Silahkan aktifkan akun ini 

@component('mail::button', ['url' => route('auth.activate',[
				'token' => $user->activation_token,
				'email' => $user->email
			] )
		] )
	Activate
@endcomponent

Terima Kasih,<br>
Pondok IT
{{-- {{ config('app.name') }} --}}
@endcomponent
