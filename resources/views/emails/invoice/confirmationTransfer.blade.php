@component('mail::message')
Dear {{$order->user_name}},
Ini adalah email otomatis,Kami informasikan bahwa konfirmasi pembayaran Anda sudah kami terima sebesar {{$order->price}}, dan santri {{$order->user_santri}} telah menjadi adik asuh Anda.

Kami Ucapkan Terima kasih karna telah berdonasi sebagai Kakak Asuh, Semoga Allah Melipat gandakan amal Anda dan Allah Memberkahi Rizki Anda.

<br>
{{ config('app.name') }}
@endcomponent
