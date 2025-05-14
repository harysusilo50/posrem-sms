<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="{{ asset('img/logo.png') }}" width="90" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Beranda</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('/') }}" href="{{ route('home') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Pengguna</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('user/*') ? 'active' : '' }}" href="{{ route('user.index') }}"
                            aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Data Pengguna</span>
                        </a>
                    </li>
                @endif

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Kesehatan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('data-kesehatan/*') ? 'active':'' }}" href="{{ route('data-kesehatan.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-heartbeat"></i>
                        </span>
                        <span class="hide-menu">Data Kesehatan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('konsultasi/*') ? 'active':'' }}" href="{{ route('konsultasi.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-message"></i>
                        </span>
                        <span class="hide-menu">Konsultasi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./" aria-expanded="false">
                        <span>
                            <i class="ti ti-report-medical"></i>
                        </span>
                        <span class="hide-menu">Penyuluhan</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
