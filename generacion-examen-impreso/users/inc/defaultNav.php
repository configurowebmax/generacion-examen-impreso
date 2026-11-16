<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="<?php echo base_url ?>index3.html" class="navbar-brand">
      <img src="<?php echo base_url ?>dist/img/AdminLTELogo.png" alt="Logo de AdminLTE" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Enlaces del menú de navegación -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index3.html" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Contacto</a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Desplegable</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="#" class="dropdown-item">Alguna acción</a></li>
            <li><a href="#" class="dropdown-item">Otra acción</a></li>

            <li class="dropdown-divider"></li>

            <!-- Desplegable de segundo nivel -->
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Acción al pasar el mouse</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="#" class="dropdown-item">Nivel 2</a>
                </li>

                <!-- Desplegable de tercer nivel -->
                <li class="dropdown-submenu">
                  <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Nivel 2</a>
                  <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                    <li><a href="#" class="dropdown-item">Tercer nivel</a></li>
                    <li><a href="#" class="dropdown-item">Tercer nivel</a></li>
                  </ul>
                </li>
                <!-- Fin del tercer nivel -->

                <li><a href="#" class="dropdown-item">Nivel 2</a></li>
                <li><a href="#" class="dropdown-item">Nivel 2</a></li>
              </ul>
            </li>
            <!-- Fin del segundo nivel -->
          </ul>
        </li>
      </ul>

      <!-- FORMULARIO DE BÚSQUEDA -->
      <form class="form-inline ml-0 ml-md-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Enlaces del menú derecho -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Menú de mensajes -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Mensaje 1 -->
            <div class="media">
              <img src="<?php echo base_url ?>dist/img/user1-128x128.jpg" alt="Avatar del usuario" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Llámame cuando puedas...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Hace 4 horas</p>
              </div>
            </div>
            <!-- Fin del mensaje 1 -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Mensaje 2 -->
            <div class="media">
              <img src="<?php echo base_url ?>dist/img/user8-128x128.jpg" alt="Avatar del usuario" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Recibí tu mensaje, hermano</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Hace 4 horas</p>
              </div>
            </div>
            <!-- Fin del mensaje 2 -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Mensaje 3 -->
            <div class="media">
              <img src="<?php echo base_url ?>dist/img/user3-128x128.jpg" alt="Avatar del usuario" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">El asunto va aquí</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Hace 4 horas</p>
              </div>
            </div>
            <!-- Fin del mensaje 3 -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todos los mensajes</a>
        </div>
      </li>
      <!-- Menú de notificaciones -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
            <span class="float-right text-muted text-sm">Hace 3 minutos</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 solicitudes de amistad
            <span class="float-right text-muted text-sm">Hace 12 horas</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nuevos reportes
            <span class="float-right text-muted text-sm">Hace 2 días</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>