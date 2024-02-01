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

    $stmt = $conn->prepare("SELECT * FROM achitare WHERE IDAchitare = ?");
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
                <label for="IDAchitare">ID Achitare:</label>
                <input type="text" name="IDAchitare" value="<?php echo $row['IDAchitare']; ?>" required>
                <br>
                <label for="NumarulCardului">Numarul Cardului:</label>
                <input type="text" name="NumarulCardului" value="<?php echo $row['NumarulCardului']; ?>" required>
                <br>
                <label for="LunaDataExpirarii">Luna Data Expirarii:</label>
                <input type="text" name="LunaDataExpirarii" value="<?php echo $row['LunaDataExpirarii']; ?>" required>
                <br>
                <label for="NumelePrenumele	">Numele Prenumele	:</label>
                <input type="text" name="NumelePrenumele" value="<?php echo $row['NumelePrenumele']; ?>" required>
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
    $IDAchitare	 = $_POST["IDAchitare	"];
    $NumarulCardului = $_POST["NumarulCardului"];
    $LunaDataExpirarii = $_POST["LunaDataExpirarii"];
    $NumelePrenumele = $_POST["NumelePrenumele"];
    // Adaugă și alte variabile pentru celelalte câmpuri

    include('ConnectDB.php');

    $stmt = $conn->prepare("UPDATE achitare SET NumarulCardului = ?, LunaDataExpirarii = ?, NumelePrenumele	 = ? WHERE IDAchitare = ?");
    $stmt->bind_param("siii", $NumarulCardului, $LunaDataExpirarii, $NumelePrenumele, $IDAchitare);

    if ($stmt->execute()) {
        header("Location: admin_achitare.php");
        exit;
    } else {
        echo "Eroare la actualizarea locurilor de parcare: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
