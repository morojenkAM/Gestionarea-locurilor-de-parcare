<?php
// Conectare la baza de date (înlocuiește detaliile de conectare cu ale tale)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parcare";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}


?>
