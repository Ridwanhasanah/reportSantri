<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- Pondokit Ridwan Css Start--}}
    <link rel="stylesheet" href="{{asset('css/cssPondokit.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/profile.css')}}">    --}}
    {{-- Pondokit Ridwan Css End--}}

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    <link href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- DataTables --}}
    <link href="{{asset('dashboard/vendor/datatables/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">

    {{-- SweetAlert2 --}}
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('dashboard/vendor/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('dashboard/vendor/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- MetisMenu CSS -->
    <link href="{{asset('dashboard/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dashboard/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('dashboard/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('dashboard/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Kegiatan Santri Pondok IT</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('profile')}}"><i class="fa fa-user fa-fw"></i>{{Auth::user()->name}}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard fa-fw"></i> Dasbor</a>
                        </li>
                        {{-- ALL User --}}
                        @if (Auth::user()->hasRole('teacher'))
                        
                        <li {{-- id="menu" --}}>
                            <a href="{{route('user.index')}}"><i class="fa fa-users fa-fw"></i> Santri &amp; Staff<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" {{-- rhide"  id="show" --}}>
                                <li>
                                    <a  href="{{route('user.index')}}">Semua Santri<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{route('user.index')}}">Semua Santri</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.programmer')}}">Programmer</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.multimedia')}}">Multimedia</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.imers')}}">Imers</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.cyber')}}">Cyber</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('user.staff')}}">Semua Staff</a>
                                </li>
                                <li>
                                    <a href="{{route('user.create')}}">Tambah Santri &#47; Staff</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{-- id="menu5" --}}>
                            <a href="{{route('dailyactivity')}}"><i class="fa fa-sun-o fa-fw"></i> Kegiatan Santri Hari ini<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level rhide"  id="show5">
                                <li>
                                    <a  href="{{route('dailyactivity')}}">Semua Santri</a>
                                </li>
                                {{-- <li>
                                    <a href="">Programmer</a>
                                </li>
                                <li>
                                    <a href="">Multimedia</a>
                                </li>
                                <li>
                                    <a href="">Imers</a>
                                </li>
                                <li>
                                    <a href="">Cyber</a>
                                </li> --}}
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        {{-- ====== Kegiatan atau Activity ====== --}}
                        <li>
                            <a href="{{route('activity.index')}}"><i class="fa fa-thumb-tack fa-fw"></i> Kegiatan</a>
                        </li>
                        {{-- ===== Goal ===== --}}
                         <li {{-- id="menu2" --}}>
                            <a href="{{route('goal.index')}}"><i class="fa fa-book fa-fw"></i> Target Mingguan</a>
                        </li>
                        <li {{-- id="menu" --}}>
                            <a href="{{route('dream')}}"><i class="fa fa-star fa-fw"></i> 100 Cita - Cita Hidupku</a>
                        </li>
                        <li {{-- id="menu --}}">
                            <a href="{{route('target')}}"><i class="fa fa-bullseye fa-fw"></i> Target Terdekat (3 Bulan)</a>
                        </li>
                        <li {{-- id="menu2" --}}>
                            <a href="#5"><i class="fa fa-shield fa-fw"></i> Tataterib Pondok IT</span></a>
                        </li>
                        <li {{-- id="menu3" --}}>
                            <a href="#1"><i class="fa fa-book fa-fw"></i> Target Lain<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level rhide" {{-- id="show3 --}}">
                                <li>
                                    <a href="#2">Agama</a>
                                </li>
                                <li>
                                    <a href="#3">Skill</a>
                                </li>
                                <li>
                                    <a href="#4">Soft Skill</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{-- id="menu4" --}}>
                            <a href="{{route('amaliyah.index')}}"> <i class="fa fa-moon-o fa-fw"></i>Amaliah<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level rhide" {{-- id="show4" --}}>
                                <li>
                                    <a href="{{route('amaliyah.index')}}">Catatan Amaliyah</a>
                                </li>
                                <li>
                                    <a href="{{route('amaliyahcheck')}}">Check List Amaliyah Hari ini</a>
                                </li>
                            </ul>
                        </li>
                        {{-- Kirim Saran --}}
                        <li {{-- id="menu6" --}}>
                            <a href="{{Auth::user()->hasRole('master')?route('suggestion.index'):route('suggestion.create')}}"> <i class="fa fa-envelope-o fa-fw"></i>{{Auth::user()->hasRole('master')=='master'?'Semua Saran':'Kirim Saran'}} &nbsp;</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('dashboard/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('dashboard/vendor/raphael/raphael.min.js')}}"></script>
    {{-- <script src="{{asset('dashboard/vendor/morrisjs/morris.min.js')}}"></script> --}}
    {{-- <script src="{{asset('dashboard/data/morris-data.js')}}"></script> --}}

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('dashboard/dist/js/sb-admin-2.js')}}"></script>

    {{-- reportPondokit --}}
    <script src="{{asset('js/reportPondokit.js')}}"></script>
    {{-- <script src="{{asset('js/profile.js')}}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

     <!-- Placed at the end of the document so the pages load faster -->
    {{-- <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script> --}}

    {{-- dataTables --}}
    <script src="{{ asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/datatables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
    @yield('js');

</body>

</html>
