<?php

require_once("../config/database.php");

ob_start();

# VALIDATION SESSION
session_start();
if (isset($_SESSION["usuario_id"])) {

    # TIME SERVER
    date_default_timezone_set("America/Caracas");
    $server_time = date("H:i");
    $server_date = date("d:m:y");

    # SESSION VARIABLES
    $trabajador_id = $_GET["trabajador_id"];
    $usuario_id = $_SESSION["usuario_id"];

    $consulta_sql_usuario = mysqli_query($conn, "SELECT firma_usuario FROM usuarios u
    LEFT JOIN firmas_usuarios fu ON u.usuario_id = fu.usuario_fk
    WHERE usuario_id = '$usuario_id'");
    $datos_usuario_consultado = mysqli_fetch_assoc($consulta_sql_usuario);
    $firma_operador = $datos_usuario_consultado["firma_usuario"];
} else {
    die(header("location: ../index.php"));
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CT-CS-CO</title>
    <style>
        @page {
            margin: 0cm;
        }

        * {
            color: rgb(0, 0, 0);
            font-family: Arial, Helvetica, sans-serif;
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
            width: 75%;
            height: auto;
            text-align: center;
            font-size: 2.80em;
            margin: 50px auto 35px auto;
            font-weight: 800;
        }

        .main-title::before {
            position: absolute;
            content: "";
            height: 5px;
            width: 75%;
            background-color: rgb(0, 0, 0);
            margin-top: 50px;
        }

        .paragraph {
            display: block;
            width: 84%;
            height: auto;
            line-height: 29px;
            font-size: 1.07em;
            text-align: justify;
            margin: auto;
            font-weight: 400;
        }

        .paragraph--secound-paragraph {
            margin-top: 18px;
        }

        .paragraph--third-paragraph {
            margin: 95px auto 70px auto;
        }

        .paragraph--fourth-paragraph {
            line-height: 18px;
        }

        .paragraph--centered-paragraph {
            text-align: center;
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
            font-size: 0.70em;
        }

        .element-box {
            display: block;
            width: 80%;
            height: auto;
            margin: auto;
            text-align: justify;
            margin-bottom: 15px;
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
            width: auto;
            font-weight: 500;
            font-size: 1em;
            float: right;
        }

        .validity-time {
            display: block;
            width: 80%;
            height: auto;
            text-align: right;
            margin: auto;
            font-size: 1.10em;
        }

        .footer__number-telephone,
        .footer__email {
            font-style: normal;
        }
    </style>
</head>
<?php

#SERVER TIME
date_default_timezone_set("America/Caracas");
setlocale(LC_ALL, "es_VE.UTF-8");

$months = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
$days_of_the_month = array("un", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "veintiuno", "veintidós", "veintitrés", "veinticuatro", "veinticinco", "veintiséis", "veintisiete", "veintiocho", "veintinueve", "treinta", "treinta y uno");
$current_year = date("Y");
$current_month = date("m");
$current_day = date("d");

?>
<?php
$busqueda_trabajador = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, numero_documento, DAY(fecha_ingreso) AS dia_ingreso, MONTH(fecha_ingreso) AS mes_ingreso, YEAR(fecha_ingreso) AS ano_ingreso, FORMAT(sueldo_base, 2, 'de_DE') AS sueldo_base, cargo, direccion_adscrita, tipo_documento, escala_remuneracion, sexo FROM trabajadores 
INNER JOIN documentos_identidad_trabajadores ON trabajadores.trabajador_id = documentos_identidad_trabajadores.trabajador_fk
INNER JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.trabajador_fk
INNER JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.trabajador_fk
INNER JOIN escala_remuneracion_trabajadores ON trabajadores.trabajador_id = escala_remuneracion_trabajadores.trabajador_fk
WHERE numero_documento = '$trabajador_id' AND estatus = 'CONTRATADO'";
$result_trabajador_constancia = mysqli_query($conn, $busqueda_trabajador);
?>
<?php while ($row = mysqli_fetch_assoc($result_trabajador_constancia)) { ?>
<main>
    <header class="header">
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/views/resources/images/membrete.jpg" alt=""
            class="header__image">
    </header>
    <h1 class="main-title"><strong>CONSTANCIA DE TRABAJO</strong></h1>
    <p class="paragraph">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Por medio de la presente se hace constar que 
    <?php
    if ($row["sexo"] === 'MASCULINO') {
        echo "el";
    } else {
        echo "la";
    }
    ?> ciudadan<?php if ($row["sexo"] === "MASCULINO") {
        echo "o";
    } else {
        echo "a";
    }
    ?>:
        <strong>
        <?php 
        echo implode(" ", [$row["primer_nombre"], $row["segundo_nombre"], $row["primer_apellido"], $row["segundo_apellido"]]);
        ?></strong>,
        titular de la Cédula de
        ídentidad <strong><?php echo "N° " . $row["tipo_documento"] . "-" . $row["numero_documento"] ?></strong>, presta
        sus
        servicios para ésta
        Alcaldía,
        desde el
        día
        <strong><?php echo $row["dia_ingreso"] ?></strong> del mes de
        <strong><?php
                $meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
                echo $meses[$row["mes_ingreso"]-1];
                ?></strong> del año <strong><?php echo $row["ano_ingreso"] ?></strong>, actualmente ocupa el
        cargo de
        <strong><?php echo $row["cargo"] ?></strong>, (Contratado a Tiempo Determinado), con clasificación
        <strong><?php echo $row["escala_remuneracion"] ?></strong>, devengando un salario mensual de
        <?php
            $sueldo_letras = strval($row["sueldo_base"]);
            require_once("../CifrasEnLetras.php");
            $v = new CifrasEnLetras(200);
            $letra = ($v->convertirEurosEnLetras($sueldo_letras));
            ?>
        <strong><?php echo $letra ?></strong>
        <strong>(Bs. <?php echo $row["sueldo_base"]; ?>).</strong>
    </p>
    <p class="paragraph paragraph--secound-paragraph">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Constancia que se
        expide a petición de
        la parte interesada a los
        <?php echo $days_of_the_month[date('d') - 1] ?> (<?php echo $current_day ?>) días del mes de
        <?php echo $months[date("m") - 1] ?> del año dos mil veintitrés
        (<?php echo $current_year ?>).</p>
    <p class="paragraph paragraph--third-paragraph paragraph--centered-paragraph">Atentamente,</p>
    <p class="paragraph paragraph--fourth-paragraph paragraph--centered-paragraph">
        <strong>Lcda. Aura I. Briceño G.</strong><br>
        Directora de Recursos Humanos<br>
        Resolución N° 057-2023,<br>
        Fecha del 09 de febrero del año 2023<br>
    </p>
    <footer class="footer">
        <span class="validity-time"><i>Válido por tres (3) meses</i></span>
        <p class="element-box">
            <span class="control-signature"><i>AIBG/<?php echo $firma_operador; ?></i></span>
            <span class="message"><strong>¡Ocumare Ciudad de Emprendedores...!</strong></span>
        </p>
        <address class="footer__address">Av. Miranda cruce con Av. Bolívar, frente el Templo Parroquia San Diego de
            Alcalá, Casa de Gobierno.<br>
            <a href="tel:+584142437040" class="footer__number-telephone"><strong>Teléfono
                    0414-243.70.40</strong></a><br>
            <a href="mailto:rrhhalcaldialander@gmail.com"
                class="footer__email"><strong>rrhhalcaldialander@gmail.com</strong></a>
        </address>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/views/resources/images/bandera-de-venezuela.png" alt="">
    </footer>
    <?php $numero_documento_trabajador = strval($row["numero_documento"]); ?>
</main>
<?php } ?>

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
$dompdf->stream("CT-CS-CO-" . $numero_documento_trabajador . "-" . $server_date . "-" . $server_time, array("Attachment" => false));

?>