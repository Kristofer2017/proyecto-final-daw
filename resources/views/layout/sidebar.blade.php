<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="/imagenes/logo2.png" alt="banner">
        </div>
        <div class="sidebar-brand-text ml-1 mr-2">Medi Lourdes</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Lista Opciones</div>

    <!-- Opciones para doctores -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/usuarios" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Mantenimiento</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Mant. Disponibles</h6>
                <a class="collapse-item" href="/usuarios">Usuarios</a>
                <a class="collapse-item" href="/roles">Roles</a>
            </div>
        </div>
    </li>

    <!-- Opciones para pacientes -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/citas" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Expediente</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Mi expediente</h6>
                <a class="collapse-item" href="/citas">Citas</a>
                <a class="collapse-item" href="/seguros">Seguros</a>
                <a class="collapse-item" href="/roles">Diagnosticos</a>
            </div>
        </div>
    </li>
    
    
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>