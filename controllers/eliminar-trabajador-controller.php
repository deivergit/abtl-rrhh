<?php

require_once("../config/database.php");

$trabajador_id = $_GET["trabajador_id"];

$sql = "DELETE t, di FROM trabajadores t 
LEFT JOIN documentos_identidad di ON t.trabajador_id = di.id_documento_identidad 
LEFT JOIN cargos_ejercidos ce ON t.trabajador_id = ce.cargo_ejercido_id
LEFT JOIN escala_remuneracion er ON t.trabajador_id = er.escala_remuneracion_id
LEFT JOIN sueldos_trabajadores st ON t.trabajador_id = st.sueldos_trabajadores_id
WHERE t.trabajador_id = '$trabajador_id'";

$result = mysqli_query($conn, $sql);
header("location: ../trabajadores.php");
mysqli_close($conn);
exit;

?>