<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "rrhhabtl";

$conn = new mysqli($host,$username,$password,$dbname);
$conn->query("set names utf8;");
if ($conn->connect_error) {
    die("Error de conexcion" .$conn->connect_error);
}

?>