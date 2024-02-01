<?php
include('connectDB.php');

// Enhanced error reporting (Use only during development)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $parola = $_POST['parola'];

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM logare WHERE username = ? AND parola = ?");
    $stmt->bind_param("ss", $username, $parola);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login success
        header('Location:admin_sector.php');
        // Handle session or redirection as needed
    } else {
        // Login failed
        echo "Eroare la autentificare: utilizator sau parolă incorectă.";
    }
    
}
$conn->close();
?>