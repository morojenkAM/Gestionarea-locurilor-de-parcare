<?php
if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "parcare";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM Sector WHERE IDSector = ?");
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
            <h2>Editare Sector</h2>
            <form method="post">
                <label for="id">ID Sector:</label>
                <input type="text" name="id" value="<?php echo $row['IDSector']; ?>" required>
                <br>
                <label for="DenumireSector">Denumire Sector:</label>
                <input type="text" name="DenumireSector" value="<?php echo $row['DenumireSector']; ?>" required>
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
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $DenumireSector = $_POST["DenumireSector"];

    include('ConnectDB.php');

    $stmt = $conn->prepare("UPDATE Sector SET DenumireSector = ? WHERE IDSector = ?");
    $stmt->bind_param("si", $DenumireSector, $id);

    if ($stmt->execute()) {
        header("Location: admin_sector.php");
        exit;
    } else {
        echo "Eroare la actualizarea sectorului: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
