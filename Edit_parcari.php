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

    $stmt = $conn->prepare("SELECT * FROM parcari WHERE IDParcare = ?");
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
            <h2>Editare Parcare</h2>
            <form method="post">
                <label for="NumeParcare">Nume Parcare:</label>
                <input type="text" name="NumeParcare" value="<?php echo $row['NumeParcare']; ?>" required>
                <br>
                <label for="TipulParcarii">Tip Parcare:</label>
                <input type="text" name="TipulParcarii" value="<?php echo $row['TipulParcarii']; ?>" required>
                <br>
                <label for="CapacitateaTotala">Capacitate Totală:</label>
                <input type="text" name="CapacitateaTotala" value="<?php echo $row['CapacitateaTotala']; ?>" required>
                <br>
                <!-- Adaugă și alte câmpuri necesare -->
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
    $NumeParcare = $_POST["NumeParcare"];
    $TipulParcarii = $_POST["TipulParcarii"];
    $CapacitateaTotala = $_POST["CapacitateaTotala"];
    // Adaugă și alte variabile pentru celelalte câmpuri

    include('ConnectDB.php');

    $stmt = $conn->prepare("UPDATE parcari SET TipulParcarii = ?, CapacitateaTotala = ? WHERE NumeParcare = ?");
    $stmt->bind_param("ssi", $TipulParcarii, $CapacitateaTotala, $NumeParcare);

    if ($stmt->execute()) {
        header("Location: admin_parcari.php");
        exit;
    } else {
        echo "Eroare la actualizarea parcarii: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
