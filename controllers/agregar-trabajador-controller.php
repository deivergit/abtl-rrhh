<?php

if (isset($_POST["registrar_trabajador"])) {
   require_once("../config/database.php");

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

   $insert_table_trabajadores = "INSERT INTO trabajadores(fecha_ingreso, fecha_egreso, estatus, categoria) VALUES('$fecha_ingreso','$fecha_egreso','$estatus','$categoria')";

   if ($conn->query($insert_table_trabajadores)) {

      $trabajador_fk = $conn->insert_id;

      $insert_table_cargos_ejercidos = "INSERT INTO cargos_ejercidos(trabajador_fk, direccion_adscrita, cargo, fecha_inicio, fecha_fin) VALUES('$trabajador_fk', '$direccion_adscrita', '$cargo', '$fecha_inicio', '$fecha_fin')";
      $conn->query($insert_table_cargos_ejercidos);

      $insert_table_documentos_de_identidad = "INSERT INTO documentos_identidad_trabajadores(trabajador_fk, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, numero_documento, pais_nacimiento, estado_civil, fecha_nacimiento, sexo) VALUES('$trabajador_fk','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido', '$tipo_documento', '$numero_documento', '$pais_nacimiento', '$estado_civil', '$fecha_nacimiento', '$sexo')";
      $conn->query($insert_table_documentos_de_identidad);

      $insert_table_escala_remuneracion = "INSERT INTO escala_remuneracion_trabajadores(trabajador_fk, escala_remuneracion) VALUES('$trabajador_fk', '$escala_remuneracion')";
      $conn->query($insert_table_escala_remuneracion);

      $insert_table_sueldos_trabajadores = "INSERT INTO sueldos_trabajadores(trabajador_fk, sueldo_base) VALUES('$trabajador_fk', '$sueldo')";
      $conn->query($insert_table_sueldos_trabajadores);
   }

   mysqli_close($conn);
   header("Location: ../trabajadores.php");
}
