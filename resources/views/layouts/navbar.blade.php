<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('images/profile.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ substr(Auth::user()->guru->nama, 0, 20). '...' }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item has-icon">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
                <a href="#" class="dropdown-item has-icon">
                    <i class="fas fa-question-circle"></i>
                    Panduan
                </a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>