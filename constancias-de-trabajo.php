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
$page_title = "CONSTACIAS DE TRABAJO";
$item_one = "Constacias de trabajo";
$item_two = "Generar constancia de trabajo";
$url_icon = "book-content.svg";
$boton_1 = "";
$boton_2 = "";
$boton_3 = "boton_active";
$boton_4 = "";
?>

<!DOCTYPE html>
<html lang="es">

<?php
require("./views/components/head.php");
?>
<link rel="stylesheet" href="./views/resources/css/constancia-trabajo.css">
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
            <div class="box-formularios">
                <form action="./reports/ct-empleado-con-sueldo.php" method="get" target="_blank" class="formulario-ct">
                    <p>Constancia de trabajo con sueldo para EMPLEADO</p>
                    <input type="text" name="trabajador_id">
                    <button type="submit">Generar constancia</button>
                </form>
                <form action="./reports/ct-contratado-con-sueldo.php" method="get" target="_blank"
                    class="formulario-ct">
                    <p>Constancia de trabajo con sueldo para CONTRATADO</p>
                    <input type="text" name="trabajador_id">
                    <button type="submit">Generar constancia</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>