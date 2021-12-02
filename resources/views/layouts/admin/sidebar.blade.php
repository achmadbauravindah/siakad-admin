<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <span class="material-icons">
                school
            </span>
        </div>
        <div class="sidebar-brand-text mx-3">SIAKAD</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ? ' active':''}}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Mahasiswa -->
    <li class="nav-item {{ request()->is('admin/mahasiswas','admin/mahasiswas/*') ? ' active':''}}">
        <a class="nav-link" href="{{ route('admin.mahasiswas.index') }}">
            <span class="material-icons">
                people
            </span>
            <span>Mahasiswa</span></a>
    </li>

    <!-- Nav Item - Dosen -->
    <li class="nav-item {{ request()->is('admin/dosens','admin/dosens/*') ? ' active':''}}">
        <a class="nav-link" href="{{ route('admin.dosens.index') }}">
            <span class="material-icons">
                people
            </span>
            <span>Dosen</span></a>
    </li>

    <!-- Nav Item - Mata Kuliah -->
    <li class="nav-item {{ request()->is('admin/matakuliahs','admin/matakuliahs/*') ? ' active':''}}">
        <a class="nav-link" href="{{ route('admin.matakuliahs.index') }}">
            <span class="material-icons">
                menu_book
            </span>
            <span>Mata Kuliah</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
