<!-- Sidebar -->
<ul class="navbar-nav backgroundside sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
    <div>
        <img class="logoapp" src="./assets/img/FFAAstatuslogo.png">
    </div>
    <div class="sidebar-brand-text mx-3">Admin panel</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="home.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Herramientas
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Acciones</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./registroUsuario.php">Registrar Usuario</a>
            <div class="collapse-divider"></div>
            <a class="collapse-item" href="./registroCombatiente.php">Registrar Combatientes</a>
            <div class="collapse-divider"></div>
        </div>
    </div>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="./tablaUsuarios.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Lista de Usuarios</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="./tablaCombatientes.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Lista de Combatientes</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->