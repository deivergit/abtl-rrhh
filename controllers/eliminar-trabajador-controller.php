<?php

require_once("../config/database.php");

$trabajador_id = $_GET["trabajador_id"];

$sql = "DELETE t, di FROM trabajadores t 
LEFT JOIN documentos_identidad_trabajadores di ON t.trabajador_id = di.trabajador_fk
LEFT JOIN cargos_ejercidos ce ON t.trabajador_id = ce.trabajador_fk
LEFT JOIN escala_remuneracion_trabajadores er ON t.trabajador_id = er.trabajador_fk
LEFT JOIN sueldos_trabajadores st ON t.trabajador_id = st.trabajador_fk
WHERE t.trabajador_id = '$trabajador_id'";

$result = mysqli_query($conn, $sql);
header("location: ../trabajadores.php");
mysqli_close($conn);
exit;

?>