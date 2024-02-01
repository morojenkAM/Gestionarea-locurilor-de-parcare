<?php
$servername = "nume_server";
$username = "utilizator";
$password = "parola";
$dbname = "nume_baza_de_date";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idLocParcare = $_POST["id_loc_parcare"];
    $stare = $_POST["stare"];

    $sql = "UPDATE Locuri_Parcare SET Disponibil = '$stare' WHERE IDLoc = '$idLocParcare'";

    if ($conn->query($sql) === TRUE) {
        echo "Actualizare reușită";
    } else {
        echo "Eroare la actualizare: " . $conn->error;
    }
}

$conn->close();
?>
