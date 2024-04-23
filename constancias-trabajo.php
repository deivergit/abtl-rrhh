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
$page_title = "CONSTACIAS DE TRABAJO";
$item_one = "Constacias de trabajo";
$item_two = "Generar constancia de trabajo";
$url_icon = "book-content.svg";

$button_1 = "boton_desactivado";
$button_2 = "boton_desactivado";
$button_3 = "boton_active";
$button_4 = "boton_desactivado";
$button_5 = "boton_desactivado";

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
                <form action="./reports/ct-alto-nivel-con-sueldo.php" method="get" target="_blank"
                    class="formulario-ct">
                    <p>ALTO NIVEL</p>
                    <input type="text" name="trabajador_id">
                    <button type="submit">Generar constancia</button>
                </form>
                <form action="./reports/ct-empleado-con-sueldo.php" method="get" target="_blank" class="formulario-ct">
                    <p>EMPLEADO</p>
                    <input type="text" name="trabajador_id">
                    <button type="submit">Generar constancia</button>
                </form>
                <form action="./reports/ct-contratado-con-sueldo.php" method="get" target="_blank"
                    class="formulario-ct">
                    <p>CONTRATADO</p>
                    <input type="text" name="trabajador_id">
                    <button type="submit">Generar constancia</button>
                </form>
                <form action="./reports/ct-jubilado-con-sueldo.php" method="get" target="_blank"
                    class="formulario-ct">
                    <p>JUBILADO</p>
                    <input type="text" name="trabajador_id">
                    <button type="submit" title="Generar constancia de trabajado">Generar constancia</button>
                </form>
                <form action="./reports/ct-obrero-con-sueldo.php" method="get" target="_blank"
                    class="formulario-ct">
                    <p>OBRERO</p>
                    <input type="text" name="trabajador_id">
                    <button type="submit" title="Generar constancia de trabajado">Generar constancia</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>