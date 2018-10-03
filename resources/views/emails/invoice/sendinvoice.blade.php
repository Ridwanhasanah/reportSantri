@component('mail::message')
<img src="{{asset('images/pondokit.png')}}">
<br>
Dear {{$order->user_name}}
Kami informasikan bahwa kami telah menerbitkan invoice untuk Donasi Anda kepada kami. Berikut informasi detailnya:
<div class="container">
     
    <div class="row pad-top-botm ">
        <div class="col-lg-6 col-md-6 col-sm-6">
          
             <strong>   Kakak Asuh Pondok IT.</strong>
            <br />
                <i>Alamat :</i> Glagah Lor RT.02 No.64 ,
            <br />
                 Desa Tamanan, Kec. Banguntapan, 
            <br />
                Kab. Bantul, Daerah Istimewa Yogyakarta
            
       </div>
   </div>
   <div  class="row text-center contact-info">
       <div class="col-lg-12 col-md-12 col-sm-12">
           <hr />
           <span>
               <strong>Email : </strong>  info@pondokit.com 
           </span>
           <span>
               <strong>Telephone : </strong>  085228802828 
           </span>
           <hr />
       </div>
   </div>
   <div  class="row pad-top-botm client-info">
       <div class="col-lg-6 col-md-6 col-sm-6">
       <h4>  <strong>Informasi Kakak Asuh</strong></h4>
         <strong>  </strong>
           <br />
                <b>Alamat :</b> {{$order->address}}
            <br />
              
           <br />
           <b>Telephone :</b> {{$order->hp}}
            <br />
       </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          
             <h4>  <strong>Detail Pembayaran</strong></h4>
          <b>Total pembayaran :  {{$order->price}} </b>
            <br />
             <b>Status pembayaran : {{$order->status}} </b>
             <br />
            <b>No Invoice : {{$order->invoice}}</b> 
            <br />
             Tanggal invoice :  {{date_format($order->created_at," d - m - Y ")}}
            <br />
            <br />
       </div>
   </div>
   <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12">
         <div class="table-responsive">
                              <table style="border: 1px solid #000; padding: 30px;
                              border-radius: 5px;" class="table table-striped table-bordered table-hover">
                          <thead style="border: 1px solid #000;">
                              <tr>
                                  <th width="500" >Nama Santri</th>
                                  <th width="500">Bulan</th>
                                  <th width="500">Paket</th>
                                   <th width="500">Total</th>
                              </tr>
                          </thead>
                          <tbody style="border: 1px solid #000;">
                              <tr>
                              <td width="500">{{$order->user_santri}}</td>
                                  <td width="500">{{$order->amount_month}} bulan</td>
                                  <td width="500">
                                    @if ($order->package == 108000)
                                      Paket A Rp 108.000,-
                                    @elseif ($order->package == 208000)
                                      Paket B Rp 180.000,-
                                    @else
                                      Paket C Rp 288.000,-
                                    @endif
                                  </td>
                                  <td width="500">{{$order->price}}</td>
                              </tr>
                          </tbody>
                      </table>
             </div>
           <hr />
           <div class="ttl-amts">
           <h5>  Total Pembayaran : Rp  {{$order->price}}</h5>
           </div>
           <hr />
            <div class="ttl-amts">
                <h5>   </h5>
           </div>
           <hr />
            <div class="ttl-amts">
                {{-- <h4> <strong>Bill Amount : 990 USD</strong> </h4> --}}
           </div>
       </div>
   </div>
    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12">
          <strong> Anda Dapat mentransfer ke rekening berikut: </strong>
           <ol>
                <li>
                  BNI 0276409213 (Kode 009) Atas Nama Pondok IT

               </li>
               <li>
                  Mandiri Syariah 7528802828 Atas Nama Pondok IT
               </li>
               <li>
                  BCA  8465039848  (Kode 014) Atas Nama Rulli Indrawan
               </li>
               <li>
                  Mandiri 1370009976966 (kode 008) Atas Nama Rulli Indrawan
               </li>
           </ol>
           </div>
       </div>
    <div class="row pad-top-botm">
       {{-- <div class="col-lg-12 col-md-12 col-sm-12">
           <hr />
           <a href="#" class="btn btn-primary btn-lg" >Print Invoice</a>
           &nbsp;&nbsp;&nbsp;
            <a href="#" class="btn btn-success btn-lg" >Download In Pdf</a>

           </div> --}}
       </div>
</div>
@component('mail::button', ['url' => route('confirmation.create')])
        Konfirmasi Pembayaran
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
