<?php
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    include('ConnectDB.php');

    // Ștergeți înregistrările din tabelul `parcari` care se referă la înregistrarea din `strada`
    $stmtParcari = $conn->prepare("DELETE FROM utilizatori WHERE IDUtilizatori = ?");
    $stmtParcari->bind_param("i", $deleteId);
    $stmtParcari->execute();
    $stmtParcari->close();

  

    // Apoi, ștergeți înregistrarea din tabelul `strada`
    $stmtStrada = $conn->prepare("DELETE FROM locuri_parcare WHERE IDLoc = ?");
    $stmtStrada->bind_param("i", $deleteId);

    if ($stmtStrada->execute()) {
        header("Location: admin_locuri_parcare.php");
    } else {
        echo "Eroare la ștergerea străzii: " . $conn->error;
    }

    $stmtStrada->close();
    $conn->close();
}
?>
