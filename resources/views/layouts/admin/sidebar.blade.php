<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
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
    <!-- Nav Item - Sistem Akademik Collapse Menu -->
    <li
        class="nav-item {{ request()->is('admin/fakultases','admin/fakultases/*','admin/jurusans','admin/jurusans/*','admin/program-studis','admin/program-studis/*') ? ' active':''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <span class="material-icons">
                square_foot
            </span>
            <span>Sistem Akademik</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Edit Sistem:</h6>
                <a class="collapse-item" href="{{ route('admin.fakultases.index') }}">Fakultas</a>
                <a class="collapse-item" href=" {{ route('admin.jurusans.index') }}">Jurusan</a>
                <a class="collapse-item" href="{{ route('admin.program_studis.index') }}">Program Studi</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - KRS -->
    <li class=" nav-item {{ request()->is('admin/krses','admin/krses/*') ? ' active':''}}">
        <a class="nav-link" href="{{ route('admin.krses.index') }}">
            <span class="material-icons">
                history_edu
            </span>
            <span>KRS</span></a>
    </li>
    <!-- Nav Item - Mata Kuliah -->
    <li class="nav-item {{ request()->is('admin/khses','admin/khses/*') ? ' active':''}}">
        <a class="nav-link" href="{{ route('admin.khses.index') }}">
            <span class="material-icons">
                menu_book
            </span>
            <span>KHS</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
