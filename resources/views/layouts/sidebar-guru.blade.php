<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">HUBIN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ $active === 'Dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown {{ $active === 'Siswa' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-users"></i>
                    <span>Data Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ $subActive === 'Angkatan' ? 'active' : '' }}">
                        <a href="{{ route('angkatan.index') }}" class="nav-link">Data Angkatan</a>
                    </li>
                    <li class="nav-item dropdown {{ $subActive === 'Kelas' ? 'active' : '' }}">
                        <a href="{{ route('kelas.index') }}" class="nav-link">Data Kelas</a>
                    </li>
                    <li class="nav-item dropdown {{ $subActive === 'Siswa' ? 'active' : '' }}">
                        <a href="{{ route('siswa.index') }}" class="nav-link">Data Siswa</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Prakerin</li>
            <li class="nav-item dropdown {{ $active === 'Monitoring' ? 'active' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fas fa-tv"></i>
                    <span>Monitoring</span>
                </a>
            </li>
            <li class="menu-header">Pengaturan</li>
            <li class="dropdown {{ $active === 'Profile' ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="dropdown {{ $active === 'Panduan' ? 'active' : '' }}">
                <a href="{{ route('help') }}" class="nav-link">
                    <i class="fas fa-question-circle"></i>
                    <span>Panduan</span>
                </a>
            </li>
            <li class="dropdown {{ $active === 'Pengaturan' ? 'active' : '' }}">
                <a href="{{ route('setting') }}" class="nav-link">
                    <i class="fas fa-cogs"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>
        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>
                Main Page
            </a>
        </div> --}}
    </aside>
</div>
