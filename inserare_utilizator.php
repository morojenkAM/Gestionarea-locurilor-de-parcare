<?php
include('connectDB.php');

// Enhanced error reporting (Use only during development)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificăm dacă cheile necesare există în $_POST
    if (isset($_POST['numePrenume'], $_POST['telefon'], $_POST['email'])) {
        $NumePrenume = $_POST['numePrenume'];
        $Telefonul = $_POST['telefon'];
        $Email = $_POST['email'];

        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO utilizatori (NumePrenume, Telefonul, Email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $NumePrenume, $Telefonul, $Email);

        if ($stmt->execute()) {
            echo "Inserare reușită!";
        } else {
            echo "Eroare la inserare: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Eroare: Date lipsă în formular.";
    }
} else {
    echo "Eroare: Date lipsă sau solicitare nevalidă.";
}

$conn->close();
?>
  