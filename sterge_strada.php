<?php
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    include('ConnectDB.php');

    // Ștergeți înregistrările din tabelul `parcari` care se referă la înregistrarea din `strada`
    $stmtParcari = $conn->prepare("DELETE FROM parcari WHERE IDStrada = ?");
    $stmtParcari->bind_param("i", $deleteId);
    $stmtParcari->execute();
    $stmtParcari->close();

    // Apoi, ștergeți înregistrarea din tabelul `strada`
    $stmtStrada = $conn->prepare("DELETE FROM strada WHERE IDStrada = ?");
    $stmtStrada->bind_param("i", $deleteId);

    if ($stmtStrada->execute()) {
        header("Location: admin_strada.php");
    } else {
        echo "Eroare la ștergerea străzii: " . $conn->error;
    }

    $stmtStrada->close();
    $conn->close();
}
?>
