<?php

require_once("./config/database.php");

# VALIDATION SESSION
session_start();
if (isset($_SESSION["usuario_id"])) {
}   else {
        die(header("Location:./index.php"));
}

# SESSION VARIABLES

$usuario_id = $_SESSION["usuario_id"];
$consulta_sql_usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE numero_documento = '$usuario_id';");
$datos_usuario_consultado = mysqli_fetch_array($consulta_sql_usuario);
$primer_nombre = $datos_usuario_consultado['primer_nombre'];
$primer_apellido = $datos_usuario_consultado['primer_apellido'];

# PAGE TITLE
$page_title = "REPORTES";
$item_one = "Reportes";
$item_two = "Generar reportes / Lista del personal";
$url_icon = "dashboard.svg";
$boton_1 = "boton_active";
$boton_2 = "";
$boton_3 = "";
$boton_4 = "";

#CONSULTAS

$query_trabajadores_activos = mysqli_query($conn, "SELECT COUNT(*) trabajadores_activos FROM trabajadores WHERE categoria = 'ACTIVO'");
$result_trabajadores_activos = mysqli_fetch_assoc($query_trabajadores_activos);

$query_trabajadores_contratados = mysqli_query($conn, "SELECT COUNT(*) trabajadores_contratados FROM trabajadores WHERE categoria = 'CONTRATADO'");
$result_trabajadores_contratados = mysqli_fetch_assoc($query_trabajadores_contratados);

$query_trabajadores_empleados_alto_nivel = mysqli_query($conn, "SELECT COUNT(*) trabajadores_empleados_alto_nivel FROM trabajadores WHERE categoria = 'EMPLEADO ALTO NIVEL'");
$result_trabajadores_empleados_alto_nivel = mysqli_fetch_assoc($query_trabajadores_empleados_alto_nivel);
?>

<!DOCTYPE html>
<html lang="es">

<?php
require("./views/components/head.php");
?>
<link rel="stylesheet" href="./views/resources/css/indicadores.css">
</head>

<body>
    <div class="main-container">
    <?php
    require_once("./views/components/aside.php");
    ?>
        <div class="container">
            <?php
                include("./views/components/header.php");
                include("./views/components/bar-leyend.php");
            ?>
            <div class="indicator-box">
                <div class="indicator">
                    <h2 class="indicator__title">Trabajadores activos</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_activos["trabajadores_activos"]?></span>
                    <a href="./reports/reporte-trabajadores-activos.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
                <div class="indicator">
                    <h2 class="indicator__title">Trabajadores contratados</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_contratados["trabajadores_contratados"];?></span>
                    <a href="./reports/reporte-trabajadores-contratados.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
                <div class="indicator">
                    <h2 class="indicator__title">Trabajadores empleados alto nivel</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_empleados_alto_nivel["trabajadores_empleados_alto_nivel"];?></span>
                    <a href="./reports/reporte-trabajadores-alto-nivel.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="./views/resources/js/main.js"></script>

</html>