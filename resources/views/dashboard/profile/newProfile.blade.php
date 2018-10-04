<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile {{$user->name}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/newProfile.css')}}">
    <link rel="shortcut icon" href="{{ asset('Logo IT ICON.png') }}" > 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Sue+Ellen+Francisco" rel="stylesheet">
</head>

<body>
    <!-- Navbar start -->
    <nav style="font-size: 1.5em" class="navbar navbar-expand-lg menu">
        <a class="navbar-brand" href="{{route('dashboard.home')}}">Beranda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i style="color:white;" class="fa fa-bars"></i></span>
          </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" target="_blank" href="http://pondokit.com">Pondok IT <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbat End -->
    <!-- <div class="container-fluid">
        <div class="row">
                <div class="video-background">
                    <div class="video-foreground">
                        <iframe width="100%" height="90%" src="https://www.youtube.com/embed/maw1XuVX72Y?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=maw1XuVX72Y" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div id="vidtop-content">
                    <div class="vid-info">
                            <h1>YouTube Fullscreen Background Demo</h1>
                            <p>The International Space Station orbits the Earth every 92 minutes, with its crew seeing a sunrise 15 times a day. It exists as a scientific, educational, and engineering platform in low orbit, 330 to 435 kilometres above the Earth.
                            <p>Original timelapse by Riccardo Rossi (ISAA), used under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License. Raw photos courtesy of http://eol.jsc.nasa.gov/
                            <a href="/500/Use-YouTube-Videos-as-Fullscreen-Web-Page-Backgrounds">Full article</a>
                    </div>
                </div>
        </div>
    </div> -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="px-0 col-lg-6 col-md-6">
            <img class="profile" src="{{asset('storage/photos/'.$user->photo)}}" alt="">
                <div class="profile-name">
                    <h3> <b id="name">{{$user->name}}</b> - <b id="asal">{{$user->city}}</b>,</h3>
                    <h3 id="divisi">{{$user->department}}</h3>
                </div>
            </div>
            <div class="p-5 col-lg-6 col-md-6 text-center experience">
              
                <h1>Pengalaman</h1>
                <div class="scrolltab" id="experience">{!! $user->experience !!}</div>
                                               
            </div>
            
        </div>
        
    </div>
    <div class="container-fluid my-0">
        <div class="row">
            <div class="p-5 col-lg-6 col-md-6 text-center work">
                    <h1 id="work">Karya</h1>
                    <div class="scrolltab">{!! $user->creation !!}</div>
            </div>
            <div class="p-5 col-lg-6 col-md-6 text-center hobby">
                <h1 id="hobby">Hobby</h1>
                <div class="scrolltab">{!! $user->hobby !!}</div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-0 empty">
        <div class="row py-5">
            <div class="p-5 text-center" >
                <h2>{{$user->quote}}</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid my-0">
        <div class="row">
            <div class="p-5 col-lg-6 col-md-6 text-center contact">
                <div class="row">
                        <div class="col-lg-6 col-md-6 p-5">
                            <i class="far fa-envelope icon-size"></i>
                            <h3 class="my-2" id="email">{{$user->email}}</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 p-5">
                            <i class="fas fa-phone icon-size"></i>
                            <h3 class="my-2" id="phone">{{$user->hp}}</h3>
                        </div>
                </div>
            </div>
            <div class="p-5 col-lg-6 col-md-6 text-center dream">
                <h1 id="dream">100 Impian Ku</h1>
                <div class="scrolltab">{!! $user->dream !!}</div>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
