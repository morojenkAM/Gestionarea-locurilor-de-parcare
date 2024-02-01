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

    $stmt = $conn->prepare("SELECT * FROM locuri_parcare WHERE IDLoc = ?");
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
            <h2>Editare Locuri Parcare</h2>
            <form method="post">
                <label for="IDLoc">ID Loc:</label>
                <input type="text" name="IDLoc" value="<?php echo $row['IDLoc']; ?>" required>
                <br>
                <label for="Disponibil">Disponibil:</label>
                <input type="text" name="Disponibil" value="<?php echo $row['Disponibil']; ?>" required>
                <br>
                <label for="IDParcare">ID Parcare:</label>
                <input type="text" name="IDParcare" value="<?php echo $row['IDParcare']; ?>" required>
                <br>
                <label for="IDUtilizatori">ID Utilizatori:</label>
                <input type="text" name="IDUtilizatori" value="<?php echo $row['IDUtilizatori']; ?>" required>
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
    $IDLoc = $_POST["IDLoc"];
    $Disponibil = $_POST["Disponibil"];
    $IDParcare = $_POST["IDParcare"];
    $IDUtilizatori = $_POST["IDUtilizatori"];
    // Adaugă și alte variabile pentru celelalte câmpuri

    include('ConnectDB.php');

    $stmt = $conn->prepare("UPDATE locuri_parcare SET Disponibil = ?, IDParcare = ?, IDUtilizatori = ? WHERE IDLoc = ?");
    $stmt->bind_param("siii", $Disponibil, $IDParcare, $IDUtilizatori, $IDLoc);

    if ($stmt->execute()) {
        header("Location: admin_locuri_parcare.php");
        exit;
    } else {
        echo "Eroare la actualizarea locurilor de parcare: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
