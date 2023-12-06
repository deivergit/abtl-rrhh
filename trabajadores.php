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
$item_one = "Dashboard";
$item_two = "Indicadores";
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
            ?>
            <div class="controller">
                <form method="GET" class="search-form">
                    <input type="text" placeholder="Buscar trabajador" class="input" name="numero_documento">
                    <button type="submit"><img src="./views/resources/icons/search-alt.svg" alt="icono"></button>
                </form>
            </div>

            <div class="controller">
                <button id="abrirModal" class="button-add" title="Agregar nuevo trabajador"><img
                        src="./views/resources/icons/plus.svg" alt=""></button>
            </div>
            <!-- MAIN MODAL -->
            <dialog class="modal" id="ventanaModal">
                <form action="./controllers/agregar-trabajador-controller.php" method="POST" class="form">
                    <div class="box-title">
                        <h1 class="main-title">Registrar Trabajador</h1>
                        <img src="./views/resources/icons/x.svg" alt="" class="cerrar">
                    </div>
                    <div class="input-box">
                        <label for="categoria" class="label">Categoría</label>
                        <select name="categoria" id="categoria">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="EGRESADO">EGRESADO</option>
                            <option value="JUBILADO">JUBILADO</option>
                            <option value="INCAPACITADO">INCAPACITADO</option>
                            <option value="COMISION DE SERVICIO">COMISIÓN DE SERVICIO</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="fecha_ingreso">Fecha de ingreso</label>
                        <input type="date" name="fecha_ingreso" id="fecha_ingreso">
                    </div>
                    <div class="input-box">
                        <label for="fecha_egreso">Fecha de egreso</label>
                        <input type="date" name="fecha_egreso" id="fecha_egreso">
                    </div>
                    <div class="input-box">
                        <label for="estatus">Estatus</label>
                        <select name="estatus" id="estatus">
                            <option value="EMPLEADO">EMPLEADO</option>
                            <option value="EMPLEADO OBRERO">EMPLEADO OBRERO</option>
                            <option value="EMPLEADO ALTO FUNCIONARIO">EMPLEADO ALTO FUNCIONARIO</option>
                            <option value="EMPLEADO ALTO NIVEL">EMPLEADO ALTO NIVEL</option>
                            <option value="CONTRATADO">CONTRATADO</option>
                        </select>
                    </div>
                    <div class="subtitle">
                        <img src="./views/resources/icons/user-black.svg" alt="">
                        <h2>Datos personales</h2>
                    </div>
                    <div class="input-box">
                        <label for="primer_nombre">Primer nombre</label>
                        <input type="text" id="primer_nombre" name="primer_nombre" placeholder="INGRESE PRIMER NOMBRE"
                            autocomplete="off" required>
                    </div>
                    <div class="input-box">
                        <label for="segundo_nombre">Segundo nombre</label>
                        <input type="text" id="segundo_nombre" name="segundo_nombre"
                            placeholder="INGRESE SEGUNDO NOMBRE" autocomplete="off">
                    </div>
                    <div class="input-box">
                        <label for="primer_apellido">Primer apellido</label>
                        <input type="text" id="primer_apellido" name="primer_apellido"
                            placeholder="INGRESE PRIMER APELLIDO" autocomplete="off" required>
                    </div>
                    <div class="input-box">
                        <label for="segundo_apellido">Segundo apellido</label>
                        <input type="text" id="segundo_apellido" name="segundo_apellido"
                            placeholder="INGRESE SEGUNDO APELLIDO" autocomplete="off">
                    </div>
                    <div class="input-box">
                        <label for="tipo_documento">Tipo de documento</label>
                        <select name="tipo_documento" id="tipo_documento">
                            <option value="V">V</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="numero_documento">Número de documento</label>
                        <input type="text" id="numero_documento" name="numero_documento"
                            placeholder="INGRESE NÚMERO DE DOCUMENTO" autocomplete="off" required>
                    </div>
                    <div class="input-box">
                        <label for="pais_de_nacimiento">País de nacimiento</label>
                        <input type="text" id="pais_de_nacimiento" list="lista_de_paises" name="pais_nacimiento"
                            placeholder="INGRESE PAÍS DE NACIMIENTO">
                        <datalist id="lista_de_paises">
                            <?php
                    $query_paises = "SELECT UPPER(nombre) as nombre FROM paises";
                    $result_paises = mysqli_query($conn, $query_paises);
                    while ($row = mysqli_fetch_array($result_paises)) {
                    $pais = $row["nombre"];
                    ?>
                            <option value="<?php echo $pais ?>"><?php echo $pais ?></option>
                            <?php
                    }
                    ?>
                        </datalist>
                    </div>
                    <div class="input-box">
                        <label for="estado_civil">Estado civil</label>
                        <select name="estado_civil" id="estado_civil">
                            <option value="SOLTERO">SOLTERO</option>
                            <option value="SOLTERA">SOLTERA</option>
                            <option value="CASADO">CASADO</option>
                            <option value="CASADA">CASADA</option>
                            <option value="DIVORCIADO">DIVORCIADO</option>
                            <option value="DIVORCIADA">DIVORCIADA</option>
                            <option value="VIUDO">VIUDO</option>
                            <option value="VIUDA">VIUDA</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="input-box">
                        <label for="sexo">Sexo</label>
                        <select name="sexo" id="sexo">
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                        </select>
                    </div>
                    <div class="subtitle">
                        <img src="./views/resources/icons/briefcase-alt-2.svg" alt="">
                        <h2>Cargo a ejercer</h2>
                    </div>
                    <div class="input-box">
                        <label for="direccion_adscrita">Direccion adscrita</label>
                        <input type="text" list="lista_direcciones_adscritas" name="direccion_adscrita" id="direccion_adscrita"
                            autocomplete="off" placeholder="BUSCAR DIRECCIÓN ADSCRITA">
                        <datalist id="lista_direcciones_adscritas">
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
                        </datalist>
                    </div>
                    <div class="input-box">
                        <label for="cargo">Cargo</label>
                        <input type="text" id="cargo" list="lista_cargos" placeholder="BUSCAR CARGO" name="cargo">
                        <datalist id="lista_cargos">
                            <?php
                    $query_cargo = "SELECT cargo FROM consulta_cargos ORDER BY cargo ASC";
                    $result_cargo = mysqli_query($conn, $query_cargo);
                    while ($row = mysqli_fetch_array($result_cargo)) {
                    $cargo = $row["cargo"];
                ?>
                            <option value="<?php echo $cargo ?>"><?php echo $cargo ?></option>
                            <?php
                }
                ?>
                        </datalist>
                    </div>
                    <div class="input-box">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
                    </div>
                    <div class="input-box">
                        <label for="fecha_fin">Fecha de fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin">
                    </div>
                    <div class="subtitle">
                        <img src="./views/resources/icons/briefcase-alt-2.svg" alt="">
                        <h2>Escala de remuneracion</h2>
                    </div>
                    <div class="input-box">
                        <label for="escala_remuneracion">Escala del trabajador</label>
                        <select name="escala_remuneracion" id="escala_remuneracion">
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
                        <label for="sueldo_trabajador">Sueldo del trabajador</label>
                        <input type="text" id="sueldo_trabajador" name="sueldo" required>
                    </div>
                    <div class="box-button">
                        <button class="button button--save" id="confirmBtn" type="submit"><img
                                src="./views/resources/icons/save.svg" alt="icono"></button>
                        <button class="button button--reset" type="reset"><img
                                src="./views/resources/icons/x.svg" alt="icono"></button>
                    </div>
                </form>
            </dialog>
            <!-- END FORM -->
            <table class="table">
                <thead class="thead">
                    <tr class="thead__tr">
                        <th class="thead__th">Categoria</th>
                        <th class="thead__th">Estatus</th>
                        <th class="thead__th">Primer nombre</th>
                        <th class="thead__th">Primer apellido</th>
                        <th class="thead__th">Cedula</th>
                        <th class="thead__th">Acciones</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php
                                if(isset($_GET["numero_documento"]) && $_GET["numero_documento"] != ''){
                                    require_once("./config/database.php");
                                    if ($conn->connect_error) {
                                        die("Error de conexion: " . $conn->connect_error);
                                    }
                                    $numero_documento = $_GET["numero_documento"];
                                    $busqueda = mysqli_query($conn, "SELECT * FROM trabajadores 
                                    INNER JOIN documentos_identidad ON trabajadores.trabajador_id = documentos_identidad.id_documento_identidad
                                    INNER JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.sueldos_trabajadores_id
                                    INNER JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.cargo_ejercido_id
                                    INNER JOIN escala_remuneracion ON trabajadores.trabajador_id = escala_remuneracion.escala_remuneracion_id
                                    WHERE numero_documento = '$numero_documento'");
                                    if ($busqueda->num_rows == 0) {
                                        echo 
                                        "<tr>
                                            <td colspan='6'>No hay resultados</td>
                                        </tr>";
                                    } else {
                                        while ($row = mysqli_fetch_assoc($busqueda)) { ?>
                    <tr class="tbody__tr">
                        <input type="hidden" value="<?php echo $row["trabajador_id"];  ?>">
                        <td class="tbody__td <?php echo $row["categoria"];  ?>" data-label="ID">
                            <?php echo $row["categoria"];  ?></td>
                        <td class="tbody__td" data-label="ID"><?php echo $row["estatus"];  ?></td>
                        <td class="tbody__td" data-label="NOMBRES">
                            <?php echo $row["primer_nombre"]."   ".$row["segundo_nombre"];  ?></td>
                        <td class="tbody__td" data-label="APELLIDOS">
                            <?php echo $row["primer_apellido"]."   ".$row["segundo_apellido"];  ?></td>
                        <td class="tbody__td" data-label="CEDULA"><?php echo $row["numero_documento"];  ?></td>
                        <td class="tbody__td">
                            <a
                                href="./controllers/eliminar-trabajador-controller.php?trabajador_id=<?php echo $row["trabajador_id"];?>"><img
                                    src="./views/resources/icons/trash.svg" alt="icono" title="Eliminar trabajador"
                                    class="icon-action eliminar_trabajador"></a>
                            <a href="./editar-trabajador.php?trabajador_id=<?php echo $row["trabajador_id"];?>"><img
                                    src="./views/resources/icons/edit.svg" alt="icono" title="Editar trabajador"
                                    class="icon-action eliminar_trabajador"></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="../views/resources/js/main.js"></script>

</html>