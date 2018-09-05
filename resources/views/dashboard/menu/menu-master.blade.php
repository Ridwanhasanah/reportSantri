<li>
    <a href="{{route('dashboard.home')}}"><i class="fa fa-dashboard fa-fw"></i> Dasbor</a>
</li>
{{-- ALL User --}}
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
            <a href="{{route('user.kka')}}">Semua Kakak Asuh</a>
        </li>
        <li>
            <a href="{{route('user.staff')}}">Semua Staff</a>
        </li>
        <li>
            <a href="{{route('user.create')}}">Tambah Santri &#47; Staff</a>
        </li>
    </ul>
</li>
<li>
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
<li>
    <a href="{{route('register.index')}}"><i class="fa fa-list-alt fa-fw"></i>Pendaftaran<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level rhide">
        <li>
            <a href="{{route('register.index')}}">Semua Pendaftar</a>
        </li>
        <li>
            <a href="{{route('register.programmer')}}">Programmer</a>
        </li>
        <li>
            <a href="{{route('register.multimedia')}}">Multimedia</a>
        </li>
        <li>
            <a href="{{route('register.imers')}}">Imers</a>
        </li>
        <li>
            <a href="{{route('register.cyber')}}">Cyber</a>
        </li>
    </ul>
</li>
<li>
    <a href="#5"><i class="fa fa-shield fa-fw"></i> Tataterib Pondok IT</span></a>
</li>
<li>
    <a href="{{route('invoice-admin.index')}}"> <i class="fa fa-money fa-fw"></i>Semua Invoice</a>
</li>
<li>
    <a href="{{route('confirmation-admin.index')}}"> <i class="fa fa-pencil fa-fw"></i>Konfirmasi Transfer</a>
</li>
<li>
    <a href="{{route('adminmotor.index')}}"><i class="fa fa-plane fa-fw"></i> Semua Surat Izin</a>
</li>
{{-- Kirim Saran --}}
<li>
    <a href="{{route('suggestion.index')}}"> <i class="fa fa-envelope-o fa-fw"></i>Semua Saran</a>
</li>
