<li>
    <a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard fa-fw"></i> Dasbor</a>
</li>
{{-- ALL User --}}
<li {{-- id="menu" --}}>
    <a href="{{route('user.index')}}"><i class="fa fa-users fa-fw"></i> Santri dan Kakak Asuh<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
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
    <a href="{{route('dailyactivity.All')}}"><i class="fa fa-sun-o fa-fw"></i> Kegiatan Santri Hari ini<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level rhide"  id="show5">
        <li>
            <a  href="{{route('dailyactivity.All')}}">Semua Santri</a>
        </li>
        <li>
            <a href="{{route('dailyactivity.Programmer')}}">Programmer</a>
        </li>
        <li>
            <a href="{{route('dailyactivity.Multimedia')}}">Multimedia</a>
        </li>
        <li>
            <a href="{{route('dailyactivity.Imers')}}">Imers</a>
        </li>
        <li>
            <a href="{{route('dailyactivity.Cyber')}}">Cyber</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>
<li>
    <a href="#5"><i class="fa fa-shield fa-fw"></i> Tataterib Pondok IT</span></a>
</li>
