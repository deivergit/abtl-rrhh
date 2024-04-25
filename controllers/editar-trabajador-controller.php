<?php

require_once("../config/database.php");

$trabajador_id = $_POST["trabajador_id"];

# TABLE TRABAJADORES
$fecha_ingreso = $_POST["fecha_ingreso"];
$fecha_egreso = $_POST["fecha_egreso"];
$estatus = strtoupper($_POST["estatus"]);
$categoria = strtoupper($_POST["categoria"]);

# TABLE DOCUMENTOS DE IDENTIDAD
$primer_nombre = strtoupper($_POST["primer_nombre"]);
$segundo_nombre = strtoupper($_POST["segundo_nombre"]);
$primer_apellido = strtoupper($_POST["primer_apellido"]);
$segundo_apellido = strtoupper($_POST["segundo_apellido"]);
$tipo_documento = $_POST["tipo_documento"];
$numero_documento = $_POST["numero_documento"];
$estado_civil = strtoupper($_POST["estado_civil"]);
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$pais_nacimiento = strtoupper($_POST["pais_nacimiento"]);
$sexo = strtoupper($_POST["sexo"]);

# TABLE CARGOS EJERCIDOS
$direccion_adscrita = strtoupper($_POST["direccion_adscrita"]);
$cargo = strtoupper($_POST["cargo"]);
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];

# TABLE ESCALA REMUNERACION
$escala_remuneracion = strtoupper($_POST["escala_remuneracion"]);

# TABLE SUELDOS TRABAJADORES
$sueldo = $_POST["sueldo"];

$update = "UPDATE trabajadores t 
LEFT JOIN documentos_identidad_trabajadores di ON t.trabajador_id = di.id_documento_identidad
LEFT JOIN cargos_ejercidos ce ON t.trabajador_id = ce.cargo_ejercido_id
LEFT JOIN escala_remuneracion_trabajadores er ON t.trabajador_id = er.escala_remuneracion_id
LEFT JOIN sueldos_trabajadores st ON t.trabajador_id = st.sueldo_trabajador_id 
SET t.fecha_ingreso = '$fecha_ingreso', t.fecha_egreso = '$fecha_egreso', t.categoria = '$categoria', t.estatus = '$estatus',
di.primer_nombre = '$primer_nombre', di.segundo_nombre = '$segundo_nombre', di.primer_apellido = '$primer_apellido', di.segundo_apellido = '$segundo_apellido', di.tipo_documento = '$tipo_documento', di.numero_documento = '$numero_documento',
di.estado_civil = '$estado_civil', di.fecha_nacimiento = '$fecha_nacimiento', di.pais_nacimiento = '$pais_nacimiento', di.sexo = '$sexo',
ce.fecha_inicio = '$fecha_inicio', ce.fecha_fin = '$fecha_fin', ce.direccion_adscrita = '$direccion_adscrita', ce.cargo = '$cargo',
er.escala_remuneracion = '$escala_remuneracion',
st.sueldo_base = '$sueldo'
WHERE trabajador_id = '$trabajador_id'";

$query = mysqli_query($conn, $update);
mysqli_close($conn);
header("Location: ../trabajadores.php");

?>