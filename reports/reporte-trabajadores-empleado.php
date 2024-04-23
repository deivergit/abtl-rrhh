<?php

require_once("../config/database.php");

ob_start();

# VALIDATION SESSION
session_start();

# SESSION VARIABLES

$usuario_id = $_SESSION["usuario_id"];
$consulta_sql_usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE numero_documento = '$usuario_id';");
$datos_usuario_consultado = mysqli_fetch_array($consulta_sql_usuario);
$primer_nombre = $datos_usuario_consultado['primer_nombre'];
$primer_apellido = $datos_usuario_consultado['primer_apellido'];
$firma_operador = $datos_usuario_consultado['firma'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTE TRABAJADORES EMPLEADOS</title>
    <style>
        @page {
            margin: 0cm;
            
        }

        * {
            color: rgb(0, 0, 0);
        }

        h1 {
            width: 100%;
            text-align: center;
            font-size: 1.50em;
        }

        table {
            width: 95%;
            height: auto;
            margin: auto;
            border-collapse: collapse;

        }

        thead tr th {
            white-space: nowrap;
            color: rgb(255, 255, 255);
            background-color: rgb(60, 60, 60);
            padding: 8px 0 8px 0;
        }

        thead tr {
            height: auto;
            
        }

        tbody tr td {
            text-align: center;
            padding: 10px 3px 10px 3px;
        }

        tbody tr td:nth-child(5) {
            white-space: nowrap;
        }

        tbody tr:nth-child(2n) {
            background: rgb(235, 235, 235);
        }

        
        
    </style>
</head>

<body>
<?php
    $consulta_sql = "SELECT * FROM trabajadores";
    $resultado = mysqli_query($conn, $consulta_sql);
    ?>
    <header>
    </header>
    <h1>TRABAJADORES EMPLEADOS</h1>
    <table class="table">
        <thead class="thead">
            <tr class="thead__tr">
                <th class="thead__th">ESTATUS</th>
                <th class="thead__th">FECHA DE INGRESO</th>
                <th class="thead__th">NOMBRES</th>
                <th class="thead__th">APELLIDOS</th>
                <th class="thead__th">CÉDULA</th>
                <th class="thead__th">DIRECCIÓN ADSCRITA</th>
                <th class="thead__th">SUELDO</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php 
                    $query_trabajadores_activos = "SELECT * FROM trabajadores 
                    INNER JOIN documentos_identidad ON trabajadores.trabajador_id = documentos_identidad.id_documento_identidad
                    INNER JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.sueldos_trabajadores_id
                    INNER JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.cargo_ejercido_id
                    INNER JOIN escala_remuneracion ON trabajadores.trabajador_id = escala_remuneracion.escala_remuneracion_id
                    WHERE estatus = 'EMPLEADO' AND categoria = 'ACTIVO'";
                    $query = mysqli_query($conn, $query_trabajadores_activos);
                    ?>

            <?php while ($row = mysqli_fetch_array($query)) { ?>
            <tr class="tbody__tr">
                <td class="tbody__td"><?php echo $row["categoria"]; ?></td>
                <td class="tbody__td"><?php echo $row["fecha_ingreso"]; ?></td>
                <td class="tbody__td"><?php echo $row["primer_nombre"]."   ".$row["segundo_nombre"]; ?></td>
                <td class="tbody__td"><?php echo $row["primer_apellido"]."   ".$row["segundo_apellido"]; ?></td>
                <td class="tbody__td"><?php echo $row["tipo_documento"]."-".$row["numero_documento"]; ?></td>
                <td class="tbody__td"><?php echo $row["direccion_adscrita"]; ?></td>
                <td class="tbody__td"><?php echo $row["sueldo"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php

$html = ob_get_clean();
require '../dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('folio','landscape');
$dompdf->render();
$dompdf->stream("ct-contratado-con-sueldo" , array("Attachment" => false));

?>