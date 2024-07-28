<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <?php echo $_SESSION['nombres']?> <?php echo $_SESSION['apellidos']?>
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0 m-3">
                    <img src="img/profile.jpg" class="avatar img-fluid rounded" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="logout.php" class="dropdown-item">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </div>
</nav>





