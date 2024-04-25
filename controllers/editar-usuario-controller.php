<?php

require_once("../config/database.php");

$usuario_id = $_POST["usuario_id"];
$primer_nombre = strtoupper($_POST["primer_nombre"]);
$segundo_nombre = strtoupper($_POST["segundo_nombre"]);
$primer_apellido = strtoupper($_POST["primer_apellido"]);
$segundo_apellido = strtoupper($_POST["segundo_apellido"]);
$numero_documento = $_POST["numero_documento"];
$firma_usuario = strtolower($_POST["firma_usuario"]);
$contraseña = md5($_POST["contraseña"]);
$cargo_usuario = strtoupper($_POST["cargo_usuario"]);

$update = "UPDATE usuarios u
LEFT JOIN cargos_usuarios cu ON u.usuario_id = cu.usuario_fk
LEFT JOIN fotos_usuarios fu ON u.usuario_id = fu.usuario_fk
LEFT JOIN firmas_usuarios fiu ON u.usuario_id = fiu.usuario_fk
LEFT JOIN estatus_usuarios eu ON u.usuario_id = eu.usuario_fk
SET u.primer_nombre = '$primer_nombre',
    u.segundo_nombre = '$segundo_nombre',
    u.primer_apellido = '$segundo_nombre',
    u.segundo_apellido = '$segundo_apellido', 
    u.numero_documento = '$numero_documento',
    u.contraseña = '$contraseña',
    cu.cargo_usuario = '$cargo_usuario',
    fiu.firma_usuario = '$firma_usuario'
WHERE u.usuario_id = '$usuario_id'";

$query = mysqli_query($conn, $update);
mysqli_close($conn);
echo "<script>
    alert('SE ACTUALIZO SATISFACTORIAMENTE');
    window.location.href = '../gestion-usuarios.php';
    </script>";

?>