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
$page_title = "TRABAJADORES";
$item_one = "Editar trabajador";
$item_two = "Editar los datos del trabajador";
$url_icon = "briefcase.svg";
$boton_1 = "";
$boton_2 = "boton_active";
$boton_3 = "";
$boton_4 = "";
?>

<!DOCTYPE html>
<html lang="es">

<?php
include("./views/components/head.php");
?>
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
                $trabajador_id = $_GET["trabajador_id"];
                $editar_trabajador = "SELECT * FROM trabajadores 
                INNER JOIN documentos_identidad ON trabajadores.trabajador_id = documentos_identidad.id_documento_identidad
                INNER JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.sueldos_trabajadores_id
                INNER JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.cargo_ejercido_id
                INNER JOIN escala_remuneracion ON trabajadores.trabajador_id = escala_remuneracion.escala_remuneracion_id
                WHERE trabajador_id = '$trabajador_id'";
                $result_editar_trabajador = mysqli_query($conn, $editar_trabajador);
            ?>
            <form action="./controllers/editar-trabajador-controller.php" method="POST" class="form--edit">
                <?php 
            while ($row = mysqli_fetch_array($result_editar_trabajador)) { ?>
                <input type="hidden" name="trabajador_id" value="<?php echo $row['trabajador_id']; ?>">
                <div class="input-box">
                    <label for="">Categoria</label>
                    <select name="categoria" id="" class="select">
                        <option value="<?php echo $row["categoria"]; ?>" selected><?php echo $row["categoria"]; ?></option>
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="EGRESADO">EGRESADO</option>
                        <option value="JUBILADO">JUBILADO</option>
                        <option value="INCAPACITADO">INCAPACITADO</option>
                        <option value="COMISION DE SERVICIO">COMISION DE SERVICIO</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="estatus">Estatus</label>
                    <select name="estatus" id="estatus" class="select">
                        <option value="<?php echo $row["estatus"]; ?>" selected><?php echo $row["estatus"]; ?></option>
                        <option value="ALTO FUNCIONARIO">ALTO FUNCIONARIO</option>
                        <option value="ALTO NIVEL">ALTO NIVEL</option>
                        <option value="EMPLEADO">EMPLEADO</option>
                        <option value="CONTRATADO">CONTRATADO</option>
                        <option value="OBRERO">OBRERO</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="">fecha de ingreso</label>
                    <input type="date" name="fecha_ingreso" value="<?php echo $row['fecha_ingreso']; ?>" class="date" />
                </div>
                <div class="input-box">
                    <label for="">fecha de egreso</label>
                    <input type="date" name="fecha_egreso" value="<?php echo $row['fecha_egreso']; ?>">
                </div>
                <div class="input-box">
                    <label for="primer_nombre">Primer nombre</label>
                    <input type="text" name="primer_nombre" value="<?php echo $row['primer_nombre']; ?>"
                        id="primer_nombre">
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
                    <label for="">Tipo de documento</label>
                    <select name="tipo_documento" id="" class="select">
                        </option>
                        <option value="<?php echo $row["tipo_documento"];?>" selected><?php echo $row["tipo_documento"];?>
                        <option value="V">V</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="">Numero de documento</label>
                    <input type="text" name="numero_documento" value="<?php echo $row['numero_documento']; ?>">
                </div>
                <div class="input-box">
                    <label for="">Estado civil</label>
                    <select name="estado_civil" id="" class="select">
                        <option value="<?php echo $row["estado_civil"];?>" selected><?php echo $row["estado_civil"];?>
                        </option>
                        <option value="SOLTERA">SOLTERA</option>
                        <option value="SOLTERO">SOLTERO</option>
                        <option value="CASADA">CASADA</option>
                        <option value="CASADO">CASADO</option>
                        <option value="DIVORCIADA">DIVORCIADA</option>
                        <option value="DIVOCIADO">DIVOCIADO</option>
                        <option value="VIUDA">VIUDA</option>
                        <option value="VIUDO">VIUDO</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="">fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
                </div>
                <div class="input-box">
                    <label for="">Pais de nacimiento</label>
                    <input type="text" name="pais_nacimiento" value="<?php echo $row['pais_nacimiento']; ?>">
                </div>
                <div class="input-box">
                    <label for="">Sexo</label>
                    <select name="sexo" id="" class="select">
                        <option value="<?php echo $row["sexo"]; ?>" selected><?php echo $row["sexo"]; ?></option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="escala_remuneracion">Escala del trabajador</label>
                    <select name="escala_remuneracion" id="escala_remuneracion" class="select">
                        <option value="<?php echo $row["escala_remuneracion"] ?>" selected>
                            <?php echo $row["escala_remuneracion"] ?></option>
                        <option value="BI-I">BI-I</option>
                        <option value="BI-II">BI-II</option>
                        <option value="BI-III">BI-III</option>
                        <option value="BI-IV">BI-IV</option>
                        <option value="BI-V">BI-V</option>
                        <option value="BI-VI">BI-VI</option>
                        <option value="BI-VII">BI-VII</option>
                        <option value="BII-I">BII-I</option> <!-- EMPIEZA ACA -->
                        <option value="BII-II">BII-II</option>
                        <option value="BII-III">BII-III</option>
                        <option value="BII-IV">BII-IV</option>
                        <option value="BII-V">BII-V</option>
                        <option value="BII-VI">BII-VI</option>
                        <option value="BII-VII">BII-VII</option>
                        <option value="BIII-I">BIII-I</option> <!-- EMPIEZA ACA -->
                        <option value="BIII-II">BIII-II</option>
                        <option value="BIII-III">BIII-III</option>
                        <option value="BIII-IV">BIII-IV</option>
                        <option value="BIII-V">BIII-V</option>
                        <option value="BIII-VI">BIII-VI</option>
                        <option value="BIII-VII">BIII-VII</option>
                        <option value="TI-I">TI-I</option> <!-- EMPIEZA ACA -->
                        <option value="TI-II">TI-II</option>
                        <option value="TI-III">TI-III</option>
                        <option value="TI-IV">TI-IV</option>
                        <option value="TI-V">TI-V</option>
                        <option value="TI-VI">TI-VI</option>
                        <option value="TI-VII">TI-VII</option>
                        <option value="TII-I">TII-I</option> <!-- EMPIEZA ACA -->
                        <option value="TII-II">TII-II</option>
                        <option value="TII-III">TII-III</option>
                        <option value="TII-IV">TII-IV</option>
                        <option value="TII-V">TII-V</option>
                        <option value="TII-VI">TII-VI</option>
                        <option value="TII-VII">TII-VII</option>
                        <option value="PI-I">PI-I</option> <!-- EMPIEZA ACA -->
                        <option value="PI-II">PI-II</option>
                        <option value="PI-III">PI-III</option>
                        <option value="PI-IV">PI-IV</option>
                        <option value="PI-V">PI-V</option>
                        <option value="PI-VI">PI-VI</option>
                        <option value="PI-VII">PI-VII</option>
                        <option value="PII-I">PII-I</option> <!-- EMPIEZA ACA -->
                        <option value="PII-II">PII-II</option>
                        <option value="PII-III">PII-III</option>
                        <option value="PII-IV">PII-IV</option>
                        <option value="PII-V">PII-V</option>
                        <option value="PII-VI">PII-VI</option>
                        <option value="PII-VII">PII-VII</option>
                        <option value="PIII-I">PIII-I</option> <!-- EMPIEZA ACA -->
                        <option value="PIII-II">PIII-II</option>
                        <option value="PIII-III">PIII-III</option>
                        <option value="PIII-IV">PIII-IV</option>
                        <option value="PIII-V">PIII-V</option>
                        <option value="PIII-VI">PIII-VI</option>
                        <option value="PIII-VII">PIII-VII</option>
                    </select>
                </div>
                <div class="input-box">
                    <label for="">Sueldo del trabajador</label>
                    <input type="text" name="sueldo" value="<?php echo $row['sueldo']; ?>">
                </div>
                <div class="input-box">
                    <label for="">fecha de inicio</label>
                    <input type="date" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>">
                </div>
                <div class="input-box">
                    <label for="">fecha de fin</label>
                    <input type="date" name="fecha_fin" value="<?php echo $row['fecha_fin']; ?>">
                </div>

                <div class="input-box">
                    <label for="cargo">Cargo</label>
                    <select id="cargo" class="select" name="cargo">
                        <option value="<?php echo $row['cargo'] ?>" selected><?php echo $row['cargo']; ?></option>
                        <?php
                        $consulta_cargos = "SELECT cargo FROM consulta_cargos";
                        $resultado_consulta_cargos = mysqli_query($conn, $consulta_cargos);
                        while ($ros = mysqli_fetch_array($resultado_consulta_cargos)) {
                            $result_consulta_cargos = $ros["cargo"];
                        ?>
                        <option value="<?php echo $result_consulta_cargos ?>"><?php echo $result_consulta_cargos ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-box">
                    <label for="direccion_adscrita">Direccion adscrita</label>
                    <select name="direccion_adscrita" id="direccion_adscrita" class="select">
                        <option value="<?php echo $row["direccion_adscrita"]; ?>" selected>
                            <?php echo $row["direccion_adscrita"]; ?></option>
                        <?php
                    $consultaDireccionesAdscritas = "SELECT direccion FROM consulta_direcciones ORDER BY direccion ASC";
                    $resultadoConsultaDireccionesAdscritas = mysqli_query($conn, $consultaDireccionesAdscritas);
                    while ($row = mysqli_fetch_array($resultadoConsultaDireccionesAdscritas)) {
                        $direccion = $row["direccion"];
                    ?>
                        <option value="<?php echo $direccion ?>"><?php echo $direccion ?></option>
                        <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="box-button">
                    <button type="submit" class="button---save-s">Guardar</button>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</body>
<script src="../views/resources/js/main.js"></script>

</html>