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
  <div class="row">
      <div class="col-lg-12 ">
        <form action="{{route('amaliyah.update',$amal->id)}}" method="post" role="form" >
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="col-md-3 col-lg-3">
            <div class="[ form-group ]">
                <input 
                {{$amal->subuh_jmh == 1 ? 'checked': ''}}
                type="checkbox"
                name="subuh_jmh"
                id="subuh_jmh"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="subuh_jmh" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="subuh_jmh" class="[ btn btn-default active ]">
                        Subuh Jamaah
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input type="checkbox"
                name="dzuhur_jmh"
                id="dzuhur_jmh"
                autocomplete="off"
                value="1"
                {{$amal->dzuhur_jmh == 1 ? 'checked': ''}} />
                <div class="[ btn-group ]">
                    <label for="dzuhur_jmh" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="dzuhur_jmh" class="[ btn btn-default active ]">
                        Dzuhur Jamaah
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->ashar_jmh == 1 ? 'checked': ''}}
                type="checkbox"
                name="ashar_jmh"
                id="ashar_jmh"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="ashar_jmh" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="ashar_jmh" class="[ btn btn-default active ]">
                        Ashar Jamaah
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->maghrib_jmh == 1 ? 'checked': ''}}
                type="checkbox"
                name="maghrib_jmh"
                id="maghrib_jmh"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="maghrib_jmh" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="maghrib_jmh" class="[ btn btn-default active ]">
                        Maghrib Jamaah
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->isya_jmh == 1 ? 'checked': ''}}
                type="checkbox"
                name="isya_jmh"
                id="isya_jmh"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="isya_jmh" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="isya_jmh" class="[ btn btn-default active ]">
                        Isya Jamaah
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="[ form-group ]">
                <input
                {{$amal->tahajud == 1 ? 'checked': ''}}
                type="checkbox"
                name="tahajud"
                id="tahajud"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="tahajud" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="tahajud" class="[ btn btn-default active ]">
                        Sholat Tahajud
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input 
                {{$amal->witir == 1 ? 'checked': ''}} type="checkbox" name="witir" id="witir" autocomplete="off" value="1"/>
                <div class="[ btn-group ]">
                    <label for="witir" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="witir" class="[ btn btn-default active ]">
                        Sholat Witir
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->qobliyah_subuh == 1 ? 'checked': ''}}
                type="checkbox"
                name="qobliyah_subuh"
                id="qobliyah_subuh"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="qobliyah_subuh" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="qobliyah_subuh" class="[ btn btn-default active ]">
                        Qobliyah Subuh
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input 
                {{$amal->dhuha == 1 ? 'checked': ''}} type="checkbox" name="dhuha" id="dhuha" autocomplete="off" value="1"/>
                <div class="[ btn-group ]">
                    <label for="dhuha" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="dhuha" class="[ btn btn-default active ]">
                        Sholat Dhuha
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->qobliyah_dzuhur == 1 ? 'checked': ''}}
                type="checkbox"
                name="qobliyah_dzuhur"
                id="qobliyah_dzuhur"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="qobliyah_dzuhur" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="qobliyah_dzuhur" class="[ btn btn-default active ]">
                        Qobliyah Dzuhur
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="[ form-group ]">
                <input
                {{$amal->badiyah_dzuhur == 1 ? 'checked': ''}}
                type="checkbox"
                name="badiyah_dzuhur"
                id="badiyah_dzuhur"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="badiyah_dzuhur" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="badiyah_dzuhur" class="[ btn btn-default active ]">
                        Badiyah Dzuhur
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->badiyah_maghrib == 1 ? 'checked': ''}}
                type="checkbox"
                name="badiyah_maghrib"
                id="badiyah_maghrib"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="badiyah_maghrib" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="badiyah_maghrib" class="[ btn btn-default active ]">
                        Badiyah Maghrib
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->badiyah_isya == 1 ? 'checked': ''}}
                type="checkbox"
                name="badiyah_isya"
                id="badiyah_isya"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="badiyah_isya" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="badiyah_isya" class="[ btn btn-default active ]">
                        Badiyah Isya
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input 
                {{$amal->puasa == 1 ? 'checked': ''}} type="checkbox" name="puasa" id="puasa" autocomplete="off" value="1"/>
                <div class="[ btn-group ]">
                    <label for="puasa" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="puasa" class="[ btn btn-default active ]">
                        Puasa&nbsp;&#40;Senin&amp;Kamis&#41;
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->doa_ortu == 1 ? 'checked': ''}}
                type="checkbox"
                name="doa_ortu"
                id="doa_ortu"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="doa_ortu" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="doa_ortu" class="[ btn btn-default active ]">
                        Doa&nbsp;Untuk&nbsp;Orang&nbsp;Tua
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="[ form-group ]">
                <input
                {{$amal->doa_donatur == 1 ? 'checked': ''}}
                type="checkbox"
                name="doa_donatur"
                id="doa_donatur"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="doa_donatur" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="doa_donatur" class="[ btn btn-default active ]">
                        Doa&nbsp;Untuk&nbsp;Donatur
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input 
                {{$amal->infaq == 1 ? 'checked': ''}} type="checkbox" name="infaq" id="infaq" autocomplete="off" value="1"/>
                <div class="[ btn-group ]">
                    <label for="infaq" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="infaq" class="[ btn btn-default active ]">
                        Infaq&nbsp;Untuk&nbsp;Pondok&nbsp;IT
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->dzikir_pagi == 1 ? 'checked': ''}}
                type="checkbox"
                name="dzikir_pagi"
                id="dzikir_pagi"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="dzikir_pagi" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="dzikir_pagi" class="[ btn btn-default active ]">
                        Dzikir Pagi
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->dzikir_petang == 1 ? 'checked': ''}}
                type="checkbox"
                name="dzikir_petang"
                id="dzikir_petang"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="dzikir_petang" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="dzikir_petang" class="[ btn btn-default active ]">
                        Dzikir Petang
                    </label>
                </div>
            </div>
            <div class="[ form-group ]">
                <input
                {{$amal->alkahfi == 1 ? 'checked': ''}}
                type="checkbox"
                name="alkahfi"
                id="alkahfi"
                autocomplete="off"
                value="1"/>
                <div class="[ btn-group ]">
                    <label for="alkahfi" class="[ btn btn-success ]">
                        <span class="[ glyphicon glyphicon-ok ]"></span>
                        <span></span>
                    </label>
                    <label for="alkahfi" class="[ btn btn-default active ]">
                        Al-Kahfi
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <label>
                            Tilawah Al Quran</label>
                        </td>
                        <td>
                            <input
                            value="{{$amal->tilawah_alquran}}"
                            placeholder="Tulis Total Halaman Baca Quran"
                            name="tilawah_alquran"
                            class="form-control"
                            type="number" /> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Hafalan Ayat</label>
                        </td>
                        <td>
                            <input
                            placeholder="Tulis Total Halaman Baca Quran"
                            value="{{$amal->hafalan}}"
                            name="hafalan"
                            class="form-control"
                            type="number"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-lg-12">
            <input class="btn btn-primary" type="submit" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>

@endsection