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
$consulta_sql_usuario = mysqli_query($conn, "SELECT * FROM usuarios u
INNER JOIN cargos_usuarios cu ON u.usuario_id = cu.usuario_fk
INNER JOIN fotos_usuarios fu ON u.usuario_id = fu.usuario_fk WHERE usuario_id = '$usuario_id'");
$datos_usuario_consultado = mysqli_fetch_assoc($consulta_sql_usuario);
$primer_nombre_usuario = $datos_usuario_consultado["primer_nombre"];
$primer_apellido_usuario = $datos_usuario_consultado["primer_apellido"];
$cargo_usuario = $datos_usuario_consultado["cargo_usuario"];
$ruta_foto_usuario = $datos_usuario_consultado["ruta_foto_usuario"];

# PAGE TITLE
$page_title = "REPORTES";
$item_one = "Reportes";
$item_two = "Generar reportes / Listas de los trabajadores";
$url_icon = "dashboard.svg";

$button_1 = "boton_active";
$button_2 = "boton_desactivado";
$button_3 = "boton_desactivado";
$button_4 = "boton_desactivado";
$button_5 = "boton_desactivado";

#CONSULTAS

$query_trabajadores_activos = mysqli_query($conn, "SELECT COUNT(*) trabajadores_activos FROM trabajadores WHERE categoria = 'ACTIVO'");
$result_trabajadores_activos = mysqli_fetch_assoc($query_trabajadores_activos);

$query_trabajadores_contratados = mysqli_query($conn, "SELECT COUNT(*) trabajadores_contratados FROM trabajadores WHERE estatus = 'CONTRATADO' AND categoria = 'ACTIVO'");
$result_trabajadores_contratados = mysqli_fetch_assoc($query_trabajadores_contratados);

$query_trabajadores_empleados_alto_nivel = mysqli_query($conn, "SELECT COUNT(*) trabajadores_empleados_alto_nivel FROM trabajadores WHERE estatus = 'ALTO NIVEL' AND categoria ='ACTIVO'");
$result_trabajadores_empleados_alto_nivel = mysqli_fetch_assoc($query_trabajadores_empleados_alto_nivel);

$query_trabajadores_empleados = mysqli_query($conn, "SELECT COUNT(*) trabajadores_empleados FROM trabajadores WHERE estatus = 'EMPLEADO' AND categoria = 'ACTIVO'");
$result_trabajadores_empleados = mysqli_fetch_assoc($query_trabajadores_empleados);

$query_trabajadores_jubilados = mysqli_query($conn, "SELECT COUNT(*) trabajadores_jubilados FROM trabajadores WHERE categoria = 'JUBILADO'");
$result_trabajadores_jubilados = mysqli_fetch_assoc($query_trabajadores_jubilados);

$query_trabajadores_altos_funcionarios = mysqli_query($conn, "SELECT COUNT(*) trabajadores_altos_funcionarios FROM trabajadores WHERE categoria = 'ALTO FUNCIONARIO' AND categoria = 'ACTIVO'");
$result_trabajadores_altos_funcionarios = mysqli_fetch_assoc($query_trabajadores_altos_funcionarios);

$query_trabajadores_obreros = mysqli_query($conn, "SELECT COUNT(*) trabajadores_obreros FROM trabajadores WHERE estatus = 'OBRERO' AND categoria = 'ACTIVO'");
$result_trabajadores_obreros = mysqli_fetch_assoc($query_trabajadores_obreros);

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
                    <h2 class="indicator__title">Contratados</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_contratados["trabajadores_contratados"];?></span>
                    <a href="./reports/reporte-trabajadores-contratados.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
                <div class="indicator">
                    <h2 class="indicator__title">Alto nivel</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_empleados_alto_nivel["trabajadores_empleados_alto_nivel"];?></span>
                    <a href="./reports/reporte-trabajadores-alto-nivel.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
                <div class="indicator">
                    <h2 class="indicator__title">Empleados</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_empleados["trabajadores_empleados"];?></span>
                    <a href="./reports/reporte-trabajadores-empleado.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
                <div class="indicator">
                    <h2 class="indicator__title">Jubilados</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_jubilados["trabajadores_jubilados"];?></span>
                    <a href="./reports/reporte-trabajadores-jubilado.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
                <div class="indicator">
                    <h2 class="indicator__title">Alto funcionario</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_altos_funcionarios["trabajadores_altos_funcionarios"];?></span>
                    <a href="./reports/reporte-trabajadores-altos-funcionarios.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
                <div class="indicator">
                    <h2 class="indicator__title">Obreros</h2>
                    <span class="indicator__value"><?php echo $result_trabajadores_obreros["trabajadores_obreros"];?></span>
                    <a href="./reports/reporte-trabajadores-obreros.php" class="indicator__link" target="_blank"><img src="./views/resources/icons/printer.svg" alt=""></a>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="./views/resources/js/main.js"></script>

</html>