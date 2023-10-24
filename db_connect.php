<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "DULIEU";

$conn = mysqli_connect($severname, $username, $password, $dbname);

if (!$conn) {
    die("Ket noi that bai: ". mysqli_connect_error());
}

?>
