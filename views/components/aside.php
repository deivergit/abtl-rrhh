<aside class="aside" id="aside">
    <div class="user-information">
        <img src=".<?php echo $ruta_foto_usuario; ?>" class="user-information__user-photo"
            alt="foto de perfil">
        <img src="./views/resources/icons/circle.svg" alt="circle" class="user-information__circle">
    </div>
    <div class="usernames">
        <?php echo $primer_nombre_usuario . " " . $primer_apellido_usuario; ?>
    </div>
    <span class="type_user"><?php echo $cargo_usuario; ?></span>
    <nav class="main_nav">
        <ul class="list">
        <li class="list__item">
                <a href="reportes.php" class="nav__link <?php echo $button_1 ?>">
                    <img src="./views/resources/icons/report.svg" class="list__icon" alt="icono"><span
                        class="list__text">Reportes</span>
                </a>
            </li>
            <li class="list__item">
                <a href="trabajadores.php" class="nav__link <?php echo $button_2 ?>">
                    <img src="./views/resources/icons/briefcase.svg" class="list__icon" alt="icono"><span
                        class="list__text">Trabajadores</span>
                </a>
            </li>
            <li class="list__item">
                <a href="constancias-trabajo.php" class="nav__link <?php echo $button_3 ?>">
                    <img src="./views/resources/icons/book-content.svg" class="list__icon" alt="icono"><span
                        class="list__text">Constancias de trabajo</span>
                </a>
            </li>
            <!-- <li class="list__item">
                <button class="nav__link <?php echo $button_4 ?>">
                    <img src="./views/resources/icons/table.svg" class="list__icon" alt="icono">
                    <span class="list__text">Tablas de consulta</span>
                    <img src="./views/resources/icons/arrow.svg" class="list__icon" alt="icono">
                </button>
            </li> -->
            <li class="list__item">
                <a href="gestion-usuarios.php" class="nav__link <?php echo $button_5 ?>">
                    <img src="./views/resources/icons/user.svg" class="list__icon" alt="icono"><span
                        class="list__text">Gestión de
                        usuarios</span>
                </a>
            </li>
            <li class="list__item button-hidden">
                <a href="./controllers/cerrar-sesion-controller.php" class="nav__link"><img
                        src="./views/resources/icons/power-off.svg" class="list__icon" alt="icono"><span
                        class="list__text">Cerrar sesión</span></a>
            </li>
        </ul>
    </nav>
</aside>