<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Invoice Kakak Asuh</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{asset('assets/invoice/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{asset('assets/invoice/assets/css/custom-style.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />

</head>
<body>
 <div class="container">
     
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img width="auto" height="100" src="{{asset('assets/invoice/assets/img/Pondokit.png')}}" style="padding-bottom:20px;" /> 
         </div>
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
           <strong>  {{ucwords($invoice->user_name)}}</strong>
             <br />
                  <b>Alamat :</b> {{ucwords($invoice->address)}}
              <br />
                
             <br />
             <b>Telephone :</b> {{$invoice->hp}}
              <br />
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <h4>  <strong>Detail Pembayaran</strong></h4>
            <b>Total pembayaran :  {{$invoice->price}} </b>
              <br />
               <b>Status pembayaran :  {{ucwords($invoice->status)}} </b>
               <br />
               Tanggal invoice :  {{$invoice->created_at}}
              <br />
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Santri</th>
                                    <th>Bulan</th>
                                    <th>Paket</th>
                                     <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ ucwords(strtolower($invoice->user_santri))}}</td>
                                    <td>{{$invoice->amount_month}} bulan</td>
                                    <td>
                                      @if ($invoice->package == 108000)
                                        Paket A Rp 108.000,-
                                      @elseif ($invoice->package == 208000)
                                        Paket B Rp 180.000,-
                                      @else
                                        Paket C Rp 288.000,-
                                      @endif
                                    </td>
                                    <td>{{$invoice->price}}</td>
                                </tr>
                            </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5>  Total Pembayaran : Rp  {{$invoice->price}}</h5>
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
         {{-- <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
                    This is an electronic generated invoice so doesn't require any signature.

                 </li>
                 <li>
                     Please read all terms and polices on  www.yourdomaon.com for returns, replacement and other issues.

                 </li>
             </ol>
             </div> --}}
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

</body>
</html>
