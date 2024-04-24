<?php

require_once("../config/database.php");

ob_start();

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

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTE TRABAJADORES ACTIVOS</title>
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
    <h1>TRABAJADORES ACTIVOS</h1>
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
                    LEFT JOIN documentos_identidad_trabajadores ON trabajadores.trabajador_id = documentos_identidad_trabajadores.trabajador_fk
                    LEFT JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.trabajador_fk
                    LEFT JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.trabajador_fk
                    LEFT JOIN escala_remuneracion_trabajadores ON trabajadores.trabajador_id = escala_remuneracion_trabajadores.trabajador_fk
                    WHERE categoria = 'ACTIVO' ORDER BY estatus";
                    $query = mysqli_query($conn, $query_trabajadores_activos);
                    ?>

            <?php while ($row = mysqli_fetch_array($query)) { ?>
            <tr class="tbody__tr">
                <td class="tbody__td"><?php echo $row["estatus"]; ?></td>
                <td class="tbody__td"><?php echo $row["fecha_ingreso"]; ?></td>
                <td class="tbody__td"><?php echo $row["primer_nombre"]."   ".$row["segundo_nombre"]; ?></td>
                <td class="tbody__td"><?php echo $row["primer_apellido"]."   ".$row["segundo_apellido"]; ?></td>
                <td class="tbody__td"><?php echo $row["tipo_documento"]."-".$row["numero_documento"]; ?></td>
                <td class="tbody__td"><?php echo $row["direccion_adscrita"]; ?></td>
                <td class="tbody__td"><?php echo $row["sueldo_base"]; ?></td>
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