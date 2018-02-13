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
               {{--  @foreach($arr_date as $val)
                  <th>{{date("d",strtotime($val))}}</th>
                @endforeach --}}
                <tr><th rowspan="3">Evaluasi Ibadah</th>
                <tr><th colspan="{{$total_day}}">{{date("F Y")}}</th></tr>
                <tr>
                  <tr>
                      <th>Tanggal</th>

                      @for($i = 1; $i <= $total_day; $i++)
                        @if($i < 10)
                          <th style="text-align: center;">0{{$i}}</th>
                        @elseif($i>=10)
                          <th style="text-align: center;">{{$i}}</th>
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
                      {{-- @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal))
                          @if(date('d', strtotime($amal[$i-1]->date)) == $i && $subuh == 1)
                            <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                          @else
                            <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                          @endif
                        @else
                            <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor --}}
                      
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->subuh_jmh == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                     
                    </tr>
                    <tr>
                      <td>Dzuhur&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->dzuhur_jmh == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Ashar&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->ashar_jmh == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Maghrib&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->maghrib_jmh == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Isya&nbsp;Jamaah</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->isya_jmh == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Tilawah&nbsp;Alquran</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                          <td><input name="tilawah" class="rwidth" type="text"></td>
                      @endfor
                    </tr>
                    <tr class="odd gradeX">
                        <td><b>Ibadah&nbsp;Sunnah</b></td>
                    </tr>
                    <tr>
                      <td>Tahajud</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->tahajud == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Witir</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->witir == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Qobliyah&nbsp;Subuh</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->qobliyah_subuh == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Hafalan&nbsp;Ayat</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                          <td><input name="hafalan" class="rwidth" type="text"></td>
                      @endfor
                    </tr>
                    <tr>
                      <td>Sholat&nbsp;Dhuha</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->dhuha == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Qobliyah&nbsp;Dzuhur</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->qobliyah_dzuhur == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Badiyah&nbsp;Dzuhur</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->badiyah_dzuhur == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Badiyah&nbsp;Maghrib</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->badiyah_maghrib == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Badiyah&nbsp;Isya</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->badiyah_isya == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Puasa&nbsp;&#40;Senin&amp;Kamis&#41;</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->puasa == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Doa&nbsp;untuk&nbsp;Orang&nbsp;Tua</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->doa_ortu == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Doa&nbsp;Untuk&nbsp;Donatur &amp;Pondok&nbsp;IT</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->doa_donatur == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Infaq&nbsp;Untuk&nbsp;Pondok&nbsp;IT</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->infaq == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Dzikir&nbsp;Pagi</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->dzikir_pagi == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Dzikir&nbsp;Petang</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->dzikir_petang == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    <tr>
                      <td>Baca&nbsp;Surat&nbsp;Al-Kahfi</td>
                      @for ($i = 1; $i <= $total_day; $i++)
                        @if($i <= count($amal) && date('d', strtotime($amal[$i-1]->date)) == $i && $amal[$i-1]->alkahfi == 1)
                          <td><button type="button" class="btn btn-info disabled fa fa-check"></button></td>
                        @else
                          <td><button type="button" class="btn btn-default disabled fa fa-times"></button></td>
                        @endif
                      @endfor 
                    </tr>
                    
                </tbody>
                <tfooter>
                  <tr>
                      <th>Tanggal</th>
                      @for($i = 1; $i <= $total_day; $i++)
                        @if($i < 10)
                          <th>0{{$i}}</th>
                        @elseif($i>=10)
                          <th>{{$i}}</th>
                        @endif  
                      @endfor
                  </tr>
                </tfooter>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection