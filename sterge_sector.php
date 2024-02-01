<?php
if (isset($_GET['delete_id'])) {
    include('ConnectDB.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $deleteId = $_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM sector WHERE IdSector = ?");
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
        header("Location: admin_sector.php");
    } else {
        echo "Eroare la ștergerea personajului: " . $conn->error;
    }

    $stmt->close();

    $conn->close();
}

exit;
?>
