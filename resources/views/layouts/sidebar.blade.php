<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">HUBIN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-users"></i>
                    <span>Data Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    @foreach ($angkatan as $item)
                        <li class="nav-item dropdown">
                            <a href="{{ route('angkatan.show', $item->slug) }}" class="nav-link has-dropdown">{{ $item->nama }}</a>
                            <ul class="dropdown-menu">
                                @foreach ($item->kelas as $kelas)
                                    <li class="nav-item">
                                        <a href="{{ route('kelas.show', [$item->slug, $kelas->slug]) }}" class="nav-link">{{ $kelas->nama }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown">
                <a href="{{ route('guru.index') }}" class="nav-link">
                    <i class="fas fa-user-friends"></i>
                    <span>Data Guru</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('jadwal.index') }}" class="nav-link">
                    <i class="fas fa-calendar"></i>
                    <span>Jadwal Prakerin</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-file-alt"></i>
                    <span>Surat-surat</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown">Surat Pengajuan</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Pengajuan</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Tidak Diterima</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Surat Pengantar</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-tv"></i>
                    <span>Monitoring</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown">2022/2023</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">XII RPL</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown">2023/2024</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">XII RPL</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="{{ route('perusahaan.index') }}" class="nav-link">
                    <i class="fas fa-building"></i>
                    <span>Data Perusahaan</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('data.index') }}" class="nav-link">
                    <i class="fas fa-cogs"></i>
                    <span>Kelola Data</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="fas fa-user-cog"></i>
                    <span>Kelola User</span>
                </a>
            </li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>
                Main Page
            </a>
        </div>
    </aside>
</div>