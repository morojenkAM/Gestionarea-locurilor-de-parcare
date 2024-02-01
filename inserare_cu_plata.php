<?php
include('connectDB.php');

// Enhanced error reporting (Use only during development)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $NumePrenume = $_POST['NumePrenume'];
    $Telefonul = $_POST['Telefonul'];
    $Email = $_POST['Email'];
    $NumarulCardului = $_POST['NumarulCardului'];
    $LunaDataExpirarii = $_POST['LunaDataExpirarii'];
    $NumelePrenumele = $_POST['NumelePrenumele'];
    $Suma = $_POST['Suma'];
    $InceputAbonament = $_POST['InceputAbonament'];
    $SfarsitAbonament = $_POST['SfarsitAbonament'];

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO achitare (NumarulCardului, LunaDataExpirarii, NumelePrenumele, Suma) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $NumarulCardului, $LunaDataExpirarii, $NumelePrenumele, $Suma);
    if ($stmt->execute()) {
        echo "Inserare reușită!";
    } else {
        echo "Eroare la inserare: " . $stmt->error;
    }

    $achitareID = $conn->insert_id;

    $stmt1 = $conn->prepare("INSERT INTO abonamente (InceputAbonament, SfarsitAbonament, IDAchitare) VALUES (?, ?, ?)");
    $stmt1->bind_param("ssi", $InceputAbonament, $SfarsitAbonament, $achitareID);
    if ($stmt1->execute()) {
        echo "Inserare reușită!";
    } else {
        echo "Eroare la inserare: " . $stmt1->error;
    }

    $abonamenteID = $conn->insert_id;

    $stmt2 = $conn->prepare("INSERT INTO utilizatori (NumePrenume, Telefonul, Email, IDAchitare, IDAbonamente) VALUES (?, ?, ?, ?, ?)");
    $stmt2->bind_param("sssii", $NumePrenume , $Telefonul, $Email, $achitareID, $abonamenteID);

    if ($stmt2->execute()) {
        echo "Inserare reușită!";
    } else {
        echo "Eroare la inserare: " . $stmt2->error;
    }

    $stmt->close();
} else {
    echo "Eroare: Date lipsă sau solicitare nevalidă.";
}

$conn->close();
?>
