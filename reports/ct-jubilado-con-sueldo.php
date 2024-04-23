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

$trabajador_id = $_GET["trabajador_id"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancia de trabajo</title>
    <style>
        @page {
            margin: 0cm;
        }

        * {
            color: rgb(0, 0, 0);
        }

        a {
            text-decoration: none;
        }

        .header,
        .header__image {
            display: block;
            width: 100%;
            height: auto;
        }

        .main {
            width: 100%;
            height: auto;
        }

        .main-title {
            display: block;
            width: 72%;
            height: auto;
            text-align: center;
            font-size: 2.70em;
            border-bottom: 3px solid rgb(0, 0, 0);
            margin: 50px auto 50px auto;
            font-weight: 800;
        }

        .footer {
            display: block;
            width: 100%;
            height: auto;
            bottom: 0;
            position: fixed;
        }

        .footer__address {
            width: 100%;
            height: auto;
            text-align: center;
            margin-bottom: -50px;
            position: relative;
            z-index: 5;
        }

        p {
            width: 80%;
            line-height: 27px;
            font-size: 1.10em;
            text-align: justify;
            margin: auto auto 20px auto;
        }

        .element-box {
            display: block;
            width: 80%;
            height: auto;
            margin: auto;
            text-align: justify;
            margin-bottom: 10px;
        }

        .control-signature,
        .message {
            width: 50%;
            display: inline;
            height: auto;
        }

        .control-signature {
            font-size: 0.80em;
            width: 100%;
            text-align: right;
            margin-right: 302px;
            margin-left: -5px;
        }

        .message {
            font-style: italic;
            font-weight: 500;
            font-size: 1em;
        }

        .validity-time {
            display: block;
            width: 80%;
            height: auto;
            text-align: right;
            margin: auto;
            font-size: 1.20em;
        }

        .paragraph--centered {
            text-align: center;
        }

        .paragraph--centered .separate-text {
            display: block;
            margin-top: 30px;
        }

        .note {
            line-height: -100px;
        }

        .table {
            width: 400px;
            margin: auto;
        }

        .tbody__td {
            text-align: center;
            border: 1px solid rgb(0,0,0);
        }
    </style>
</head>
<?php

#SERVER TIME
date_default_timezone_set("America/Caracas");
setlocale(LC_ALL,"es_VE.UTF-8");

$months = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
$days_of_the_month = array("un","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once","doce","trece","catorce","quince","dieciséis","diecisiete","dieciocho","diecinueve","veinte","veintiuno","veintidós","veintitrés","veinticuatro","veinticinco","veintiséis","veintisiete","veintiocho","veintinueve","treinta","treinta y uno");
$current_year= date("Y");
$current_month= date("m");
$current_day= date("d");

?>
<?php 
$busqueda_trabajador = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, numero_documento, DAY(fecha_ingreso) AS dia_ingreso, MONTH(fecha_ingreso) AS mes_ingreso, YEAR(fecha_ingreso) AS ano_ingreso, DAY(fecha_egreso) AS dia_egreso, MONTH(fecha_egreso) AS mes_egreso, YEAR(fecha_egreso) AS ano_egreso, sueldo, cargo, direccion_adscrita, tipo_documento, sexo FROM trabajadores 
INNER JOIN documentos_identidad ON trabajadores.trabajador_id = documentos_identidad.id_documento_identidad
INNER JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.sueldos_trabajadores_id
INNER JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.cargo_ejercido_id
WHERE numero_documento = '$trabajador_id' AND categoria='JUBILADO'";
$result_trabajador_constancia = mysqli_query($conn, $busqueda_trabajador);
?>
<?php while ($row= mysqli_fetch_assoc($result_trabajador_constancia)) { ?>
<main>
    <header class="header">
        <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/views/resources/images/membrete.jpg" alt=""
            class="header__image">
    </header>
    <h1 class="main-title">CONSTANCIA DE TRABAJO</h1>
    <p>
        &nbsp; &nbsp; &nbsp; &nbsp; Por medio de la presente se hace constar, que <?php $sexo = strval($row["sexo"]);switch ($sexo) {
            case 'MASCULINO':
                echo "el";
                break;
            case 'FEMENINO':
                echo "la";
                break;
            default:
                echo "o";
                break;
        }  ?> ciudadan<?php $sexo = strval($row["sexo"]);
        switch ($sexo) {
            case 'MASCULINO':
                echo "o";
                break;
            case 'FEMENINO':
                echo "a";
                break;
            default:
                echo "o";
                break;
        } ?>:
        <strong><?php echo $row["primer_nombre"]." ".$row["segundo_nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"];?></strong>,
        titular de la Cédula de
        ídentidad <strong><?php echo "N° ".$row["tipo_documento"]."-".$row["numero_documento"] ?></strong>, pertenece a
        la Nómina de Jubilados a partir del

        <strong><?php echo $row["dia_egreso"]?> de <?php
            $mes_ingreso = strval($row["mes_egreso"]);
            switch ($mes_ingreso) {
                case '1':
                    echo "ENERO";
                    break;
                case '2':
                    echo "FEBRERO";
                    break;
                case '3':
                    echo "MARZO";
                    break;
                case '4':
                    echo "ABRIL";
                    break;
                case '5':
                    echo "MAYO";
                    break;    
                case '6':
                    echo "JUNIO";
                    break; 
                case '7':
                    echo "JULIO";
                    break;
                case '8':
                    echo "AGOSTO";
                    break;
                case '9':
                    echo "SEPTIEMBRE";
                    break;
                case '10':
                    echo "OCTUBRE";
                    break;
                case '11':
                    echo "NOVIEMBRE";
                    break;
                case '12':
                    echo "DICIEMBRE";
                    break;
            } ?> del año <?php echo $row["ano_egreso"] ?></strong>, devengando un ingreso mensual de:
    </p>
    <table class="table">
        <thead class="thead">
            <tr class="thead__tr">
                <th class="thead__th">CONCEPTO</th>
                <th class="thead__th">MONTO MENSUAL</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <tr class="tbody__tr">
                <td class="tbody__td">Salario Base Mensual</td>
                <td class="tbody__td">Bs. 130,00</td>
            </tr>
            <tr class="tbody__tr">
                <td class="tbody__td">Prima por Antiguedad</td>
                <td class="tbody__td">Bs. 39,00</td>
            </tr>
            <tr class="tbody__tr">
                <td class="tbody__td tbody__td--small"><strong>TOTAL SALARIO<br>NORMAL MENSUAL</strong></td>
                <td class="tbody__td">Bs. 169,00</td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; Constancia que se expide a petición de la parte interesada a los
        <?php echo $days_of_the_month[date('d')-1] ?> (<?php echo $current_day ?>) días del mes de
        <?php echo $months[date("m")-1] ?> del año dos mil veintitrés
        (<?php echo $current_year ?>).</p>
    <p class="paragraph--centered"><span class="separate-text">Atentamente,</span><br><br><br>
        <strong>Lcda. Aura I. Briceño G.</strong><br>
        Directora de Recursos Humanos<br>
        Resolución N° 057-2023<br>
        Fecha del 09 de febrero del año 2023<br><br><br><strong><span class="note">NOTA:</strong> EL SALARIO DESCRITO
        ESTA EXPRESADO EN LA MONEDA VIGENTE PARA LA FECHA
        DE EGRESO.</span>
    </p>


    <footer class="footer">
        <h2 class="validity-time">Valido por (3) tres meses</h2>
        <p class="element-box">
            <span class="control-signature">AIBG/<?php echo $firma_operador; ?></span>
            <span class="message">¡Ocumare Ciudad de Emprendedores...!</span>
        </p>
        <address class="footer__address">Av. Miranda cruce con Av. Bolívar, frente el Templo Parroquia San Diego de
            Alcalá, Casa de Gobierno<br>
            <a href="tel:+584142437040" class="footer__number-telephone"><strong>Teléfono
                    0414-243.70.40</strong></a><br>
            <a href="mailto:rrhhalcaldialander@gmail.com"
                class="footer__email"><strong>rrhhalcaldialander@gmail.com</strong></a>
        </address>
        <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/views/resources/images/bandera-de-venezuela.png" alt="">
    </footer>
</main>
<?php }?>

<body>

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
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("archivo_.pdf" , array("Attachment" => false));

?>