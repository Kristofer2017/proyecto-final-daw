<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->is('roles*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="{{ request()->is('roles*') ? 'true' : 'false' }}" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Mantenimiento</span>
        </a>
        <div id="collapsePages" class="collapse {{ request()->is('roles*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Mantenimiento</h6>
                <a class="collapse-item {{ request()->is('roles*') ? 'active' : '' }}" href="/roles">Roles</a>
                
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('usuarios*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="{{ request()->is('usuarios*') ? 'true' : 'false' }}" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Mantenimiento</span>
        </a>
        <div id="collapsePages" class="collapse {{ request()->is('usuarios*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Mantenimiento</h6>
   
                <a class="collapse-item {{ request()->is('usuarios*') ? 'active' : '' }}" href="/usuarios">Usuarios</a>
            </div>
        </div>
    </li>
    
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>