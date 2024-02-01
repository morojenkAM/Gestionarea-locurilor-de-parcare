<?php
include('ConnectDB.php');

if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];

    $stmt = $conn->prepare("SELECT * FROM strada WHERE IDStrada = ?");
    $stmt->bind_param("i", $editId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        /* Stilurile tale CSS rămân neschimbate */
        </style>
        </head>
        <body>
            <h2>Editare Strada</h2>
            <form method="post">
                <label for="id">ID Strada:</label>
                <input type="text" name="id" value="<?php echo $row['IDStrada']; ?>" required>
                <br>
                <label for="DenumireStrada">Denumire Strada:</label>
                <input type="text" name="DenumireStrada" value="<?php echo $row['DenumireStrada']; ?>" required>
                <br>
                <label for="IDSector">ID Sector:</label>
                <input type="text" name="IDSector" value="<?php echo $row['IDSector']; ?>" required>
                <br>
                <input type="submit" value="Salvează Editarea">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Record not found for editing.";
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $DenumireStrada = $_POST["DenumireStrada"];
    $IDSector = $_POST["IDSector"];

    $stmt = $conn->prepare("UPDATE strada SET DenumireStrada = ?, IDSector = ? WHERE IDStrada = ?");
    $stmt->bind_param("sii", $DenumireStrada, $IDSector, $id);

    if ($stmt->execute()) {
        header("Location: admin_strada.php");
        exit;
    } else {
        echo "Eroare la actualizarea străzii: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
