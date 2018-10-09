@extends('dashboard.masterdashboard')
@section('title')
{{$user->name}} Profil
@endsection
@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('assets/blue-profile/css/blue.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/blue-profile/css/print.css')}}" media="print"/>
<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="{{asset('assets/blue-profile/js/jquery-1.4.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/blue-profile/js/jquery.tipsy.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/blue-profile/js/cufon.yui.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/blue-profile/js/scrollTo.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/blue-profile/js/myriad.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/blue-profile/js/jquery.colorbox.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/blue-profile/js/custom.js')}}"></script>
<script type="text/javascript">
  Cufon.replace('h1,h2');
</script>
@endsection
@section('content')
<div id="wrapper">

  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <div class="col-md-3 col-lg-3 " align="center">
           @if (strlen($user->photo) ==0)
            <img alt="User Pic" src="{{asset('images/flower.jpg')}}" class="img-responsive"> 
          @else
            <img src="{{asset('storage/photos/'.$user->photo)}}" class="img-responsive"> 
          @endif 
         </div>
          {{-- <img class="portrait" src="{{asset('assets/blue-profile/images/image.jpg')}}" alt="John Smith" /> --}}
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 class="name">{{$user->name}} <br/>
              @if( $user->department !='Foster Brother')
              <span>{{$user->department}}</span>
              @endif
            </h1>
              <ul>
                <li class="ad">{{$user->address}}, {{$user->district}}, {{$user->city}}</li><br>
                <li class="mail">{{$user->email}}</li>
                <li class="tel">{{$user->hp}}</li>
                {{-- <li class="web">www.businessweb.com</li> --}}
              </ul>
            </div>
            <!-- End Personal Information -->
            <!-- Begin Social -->
            <div class="social">
              <ul>
                <li><a class='north' href="#" title="Download .pdf"><img src="{{asset('assets/blue-profile/images/icn-save.jpg')}}" alt="Download the pdf version" /></a></li>
                <li><a class='north' href="javascript:window.print()" title="Print"><img src="{{asset('assets/blue-profile/images/icn-print.jpg')}}" alt="" /></a></li>
                <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><img src="{{asset('assets/blue-profile/images/icn-contact.jpg')}}" alt="" /></a></li>
                <li><a class='north' href="#" title="Follow me on Twitter"><img src="{{asset('assets/blue-profile/images/icn-twitter.jpg')}}" alt="" /></a></li>
                <li><a class='north' href="#" title="My Facebook Profile"><img src="{{asset('assets/blue-profile/images/icn-facebook.jpg')}}" alt="" /></a></li>
              </ul>
            </div>
            @if(Auth::user()->id == $user->id)
            <a href="{{route('profile.edit',$user->id)}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><b>Edit</b><i class="glyphicon glyphicon-edit"></i></a>
            @endif
            <!-- End Social -->
          </div>
          <!-- Begin 1st Row -->
          <div class="entry">
            <h2>Tanggal Lahir</h2>
            <p>{{$user->date_birth}} , {{$user->birth_place}}</p>
          </div>
          <div class="entry">
            <h2>Jenis Kelamin</h2>
            <p>{{$user->gender}}</p>
          </div>
          {{-- <div class="entry">
            <h2>Hobi</h2>
            <p>{{$user->hobby}}</p>
          </div>
          <div class="entry">
            <h2>Quote</h2>
            <p>{{$user->quote}}</p>
          </div> --}}
          {{-- <div class="entry">
            <h2>Pengalaman</h2>
            <p>{{$user->experience}}</p>
          </div> --}}
          {{-- <div class="entry">
            <h2>Karya</h2>
            <p>{{$user->creation}}</p>
          </div> --}}
          {{-- <div class="entry">
            <h2>100 Cita-Cita Ku</h2>
              <div class="scrolltab">
                {!! $user->dream !!}
              </div>
          </div> --}}
          <!-- Begin 5th Row -->
            </div>
        <div class="clear"></div>
        <div class="paper-bottom"></div>
      </div>
      <!-- End Paper -->
    </div>
    <div class="wrapper-bottom"></div>
  </div>
  <!-- End Wrapper -->
@endsection