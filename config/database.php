<?php

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "rrhh_abtl";

$conn = new mysqli($host, $username, $passwd, $dbname);
$conn->query("set names utf8;");
if ($conn->connect_error) {
        die("Error de conexion" .$conn->connect_error);
}

?>