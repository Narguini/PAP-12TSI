<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projeto";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Erro de ligação: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>