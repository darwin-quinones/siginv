<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="CARGAR IMAGEN AQUI"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIGINV</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo URL_SISINV ?>Home/index">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>INICIO</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span><strong>INVENTARIO</strong></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Que desea realizar!</h6>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Herramienta/ListarHerramienta"><strong>HERRAMIENTAS</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Materiales/ListarMateriales"><strong>MATERIALES</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Equipo/ListarEquipo"><strong>EQUIPOS</strong></a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfig" aria-expanded="true" aria-controls="collapseConfig">
      <i class="fas fa-fw fa-wrench"></i>
      <span><strong>CONFIGURACION</strong></span>
    </a>
    <div id="collapseConfig" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">¡Informacion del Sistema!</h6>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Regional/ListarRegional"><strong>REGIONAL</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Centro/ListarCentro"><strong>CENTRO</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Sede/ListarSede"><strong>SEDE</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Ambiente/ListarAmbiente"><strong>AMBIENTE</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Bodega/ListarBodega"><strong>BODEGAS</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Estante/ListarEstante"><strong>ESTANTES</strong></a>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Gaveta/ListarGaveta"><strong>GAVETAS</strong></a>
        <!-- <a class="collapse-item" href="#">Animations</a>
            <a class="collapse-item" href="#">Other</a> -->
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePers" aria-expanded="true" aria-controls="collapsePers">
      <i class="fas fa-users"></i>
      <span><strong>PERSONAL</strong></span>
    </a>
    <div id="collapsePers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">¡Informacion del Personal!</h6>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Instructor/ListarInstructor"><strong>INSTRUTOR</strong></a>
        <!-- <a class="collapse-item" href="#">Animations</a>
            <a class="collapse-item" href="#">Other</a> -->
      </div>
    </div>
  </li>


  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSoli" aria-expanded="true" aria-controls="collapseSoli">
      <i class="fas fa-fw fa-wrench"></i>
      <span><strong>SOLICITUDES</strong></span>
    </a>
    <div id="collapseSoli" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">¡Recursos!</h6>
        <a class="collapse-item" href="<?php echo URL_SISINV; ?>Solicitud/SolicitarHerramientas"><strong>HERRAMIENTAS</strong></a>
        <a class="collapse-item" href="#"><strong>SIN DEFINIR</strong></a>
        <a class="collapse-item" href="#"><strong>SIN DEFINIR</strong></a>
        <!-- <a class="collapse-item" href="#">Animations</a>
            <a class="collapse-item" href="#">Other</a> -->
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>