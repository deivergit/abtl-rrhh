<?php

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "rrhh_abtl";

$conn = new mysqli($host, $username, $passwd, $dbname);
$conn->query("set names utf8;");
if ($conn->connect_error) {
        die("Error de conexcion" .$conn->connect_error);
}

?>