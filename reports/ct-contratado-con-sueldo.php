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
    <title>CT CONTRATADO CON SUELDO</title>
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
$busqueda_trabajador = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, numero_documento, DAY(fecha_ingreso) AS dia_ingreso, MONTH(fecha_ingreso) AS mes_ingreso, YEAR(fecha_ingreso) AS ano_ingreso, sueldo, cargo, direccion_adscrita, tipo_documento, escala_remuneracion FROM trabajadores 
INNER JOIN documentos_identidad ON trabajadores.trabajador_id = documentos_identidad.id_documento_identidad
INNER JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.sueldos_trabajadores_id
INNER JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.cargo_ejercido_id
INNER JOIN escala_remuneracion ON trabajadores.trabajador_id = escala_remuneracion.escala_remuneracion_id
WHERE numero_documento = '$trabajador_id' AND estatus = 'CONTRATADO'";
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
        &nbsp; &nbsp; &nbsp; &nbsp; Por medio de la presente se hace constar que el ciudadano:
        <strong><?php echo $row["primer_nombre"]." ".$row["segundo_nombre"]." ".$row["primer_apellido"]." ".$row["segundo_apellido"];?></strong>,
        titular de la Cédula de
        identidad <strong><?php echo "N° ".$row["tipo_documento"]."-".$row["numero_documento"] ?></strong>, presta sus servicios para esta
        Alcaldía,
        desde el
        día
        <strong><?php echo $row["dia_ingreso"]?></strong> del mes de
        <strong><?php
            $mes_ingreso = strval($row["mes_ingreso"]);
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
            } ?></strong> del año <strong><?php echo $row["ano_ingreso"] ?></strong>, actualmente ocupa el cargo de
        <strong><?php echo $row["cargo"] ?></strong>, (Contratado a Tiempo Determinado), con clasificación <strong><?php echo $row["escala_remuneracion"] ?></strong>, devengando un salario mensual de
        <?php
        //Incluímos la clase pago
        $sueldo_letras=strval($row["sueldo"]);
        require_once ("../CifrasEnLetras.php");
        $v=new CifrasEnLetras(200); 
        //Convertimos el total en letras
        $letra=($v->convertirEurosEnLetras($sueldo_letras));
        ?>
        <strong><?php echo $letra ?></strong>
        <strong>(Bs <?php echo $row["sueldo"]; ?>).</strong>
    </p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; Constancia que se expide a petición de la parte interesada a los
        <?php echo $days_of_the_month[date('d')-1] ?> (<?php echo $current_day ?>) días del mes de
        <?php echo $months[date("m")-1] ?> (<?php echo $current_month ?>) del año dos mil veintitrés
        (<?php echo $current_year ?>).</p>
    <p class="paragraph--centered"><span class="separate-text">Atentamente</span><br>
        <strong>Lcda. Aura I. Briceño G.</strong><br>
        Directora de Recursos Humanos<br>
        Resolución N° 057-2023<br>
        Fecha del 09 de febrero del año 2023<br></p>


    <footer class="footer">
        <h2 class="validity-time">Valido por (3) tres meses</h2>
        <p class="element-box">
            <span class="control-signature">AIBG/<?php echo $firma_operador; ?></span>
            <span class="message">¡Ocumare Ciudad de Emprendedores...!</span>
        </p>
        <address class="footer__address">Av. Miranda cruce con Av. Bolívar, frente el Templo Parroquia San Diego de
            Alcalá, Casa de Gobierno<br>
            <a href="tel:+584142437040" class="footer__number-telephone"><strong>Teléfonos
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
$dompdf->stream("ct-contratado-con-sueldo" , array("Attachment" => false));

?>