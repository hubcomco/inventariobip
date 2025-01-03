<head>
    <link href="{{ url('css/admin.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventario BIP</div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        SECCIÓN PRINCIPAL
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmpleados" aria-expanded="true" aria-controls="collapseEmpleados">
            <i class="bi bi-person-bounding-box"></i>
            <span>Empleados</span>
        </a>
        <div id="collapseEmpleados" class="collapse" aria-labelledby="headingEmpleados" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h class="collapse-header">Configuración:</h>
                <a class="collapse-item" href="{{ route('dashboard') }}">Ver o Registrar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEquipos"
            aria-expanded="true" aria-controls="collapseEquipos">
            <i class="bi bi-display"></i>
            <span>Equipos</span>
        </a>
        <div id="collapseEquipos" class="collapse" aria-labelledby="headingEquipos"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('equipos.index')}}">Registrar</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuariosRoles" aria-expanded="true" aria-controls="collapseUsuariosRoles">
            <i class="bi bi-person-vcard"></i>
            <span>Usuarios y roles</span>
        </a>
        <div id="collapseUsuariosRoles" class="collapse" aria-labelledby="headingUsuariosRoles" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Usuario.usuarios') }}">Configurar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        SECCIÓN SECUNDARIA
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHistoriales"
            aria-expanded="true" aria-controls="collapseHistoriales">
            <i class="fas fa-fw fa-folder"></i>
            <span>Historiales</span>
        </a>
        <div id="collapseHistoriales" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Equipos de Bip:</h6>
                <a class="collapse-item" href="{{ route('Historial.historial') }}">Consultar</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaises"
            aria-expanded="true" aria-controls="collapsePaises">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Paises y Ubicaciones</span>
        </a>
        <div id="collapsePaises" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Lugares de Operación BIP:</h6>
                <a class="collapse-item" href="{{ route('Ubicacion.ubicaciones') }}">Consultar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>