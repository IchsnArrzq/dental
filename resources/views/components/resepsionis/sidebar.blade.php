<ul>
    <li class="menu-title">Main</li>
    <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
        <a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
    @can('dokter-access')
    <li class="{{ request()->is('resepsionis/dokter*') ? 'active' : '' }}">
        <a href="{{ route('resepsionis.dokter.index') }}"><i class="fa fa-user-md"></i> <span>Dokter</span></a>
    </li>
    @endcan
    @can('patient-access')
    <li class="{{ request()->is('resepsionis/pasien*') ? 'active' : '' }}">
        <a href="{{ route('resepsionis.pasien.index') }}"><i class="fa fa-wheelchair"></i> <span>Pasien</span></a>
    </li>
    @endcan
    @can('appointment-access')
    <li class="{{ request()->is('resepsionis/appointments*') ? 'active' : '' }}">
        <a href="{{ route('resepsionis.appointments.index') }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
    </li>
    @endcan
</ul>