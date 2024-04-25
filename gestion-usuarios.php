<?php

require_once("./config/database.php");

# VALIDATION SESSION
session_start();
if (isset($_SESSION["usuario_id"])) {
} else {
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
$hola = $datos_usuario_consultado["usuario_id"];


# PAGE TITLE
$page_title = "GESTION DE USUARIOS";
$item_one = "Gestión de usuarios";
$item_two = "Cambiar parametros de usuario";
$url_icon = "user.svg";

$button_1 = "boton_desactivado";
$button_2 = "boton_desactivado";
$button_3 = "boton_desactivado";
$button_4 = "boton_desactivado";
$button_5 = "boton_active";

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
            include("./config/database.php");

            $editar_usuario = "SELECT u.usuario_id, u.primer_nombre, u.segundo_nombre, u.primer_apellido, u.segundo_apellido,
            u.numero_documento, u.contraseña, cu.cargo_usuario, fu.nombre_foto_usuario, fu.ruta_foto_usuario,
            fiu.firma_usuario, eu.estatus_usuario FROM usuarios u
            LEFT JOIN cargos_usuarios cu ON u.usuario_id = cu.usuario_fk
            LEFT JOIN fotos_usuarios fu ON u.usuario_id = fu.usuario_fk
            LEFT JOIN firmas_usuarios fiu ON u.usuario_id = fiu.usuario_fk
            LEFT JOIN estatus_usuarios eu ON u.usuario_id = eu.usuario_fk
            WHERE u.usuario_id = '$usuario_id'";

            $result_editar_usuario = mysqli_query($conn, $editar_usuario);
            while ($row = mysqli_fetch_array($result_editar_usuario)) {
            ?>
                <form action="./controllers/editar-usuario-controller.php" method="POST" class="form--edit">
                <input type="hidden" name="usuario_id" value="<?php echo $row['usuario_id']; ?>">
                <div class="input-box">
                    <label for="primer_nombre">Primer nombre</label>
                    <input type="text" name="primer_nombre" value="<?php echo $row['primer_nombre']; ?>" id="primer_nombre">
                </div>
                <div class="input-box">
                    <label for="">Segundo nombre</label>
                    <input type="text" name="segundo_nombre" value="<?php echo $row['segundo_nombre']; ?>">
                </div>
                <div class="input-box">
                    <label for="">Primer apellido</label>
                    <input type="text" name="primer_apellido" value="<?php echo $row['primer_apellido']; ?>">
                </div>
                <div class="input-box">
                    <label for="">Segundo apellido</label>
                    <input type="text" name="segundo_apellido" value="<?php echo $row['segundo_apellido']; ?>">
                </div>
                <div class="input-box">
                    <label for="">Numero de documento</label>
                    <input type="text" name="numero_documento" value="<?php echo $row['numero_documento']; ?>">
                </div>
                <div class="input-box">
                    <label for="">Firma</label>
                    <input type="text" name="firma_usuario" value="<?php echo $row['firma_usuario']; ?>" maxlength="4">
                </div>
                <div class="input-box">
                    <label for="cargo">Cargo</label>
                    <select id="cargo" class="select" name="cargo_usuario">
                        <option value="<?php echo $row['cargo_usuario'] ?>" selected><?php echo $row['cargo_usuario']; ?></option>
                        <?php
                        $consulta_cargos = "SELECT * FROM cargos_usuarios";
                        $resultado_consulta_cargos = mysqli_query($conn, $consulta_cargos);
                        while ($ros = mysqli_fetch_array($resultado_consulta_cargos)) {
                            $result_consulta_cargos = $ros["cargo_usuario"];
                        ?>
                            <option value="<?php echo $result_consulta_cargos ?>"><?php echo $result_consulta_cargos ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="">Contraseña</label>
                    <input type="text" name="contraseña" required>
                </div>
                <div class="box-button">
                    <button type="submit" class="button---save-s">Guardar</button>
                </div>

            <?php } ?>

        </div>
    </div>
    </div>
</body>

</html>