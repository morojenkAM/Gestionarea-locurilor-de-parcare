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

// Actualizează starea locului de parcare în baza de date la "liber"
$sql = "UPDATE locuri_parcare SET Disponibil = 'Da', IDUtilizatori = NULL WHERE IDLoc = $spotNumber";

if ($conn->query($sql) === TRUE) {
    echo "Locul de parcare $spotNumber a fost eliberat cu succes.";
} else {
    echo "Eroare la eliberarea locului de parcare: " . $conn->error;
}

$conn->close();
?>
