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

// Obține numărul locului de parcare din cerere
$spotNumber = $_POST['spotNumber'];

// Actualizează starea locului de parcare în baza de date la "ocupat"
$sql = "UPDATE locuri_parcare SET Disponibil = 'Nu', IDUtilizatori = 1 WHERE IDLoc = $spotNumber";

if ($conn->query($sql) === TRUE) {
    echo "Locul de parcare $spotNumber a fost ocupat cu succes.";
} else {
    echo "Eroare la ocuparea locului de parcare: " . $conn->error;
}

$conn->close();
?>
