<aside class="aside" id="aside">
    <div class="user-information">
        <img src="./views/resources/images/avatar.webp" class="user-information__user-photo"
            alt="foto de perfil">
        <img src="./views/resources/icons/circle.svg" alt="circle" class="user-information__circle">
    </div>
    <div class="usernames">
            <?php echo $primer_nombre . " " . $primer_apellido; ?>
    </div>
    <nav class="main_nav">
        <ul class="list">
        <li class="list__item">
                <a href="reportes.php" class="nav__link <?php echo $boton_1 ?>">
                    <img src="./views/resources/icons/dashboard.svg" class="list__icon" alt="icono"><span
                        class="list__text">Reportes</span>
                </a>
            </li>
            <li class="list__item">
                <a href="trabajadores.php" class="nav__link <?php echo $boton_2 ?>">
                    <img src="./views/resources/icons/briefcase.svg" class="list__icon" alt="icono"><span
                        class="list__text">Trabajadores</span>
                </a>
            </li>
            <li class="list__item">
                <a href="constancias-de-trabajo.php" class="nav__link <?php echo $boton_3 ?>">
                    <img src="./views/resources/icons/book-content.svg" class="list__icon" alt="icono"><span
                        class="list__text">Constancias de trabajo</span>
                </a>
            </li>
            <li class="list__item">
                <a href="./controllers/cerrar-sesion-controller.php" class="nav__link"><img
                        src="./views/resources/icons/power-off.svg" class="list__icon" alt="icono"><span
                        class="list__text">Cerrar sesión</span></a>
            </li>
        </ul>
    </nav>
</aside>