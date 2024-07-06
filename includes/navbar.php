<nav class="navbar navbar-dark navbar-expand-lg navbar-fixed-top bg-dark sticky-lg-top" style="padding:15px;">
  <div class="container-fluid">
    <div class="me-auto">
      <img src="img/logo-b-white.png" alt="">

    </div>

    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="#cover-container">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="#acerca">Acerca</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="#consulta-container">Consultar</a>
          </li>
        </ul>
      </div>
    </div><?php if (isset($_SESSION['id'])) { ?>  
      <a href="login.php" class="login-button"><i class="fa-solid fa-circle-user me-2" style="color: #ffffff;"></i><?php echo $_SESSION['nombres'] ?> <?php echo $_SESSION['apellidos'] ?></a>
    <?php }else{ ?><a href="login.php" class="login-button">Ingresar</a><?php     
    } ?>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>