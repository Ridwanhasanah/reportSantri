<li>
    <a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard fa-fw"></i> Dasbor</a>
</li>
<li>
    <a href="{{route('activity.index')}}"><i class="fa fa-thumb-tack fa-fw"></i> Kegiatan</a>
</li>
 <li>
    <a href="{{route('goal.index')}}"><i class="fa fa-book fa-fw"></i> Target Mingguan</a>
</li>
<li>
    <a href="{{route('dream')}}"><i class="fa fa-star fa-fw"></i> 100 Cita - Cita Hidupku</a>
</li>
<li>
    <a href="{{route('target')}}"><i class="fa fa-bullseye fa-fw"></i> Target Terdekat (3 Bulan)</a>
</li>
<li>
    <a href="#5"><i class="fa fa-shield fa-fw"></i> Tataterib Pondok IT</span></a>
</li>
<li>
    <a href="#1"><i class="fa fa-book fa-fw"></i> Target Lain<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level rhide">
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
</li>
<li>
    <a href="{{route('motor.index')}}"> <i class="fa fa-moon-o fa-fw"></i>Izin Motor<span class="fa arrow"></span></a>
</li>
<li>
    <a href="{{route('amaliyah.index')}}"> <i class="fa fa-moon-o fa-fw"></i>Amaliah<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level rhide">
        <li>
            <a href="{{route('amaliyah.index')}}">Catatan Amaliyah</a>
        </li>
        <li>
            <a href="{{route('amaliyahcheck')}}">Check List Amaliyah Hari ini</a>
        </li>
    </ul>
</li>
{{-- Kirim Saran --}}
<li>
    <a href="{{route('suggestion.create')}}"> <i class="fa fa-envelope-o fa-fw"></i>Kirim Saran &nbsp;</a>
</li>