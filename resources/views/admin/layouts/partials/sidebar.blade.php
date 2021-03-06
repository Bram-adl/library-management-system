<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('AdminLTE-3.1.0/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin E-Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/{{ Auth::user()->foto }}" class="img-circle elevation-2" style="width: 2.4rem; height: 2.4rem; object-fit: cover;" alt="User Image">
            </div>
            <div class="info">
                <a href="/users/{{ Auth::user()->id_user }}" class="d-block">{{ Auth::user()->username }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <label for="" class="font-weight-normal bg-dark">Main Navigation</label>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link" id="beranda">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="kelola-data">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Kelola Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/books" class="nav-link" id="data-buku">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/members" class="nav-link" id="data-anggota">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Anggota</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/circulations" class="nav-link" id="sirkulasi">
                        <i class="nav-icon fas fa-sync-alt"></i>
                        <p>
                            Sirkulasi
                        </p>
                    </a>
                </li>

                <label for="" class="font-weight-normal bg-dark">Setting</label>
                <li class="nav-item">
                    <a href="/users" class="nav-link" id="pengguna-sistem">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pengguna Sistem
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout').submit()" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>

                    <form action="{{ url('/logout') }}" method="POST" id="logout" class="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>