@extends('dashboard.masterdashboard')
@section('title')
{{$user->name}} Profile
@endsection

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        @include('layouts.patrials.alerts')
        <h1 class="page-header">{{$user->name}} Profile</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">{{$user->name}}</h3>
        </div>
        <div class="panel-body">
              <div class="row">

                 <form action="{{route('profile.update',$user->id)}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}

                <div class="col-md-3 col-lg-3 " align="center">
                @if (strlen($user->photo) ==0)
                  <img alt="User Pic" src="http://enadcity.org/enadcity/wp-content/uploads/2017/02/profile-pictures.png" class="img-circle img-responsive"> 
                @else
                  <img alt="User Pic" src="{{asset('storage/photos/'.$user->photo)}}" class="img-circle img-responsive"> 
                @endif 
                  <br>
                  <input type="file" name="photo" class="form-control">
                  <br>
                  <a onclick="editPass()" class="btn btn-outline btn-danger">Ubah Password</a>
                  {{-- <a href="{{route('profilepass.edit',$user->id)}}" id="editpass" class="btn btn-outline btn-danger">Ubah Password</a> --}}
                  @if (Auth::user()->hasRole('master') || Auth::user()->hasRole('foster_brother') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher')) 

                  @else

                  <div class="panel panel-info rmargin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><b>Quote</b></h3>
                    </div>
                    <div class="panel-body">
                      <textarea placeholder="Contoh : Berilmu sebelum berkata dan beramal" class="form-control" type="textarea" name="quote">{{$user->quote}}</textarea>
                    </div>
                  </div>
                  @endif
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Nama</b></td>
                        <td><input placeholder="Ridwan" class="form-control" type="" name="name" value="{{$user->name}}"></td>
                      </tr>
                      @if (!Auth::user()->hasRole('student') && !Auth::user()->hasRole('foster_brother'))
                      <tr>
                        <td><b>Divisi</b></td>
                        <td><input readonly class="form-control" type="" name="departemt" value="{{$user->department}}"></td>
                      </tr>
                      @endif
                      <tr>
                        <td><b>Tempat, Tanggal Lahir</b></td>
                        <td><input class="form-control" id="datepicker" name="date_birth" value="{{$user->date_birth}}"> , <input placeholder="Contoh : Jakarta" name="birth_place" class="form-control" value="{{$user->birth_place}}"></td>
                      </tr>
                      <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>

                          <input {{$user->gender=='Pria' ? 'checked' : ''}} type="radio" name="gender" value="Pria"> Pria<br>
                          <input  {{$user->gender=='Wanita' ? 'checked' : ''}} type="radio" name="gender" value="Wanita"> Wanita<br>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Kota</b></td>
                        <td><input placeholder="Contoh : DIY" class="form-control" type="text" name="city" value="{{$user->city}}"></td>
                      </tr>
                      <tr>
                        <td><b>Kabupaten</b></td>
                        <td><input placeholder="Contoh : Bantul" class="form-control" type="text" name="district" value="{{$user->district}}"></td>
                      </tr>
                      <tr>
                        <td><b>Alamat</b></td>
                        <td><textarea placeholder="Contoh : jl.pesangrahan" class="form-control" type="text" name="address">{{$user->address}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><input placeholder="Contoh : ridwan@pondokit.com" class="form-control" type="email" name="email" value="{{$user->email}}"></td>
                      </tr>
                      <tr>
                        <td><b>Nomor HandPhone</b></td>
                        <td><input placeholder="Contoh : 089123456789" class="form-control" type="number" name="hp" value="{{$user->hp}}">(Mobile)</td>
                      </tr>
                      @if (Auth::user()->hasRole('master') || Auth::user()->hasRole('foster_brother') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('teacher')) 

                      @else

                      <tr>
                        <td><b>Hobi</b></td>
                        <td><textarea placeholder="Contoh : Memanah" class="form-control wysiwyg" type="text" name="hobby" rows="30">{{$user->hobby}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Pengalaman</b></td>
                        <td><textarea placeholder="Contoh : Membuat CRUD di Laravel" class="form-control wysiwyg" type="text" rows="30" name="experience">{{$user->experience}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>Karya</b></td>
                        <td><textarea placeholder="Contoh : Membuat Web Onlinde Shop" class="form-control wysiwyg" type="" name="creation" rows="30">{{$user->creation}}</textarea></td>
                      </tr>
                      <tr>
                        <td><b>100 Cita - Cita ku</b></td>
                        <td><textarea 
                          placeholder="
                          Contoh : 
                          1. Mempunyai Istri Cantik dan Sholeha,
                          2.Mempunyai Rumah 4 lantai di Jakarta, dst
                          " rows="30" class="form-control wysiwyg" type="text" name="dream">{{$user->dream}}</textarea></td>
                      </tr>

                      @endif

                      <tr>
                        <td></td>
                        <td><input class="btn btn-primary" type="submit" name="submit"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </form>
              </div>
        </div>
        <div class="panel-footer">
          {{-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
          <span class="pull-right">
            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
          </span> --}}
        </div>
      </div>


    </div>
  </div>
  @include('dashboard.profile.editPassword')
</div>
@endsection
@section('js')
<script type="text/javascript"> {{-- Edit Password --}}
  function editPass(){
        $('input[name=_method]').val('PATCH'); /*Untuk input post yang ada di modal form, method_field()*/
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset(); /*untuk mereset form input*/
        $('#update').click(function(e){
          e.preventDefault();
          $.ajax({
            url: "{{route('profilepass.update',$user->id)}}",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success:function(){
              swal({
                title:'Berhasil',
                text: 'Password Berhasil di  ubah',
                type: 'success',
                timer: '2500'
              })
            },
            error: function(){
              swal({
                title: 'Oops',
                text: 'Something went wrong',
                type: 'error',
                timer: '1500'
              })
            }
          })

        })
  }

  $(document).ready(function(){
    var pass      = $('#password');
    var repass    = $('#repass');
    var erpass    = $('#errorPassword');
    var errepass = $('#errorRepass');
    var update    = $('#update');

    function checkVal(//function for check input
            name, //long string check 
            value, //value string for show
            error,//<span> id in the html for the show();
            condition //Kondisi if
            ){
                if (name <= condition) {
              error.html(value).show(); //menampilkan text string yang ada
              error.show();//menampilkan span
            }else{
              error.hide(); //jika false maka hide
            }
          }

          pass.hover(function(){
            checkVal(pass.val().length,'password minimal 6 karakter',erpass,5)
          });
          repass.hover(function(){
            checkVal(repass.val().length,'password minimal 6 karakter', errepass,5)
          });

    update.hover(function(){

          if (pass.val() !== repass.val()) {
            swal({
                title: 'Oops',
                text: 'Password tidak sesuai',
                type: 'error',
                timer: '1500'
              })

          }else if(pass.val().length <= 5 || repass.val().length <= 5){
            swal({
                title: 'Oops',
                text: 'Password minimal 6 karakter',
                type: 'error',
                timer: '1500'
              })
          }


    } )

  } )
</script>
@endsection