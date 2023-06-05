<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('assets/dist/img/logo.png') }}" alt="Data Pelanggan - Logo" class="brand-image img-circle elevation-1"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Data Pelanggan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Dashboard --}}
                <li class="nav-item {{ Request::is('dashboard*') ? 'menu-open' : '' }}">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- Pelanggan --}}
                <li class="nav-item {{ Request::is('pelanggan*') ? 'menu-open' : '' }}">
                    <a href="/pelanggan" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pelanggan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
