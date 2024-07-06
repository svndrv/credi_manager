<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">CrediManager</a>
            <p class="text-secondary">para <span id="credi">Credi</span><span id="scotia">Scotia</span></p>
        </div>
        <ul class="sidebar-nav">

            <li class="sidebar-header">
                Elementos de <?php echo $_SESSION['usuario'] ?>
            </li>
            
            <?php if ($_SESSION['rol'] === '1') { ?>
                <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-coins pe-2"></i>
                    Ventas
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-users pe-2"></i>
                    Empleados
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Lista de Consultas
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-file-lines pe-2"></i>
                    Gestionar
                </a>
            </li>
            <?php }  ?>
            <?php if ($_SESSION['rol'] === '2') { ?>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-bullseye pe-2"></i>
                        Metas
                    </a>
                </li>
                <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-database pe-2"></i>
                    Base
                </a>
            </li>
            <?php }  ?>
            <?php if ($_SESSION['rol'] === '3') { ?>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Lista de Consultas
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-file-lines pe-2"></i>
                    Gestionar
                </a>
            </li>
            <?php }  ?>
        </ul>
    </div>
</aside>