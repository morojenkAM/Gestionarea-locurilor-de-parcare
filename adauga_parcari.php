<!DOCTYPE html>
<html>
<head>
    <title>Adaugare Sector</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #ffdb4d;
            text-align: center;
        }

        h2 {
            color: #ff6b6b;
        }

        form {
            background-color: #ffffff;
            border: 2px solid #ff6b6b;
            border-radius: 10px;
            padding: 20px;
            max-width: 450px;
            margin: 0 auto;
        }

        label {
            color: #ff6b6b;
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 2px solid #ff6b6b;
            border-radius: 5px;
            font-size: 16px;
            color: #ff6b6b;
        }

        input[type="submit"] {
            background-color: #ff6b6b;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #ff4040;
        }
    </style>
</head>
<body>
    <h2>Adaugare Parcare</h2>
    <form method="post">
        <label for="NumeParcare">Nume Parcare:</label>
        <input type="text" name="NumeParcare" required>
        <br>
        <label for="TipulParcarii">Tipul Parcarii:</label>
        <input type="text" name="TipulParcarii" required>
        <br>
        <label for="CapacitateaTotala">Capacitatea Totala:</label>
        <input type="text" name="CapacitateaTotala" required>
        <br>
        <label for="IDStrada">ID Strada:</label>
        <input type="text" name="IDStrada" required>
        <br>
        <input type="submit" value="Adauga Parcare">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $NumeParcare = $_POST["NumeParcare"];
        $TipulParcarii = $_POST["TipulParcarii"];
        $CapacitateaTotala = $_POST["CapacitateaTotala"];
        $IDStrada = $_POST["IDStrada"];

        include('ConnectDB.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("INSERT INTO parcari (NumeParcare, TipulParcarii, CapacitateaTotala, IDStrada) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssis", $NumeParcare, $TipulParcarii, $CapacitateaTotala, $IDStrada);

        if ($query->execute()) {
            // Redirecționare către pagina admin_parcari.php după adăugarea cu succes
            header("Location: admin_parcari.php");
        } else {
            if ($conn->errno == 1062) {
                echo "Eroare: Numele Parcarii este duplicat. Va rugam sa incercati cu un nume de parcare unic.";
            } else {
                echo "Eroare la adaugarea datelor de parcare: " . $conn->error;
            }
        }

        $query->close();
        $conn->close();
    }
    ?>
</body>
</html>