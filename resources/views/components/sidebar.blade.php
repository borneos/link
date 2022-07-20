
@section('sidebar')
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
            <div class="sidebar-brand-text text-capitalize mx-3">Borneos Link</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Personal Link
        </div>
        <li class="nav-item {{ Route::is('biodata') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('biodata') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Biodata</span></a>

        </li>
        <li class="nav-item {{ Route::is('dashboard-landing') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard-landing') }}">
            <i class="fas fa-fw fa-house-user"></i>
            <span> Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Short Link
        </div>
        <li class="nav-item {{ request()->is('generate') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('generate') }}">
                <i class="fas fa-fw fa-link"></i>
                <span>Generate Link</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
@endsection
