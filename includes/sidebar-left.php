<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <img src="img/credi-manager-logo.png" class="w-75">
        </div>
        <ul class="sidebar-nav">

            <li class="sidebar-header">
                Elementos de <?php echo $_SESSION['usuario'] ?>
            </li>

            <li <?php echo ($view === 'inicio') ? 'class="sidebar-active-link"' : ''; ?>>
                <a href="dashboard.php?view=inicio" class="sidebar-link">
                    <i class="fa-solid fa-house pe-2"></i>
                    Inicio
                </a>
            </li>

            <?php if ($_SESSION['rol'] === '1' || $_SESSION['rol'] === '3') { ?>
                <li <?php echo ($view === 'gestionar') ? 'class="sidebar-active-link"' : ''; ?>>
                    <a href="dashboard.php?view=gestionar" class="sidebar-link">
                        <i class="fa-solid fa-file-lines pe-2"></i>
                        Gestionar
                    </a>
                </li>
                <li <?php echo ($view === 'consultas') ? 'class="sidebar-active-link"' : ''; ?>>
                    <a href="dashboard.php?view=consultas" class="sidebar-link">
                        <i class="fa-solid fa-list-check pe-2"></i>
                        Consultas
                    </a>
                </li>
                <li <?php echo ($view === 'ventas') ? 'class="sidebar-active-link"' : ''; ?>>
                    <a href="dashboard.php?view=ventas" class="sidebar-link">
                        <i class="fa-solid fa-cash-register pe-2"></i>
                        Ventas
                    </a>
                </li>

            <?php } ?>

            <?php if ($_SESSION['rol'] === '2') { ?>
                <li <?php echo ($view === 'metas') ? 'class="sidebar-active-link"' : ''; ?>>
                    <a href="dashboard.php?view=metas" class="sidebar-link">
                        <i class="fa-solid fa-bullseye pe-2"></i>
                        Metas
                    </a>
                </li>
                <li <?php echo ($view === 'base') ? 'class="sidebar-active-link"' : ''; ?>>
                    <a href="dashboard.php?view=base" class="sidebar-link">
                        <i class="fa-solid fa-database pe-2"></i>
                        Base
                    </a>
                </li>
            <?php }  ?>

            <?php if ($_SESSION['rol'] === '1') { ?>
                <li <?php echo ($view === 'usuarios') ? 'class="sidebar-active-link"' : ''; ?>>
                    <a href="dashboard.php?view=usuarios" class="sidebar-link">
                        <i class="fa-solid fa-users pe-2"></i>
                        Usuarios
                    </a>
                </li>
            <?php }  ?>
        </ul>
    </div>
</aside>