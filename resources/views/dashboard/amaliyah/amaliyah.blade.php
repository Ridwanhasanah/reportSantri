@extends('dashboard.masterdashboard')
@section('title')
Amaliah Santri
@endsection

@section('content')

<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
              @include('layouts.patrials.alerts')
              <h1 class="page-header">Evaluasi Ibadah Santri</h1>
          </div>
        </div>
        <div class="row scrolltab">
          <div class="col-lg-12 ">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Tanggal</th>
                      @for($i = 1; $i <= 31; $i++)
                        @if($i < 10)
                          <th>0{{$i}}</th>
                        @elseif($i>=10)
                          <th>{{$i}}</th>
                        @endif  
                      @endfor
                  </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td><b>Ibadah&nbsp;Wajib</b></td>
                    </tr>
                    <tr>
                      <td>Subuh&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Dzuhur&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Ashar&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Maghrib&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Isya&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Tilawah&nbsp;Alquran</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input class="rwidth" type="text"></td>
                      @endfor
                    </tr>
                    <tr class="odd gradeX">
                        <td><b>Ibadah&nbsp;Sunnah</b></td>
                    </tr>
                    <tr>
                      <td>Tahajud</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Witir</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Qobliyah&nbsp;Subuh</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Hafalan&nbsp;Ayat</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input class="rwidth" type="text"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Sholat&nbsp;Dhuha</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Qobliyah&nbsp;Dzuhur</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Badiyah&nbsp;Dzuhur</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Badiyah&nbsp;Maghrib</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Badiyah&nbsp;Isya</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Puasa&nbsp;&#40;Senin&amp;Kamis&#41;</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Doa&nbsp;untuk&nbsp;Orang&nbsp;Tua</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Doa&nbsp;Untuk&nbsp;Donatur &amp;Pondok&nbsp;IT</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Infaq&nbsp;Untuk&nbsp;Pondok&nbsp;IT</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Dzikir&nbsp;Pagi</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Dzikir&nbsp;Petang</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Baca&nbsp;Surat&nbsp;Al-Kahfi</td>
                      @for ($i = 1; $i <= 31; $i++)
                          <td><input type="checkbox"></td>
                      @endfor
                    </tr>
                    
                </tbody>
                <tfooter>
                  <tr>
                      <th>Tanggal</th>
                      @for($i = 1; $i <= 31; $i++)
                        @if($i < 10)
                          <th>0{{$i}}</th>
                        @elseif($i>=10)
                          <th>{{$i}}</th>
                        @endif  
                      @endfor
                  </tr>
                </tfooter>
                
            </table>
            <input class="btn btn-primary" type="submit" value="Simpan">

                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                <span class="pull-right">
                  <a href="" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><b>Edit</b><i class="glyphicon glyphicon-edit"></i></a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection