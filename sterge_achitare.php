<?php
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    include('ConnectDB.php');

    // Verifică dacă există referințe în tabelul `Abonamente`
    $checkReferences = $conn->prepare("SELECT * FROM Abonamente WHERE IDAchitare = ?");
    $checkReferences->bind_param("i", $deleteId);
    $checkReferences->execute();
    $resultReferences = $checkReferences->get_result();

    if ($resultReferences->num_rows > 0) {
        echo "Nu poți șterge această înregistrare deoarece există referințe în tabelul `Abonamente`.";
    } else {
        // Șterge înregistrarea din tabelul `achitare`
        $stmtAchitare = $conn->prepare("DELETE FROM achitare WHERE IDAchitare = ?");
        $stmtAchitare->bind_param("i", $deleteId);

        if ($stmtAchitare->execute()) {
            header("Location: admin_achitare.php");
        } else {
            echo "Eroare la ștergerea înregistrării din tabelul `achitare`: " . $conn->error;
        }

        $stmtAchitare->close();
    }

    $checkReferences->close();
    $conn->close();
}
?>
