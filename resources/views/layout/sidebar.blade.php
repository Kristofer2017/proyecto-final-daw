<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="/imagenes/logo4.png" alt="banner">
        </div>
        <div class="sidebar-brand-text">Clinica Lourdes</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>


    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Lista Opciones</div>

    <!-- Opciones para administradores -->
    @auth
        @if(Auth::user()->hasRole('Administrador'))
            <li class="nav-item {{ Request::is('usuarios*') || Request::is('roles*') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('usuarios*') || Request::is('roles*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="{{ Request::is('usuarios*') || Request::is('roles*') ? 'true' : 'false' }}" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Mantenimiento</span>
                </a>
                <div id="collapsePages" class="collapse {{ Request::is('usuarios*') || Request::is('roles*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mant. Disponibles</h6>
                        <a class="collapse-item {{ Request::is('usuarios*') ? 'active' : '' }}" href="/usuarios">Usuarios</a>
                        <a class="collapse-item {{ Request::is('roles*') ? 'active' : '' }}" href="/roles">Roles</a>
                    </div>
                </div>
            </li>
        @endif
    @endauth

    <!-- Opciones para doctores -->
    @auth
        @if(Auth::user()->hasRole('Doctor'))
            <li class="nav-item {{ Request::is('citas*') || Request::is('seguros*') || Request::is('pacientes*') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('citas*') || Request::is('seguros*') || Request::is('pacientes*') ? '' : 'collapsed' }}"
                    href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="{{ Request::is('citas*') || Request::is('seguros*') || Request::is('pacientes*') ? 'true' : 'false' }}"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Pacientes</span>
                </a>
                <div id="collapseTwo" class="collapse {{ Request::is('citas*') || Request::is('seguros*') || Request::is('pacientes*') ? 'show' : '' }}"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones</h6>
                        <a class="collapse-item {{ Request::is('citas*') ? 'active' : '' }}" href="/citas">Citas</a>
                        <a class="collapse-item {{ Request::is('seguros*') ? 'active' : '' }}" href="/seguros">Seguros</a>
                        <a class="collapse-item {{ Request::is('pacientes*') ? 'active' : '' }}" href="/pacientes">Pacientes</a>
                    </div>
                </div>
            </li>
        @endif
    @endauth

    <!-- Opciones para pacientes o cualquier otro rol -->
    @auth
        @if(!Auth::user()->hasRole('Doctor') && !Auth::user()->hasRole('Administrador'))
            <li class="nav-item {{ Request::is('citas*') || Request::is('seguros*') || Request::is('doctores*') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('citas*') || Request::is('seguros*') || Request::is('doctores*') ? '' : 'collapsed' }}"
                    href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="{{ Request::is('citas*') || Request::is('seguros*') || Request::is('doctores*') ? 'true' : 'false' }}"
                    aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Expediente</span>
                </a>
                <div id="collapseUtilities" class="collapse {{ Request::is('citas*') || Request::is('seguros*') || Request::is('doctores*') ? 'show' : '' }}"
                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mi expediente</h6>
                        <a class="collapse-item {{ Request::is('citas*') ? 'active' : '' }}" href="/citas">Citas</a>
                        <a class="collapse-item {{ Request::is('seguros*') ? 'active' : '' }}" href="/seguros">Seguros</a>
                        <a class="collapse-item {{ Request::is('doctores*') ? 'active' : '' }}" href="/doctores">Doctores</a>
                    </div>
                </div>
            </li>
        @endif
    @endauth
    
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>