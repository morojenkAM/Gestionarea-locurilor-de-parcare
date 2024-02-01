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

    $stmt = $conn->prepare("SELECT * FROM abonamente WHERE IDAbonamente = ?");
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
                <label for="IDAbonamente">ID Abonamente:</label>
                <input type="text" name="IDAbonamente" value="<?php echo $row['IDAbonamente']; ?>" required>
                <br>
                <label for="InceputAbonament">Inceput Abonament:</label>
                <input type="text" name="Disponibil" value="<?php echo $row['InceputAbonament']; ?>" required>
                <br>
                <label for="SfarsitAbonament">Sfarsit Abonament:</label>
                <input type="text" name="SfarsitAbonament" value="<?php echo $row['SfarsitAbonament']; ?>" required>
                <br>
                <label for="IDAchitare">ID Utilizatori:</label>
                <input type="text" name="IDAchitare" value="<?php echo $row['IDAchitare']; ?>" required>
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
    $IDAbonamente = $_POST["IDAbonamente"];
    $InceputAbonament = $_POST["InceputAbonament"];
    $SfarsitAbonament = $_POST["SfarsitAbonament"];
    $IDAchitare = $_POST["IDAchitare"];
    // Adaugă și alte variabile pentru celelalte câmpuri

    include('ConnectDB.php');

    $stmt = $conn->prepare("UPDATE abonamente SET InceputAbonament = ?, SfarsitAbonament = ?, IDAchitare = ? WHERE IDAbonamente = ?");
    $stmt->bind_param("siii", $InceputAbonament, $SfarsitAbonament, $IDAchitare, $IDAbonamente);

    if ($stmt->execute()) {
        header("Location: admin_abonamente.php");
        exit;
    } else {
        echo "Eroare la actualizarea locurilor de parcare: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
