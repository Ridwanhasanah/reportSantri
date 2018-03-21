@extends('dashboard.masterdashboard')
@section('title')
Semua Calon Santri {{$divisi}}
@endsection

@section('content')

<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Semua Calon Santri @if($divisi != 'register'){{ucwords($divisi)}}@else @endif</h1>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Semua Calon Santri @if($divisi != 'register'){{ucwords($divisi)}}@else @endif
                    {{-- <a onclick="" class="btn btn-primary pull-right" style="margin-top: -8px;">Tambah Kegiatan</a> --}}
                </h4>
            </div>
            <div class="panel-body">
                <table style="max-width: 110px;" id="register-table" class="table table-striped scrolltab">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th width="50px">Proses</th>
                          <th>Divisi</th>
                          <th width="100px">Tanggal Daftar</th>
                          <th>WhatsApp</th>
                          <th>IQ</th>
                          <th >Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($registers as $register)
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$register->nama}}</td>
                          <td>{{$register->proses}}</td>
                          <td>{{$register->divisi}}</td>
                          <td>{{$register->tgl_daftar}}</td>
                          <td>{{$register->wa}}</td>
                          <td>{{$register->iq}}</td>
                          <td>
                            <a href="{{route('register.show',$register->id)}}" class="btn btn-outline btn-primary" style="margin-right:10px">Detail</a>
                            <a href="{{route('register.edit',$register->id)}}" class="btn btn-outline btn-success" style="margin-right:10px">Edit</a>
                            <a href="{{route('register.destroy',$register->id)}}" class="btn btn-outline btn-danger" style="margin-right:10px">Hapus</a>
                          </td>
                        </tr>
                        <?php $no++; ?>
                      @endforeach
                    </tbody>
                </table>
                {!! $registers->render() !!}
            </div>
        </div>
    </div>
  </div>
</div>

{{-- ============================================================================== --}}

          <div class="main-panel">
              <nav class="navbar navbar-transparent navbar-absolute">
                  <div class="container-fluid">
                      <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#"> Table List </a>
                      </div>
                      <div class="collapse navbar-collapse">
                          <ul class="nav navbar-nav navbar-right">
                              <li>
                                  <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                      <i class="material-icons">dashboard</i>
                                      <p class="hidden-lg hidden-md">Dashboard</p>
                                  </a>
                              </li>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                      <i class="material-icons">notifications</i>
                                      <span class="notification">5</span>
                                      <p class="hidden-lg hidden-md">Notifications</p>
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li>
                                          <a href="#">Mike John responded to your email</a>
                                      </li>
                                      <li>
                                          <a href="#">You have 5 new tasks</a>
                                      </li>
                                      <li>
                                          <a href="#">You're now friend with Andrew</a>
                                      </li>
                                      <li>
                                          <a href="#">Another Notification</a>
                                      </li>
                                      <li>
                                          <a href="#">Another One</a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                      <i class="material-icons">person</i>
                                      <p class="hidden-lg hidden-md">Profile</p>
                                  </a>
                              </li>
                          </ul>
                          <form class="navbar-form navbar-right" role="search">
                              <div class="form-group  is-empty">
                                  <input type="text" class="form-control" placeholder="Search">
                                  <span class="material-input"></span>
                              </div>
                              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                  <i class="material-icons">search</i>
                                  <div class="ripple-container"></div>
                              </button>
                          </form>
                      </div>
                  </div>
              </nav>


              <div class="content">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                  <div class="card-header" data-background-color="purple">
                                      <h4 class="title">Daftar Calon Santri</h4>
                                      <!-- <p class="category">Here is a subtitle for this table</p> -->
                                  </div>
                                  <div class="card-content table-responsive">
                                      <table id="example" class=" table table-bordered display" cellspacing="0" width="100%">
                                          <thead>
                                          <tr>
                                              <th>NO</th>
                                              <th>NAMA</th>
                                              <th>PROSES</th>
                                              <th>DIVISI</th>
                                              <th>TGL DAFTAR</th>
                                              <th>Email</th>
                                              <th>NO WA</th>
                                              <th>JURUSAN</th>
                                              <th>IQ</th>
                                              <th>OPSI</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          <?php $no =1; ?>
                                          <?php foreach ($registers as $s): ?>
                                          <tr>
                                              <td><?php echo $no; ?></td>
                                              <td><?php echo $s->nama; ?></td>
                                              <td><?php echo $s->proses; ?></td>
                                              <td><?php echo $s->divisi; ?></td>
                                              <td><?php echo $s->tgl_daftar; ?></td>
                                              <td><?php echo $s->email; ?></td>
                                              <td><?php echo $s->wa; ?></td>
                                              <td><?php echo $s->jurusan; ?></td>
                                              <td><?php echo $s->iq; ?></td>
                                              <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Edit</button>
                                                  <a class="btn btn-xs btn-primary" href="">Detail</a></td>
                                          </tr>
                                          <?php $no++; ?>
                                          <?php endforeach; ?>


                                          </tbody>
                                      </table>

                                                  </div>
                                              </div>

                                          </div>
                                      </div>

                                  </div>


                              </div>
                          </div>

{{-- =============================================================================== --}}
@endsection
@section('js')
<script type="text/javascript">
  function deleteRegis(id){
          swal({
            title: 'Kamu yakin ?',
            text: "Data Pendaftar yang di hapus tidak akan kembali!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus ini!'
          })
        }
</script>
@endsection
